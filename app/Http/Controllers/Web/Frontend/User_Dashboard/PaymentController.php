<?php

namespace App\Http\Controllers\Web\Frontend\User_Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\View\View;

class PaymentController extends Controller {
    /**
     * Display the payment page in user dashboard with payment history.
     *
     * @return View
     */
    public function index(): View {
        // Fetch the user's payments, assuming 'orders' or similar table for payment records.
        // You might need to adjust this based on your actual database structure.
        $payments = Order::where('user_id', auth()->user()->id)
            ->latest() // Get the latest payments first
            ->get();

        // dd($payments);

        // Pass the payment history to the view
        return view('frontend.layouts.user_dashboard.payment', compact('payments'));
    }

}
