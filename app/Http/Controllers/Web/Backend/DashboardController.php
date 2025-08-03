<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\ClientsFeedback;
use App\Models\Contact;
use App\Models\Content;
use App\Models\FAQ;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller {
    /**
     * Display the dashboard page.
     *
     * @return View
     */
    public function index(): View {
        // Fetch the total counts
        $userCount                 = User::count();
        $activeUserCount           = User::where('status', 'active')->count();
        $orderCount                = Order::count();
        $completedOrdersCount      = Order::where('status', 'completed')->count();
        $transactionCount          = Transaction::count();
        $completedTransactionCount = Transaction::where('status', 'completed')->count();
        $contactCount              = Contact::count();
        $clientFeedbackCount       = ClientsFeedback::count();
        $faqCount                  = FAQ::count();
        $contentCount              = Content::count();

        // Fetch recent activity (e.g., recent orders, transactions, contacts)
        $recentOrders       = Order::latest()->take(5)->get();
        $recentTransactions = Transaction::latest()->take(5)->get();
        $recentContacts     = Contact::latest()->take(5)->get();
        $recentFeedbacks    = ClientsFeedback::latest()->take(5)->get();

        return view('backend.layouts.dashboard.index', compact(
            'userCount', 'activeUserCount', 'orderCount', 'completedOrdersCount',
            'transactionCount', 'completedTransactionCount', 'contactCount', 'clientFeedbackCount',
            'faqCount', 'contentCount', 'recentOrders', 'recentTransactions', 'recentContacts', 'recentFeedbacks'
        ));
    }
}
