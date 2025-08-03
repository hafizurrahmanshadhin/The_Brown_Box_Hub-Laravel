<?php

namespace App\Http\Controllers\Web\Frontend\User_Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Subscription;
use Illuminate\View\View;

class PackageController extends Controller {
    /**
     * Display the package page in the user dashboard.
     *
     * @return View
     */
    public function index(): View {
        // Get the user's last order with the subscription
        $order = Order::where('user_id', auth()->user()->id)
            ->where('status', 'completed') // Only get completed orders
            ->latest() // Get the most recent order
            ->first();

        if ($order) {
            // Retrieve the subscription associated with the order
            $subscription = $order->subscription; // Assuming the relationship is correctly set up
        } else {
            $subscription = null;
        }

        // Pass the subscription to the view
        return view('frontend.layouts.user_dashboard.package', compact('subscription'));
    }
}
