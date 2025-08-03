<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;

class StripeController extends Controller {
    /**
     * Display the subscription details page.
     *
     * @param int $id
     * @return View
     */
    public function subscriptionDetails(int $id): View {
        $subscription = Subscription::with('features')->findOrFail($id);
        return view('frontend.layouts.subscription_details.index', compact('subscription'));
    }

    /**
     * Process the checkout.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkout(Request $request) {
        $request->validate([
            'subscription_name'  => 'required|string|max:255',
            'subscription_price' => 'required|numeric|min:1',
            'subscription_id'    => 'required|exists:subscriptions,id',
        ]);

        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to proceed.');
        }

        // Update user details if missing
        $user->update($request->only(['phone_number', 'address', 'unit_or_apartment', 'zip_code']));

        // Set Stripe API Key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create Stripe Checkout Session
        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items'           => [[
                'price_data' => [
                    'currency'     => 'usd',
                    'product_data' => [
                        'name' => $request->subscription_name, // Provide product name
                        'description' => 'Subscription Plan', // Optional: provide a description
                    ],
                    'unit_amount'  => $request->subscription_price * 100, // Amount in cents
                ],
                'quantity'   => 1,
            ]],
            'mode'                 => 'payment',
            'success_url'          => route('subscription.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'           => route('subscription.cancel'),
        ]);

        // Save order and transaction details
        $order = Order::create([
            'user_id'         => $user->id,
            'subscription_id' => $request->subscription_id,
            'total_price'     => $request->subscription_price,
        ]);

        Transaction::create([
            'user_id'        => $user->id,
            'transaction_id' => $session->id,
            'status'         => 'pending',
            'amount'         => $request->subscription_price,
            'payment_method' => 'stripe',
        ]);

        return redirect($session->url);
    }

    /**
     * Handle successful payment.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function success() {
        $session_id = request('session_id');

        // Update transaction and order statuses
        $transaction = Transaction::where('transaction_id', $session_id)->first();
        if ($transaction) {
            $transaction->update(['status' => 'completed']);

            $order = Order::where('user_id', $transaction->user_id)
                ->where('total_price', $transaction->amount)
                ->first();

            if ($order) {
                $order->update(['status' => 'completed']);
            }

            // Get the subscription details
            $subscription = Subscription::find($order->subscription_id);

            // Redirect to the package page with subscription details
            return redirect()->route('user.dashboard.package', ['subscription' => $subscription])->with('t-success', 'Payment successful. Your subscription is now active.');
        }

        return redirect()->route('home')->with('error', 'Payment failed. Please try again.');
    }

    /**
     * Handle canceled payment.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel() {
        return redirect()->route('home')->with('t-error', 'Payment was canceled. Please try again.');
    }
}
