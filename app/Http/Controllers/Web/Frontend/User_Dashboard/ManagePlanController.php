<?php

namespace App\Http\Controllers\Web\Frontend\User_Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\View\View;

class ManagePlanController extends Controller {
    /**
     * Display the manage plan page in user dashboard.
     *
     * @return View
     */
    public function index(): View {
        //# Fetch active subscriptions
        $subscriptions = Subscription::where('status', 'active')->get();
        // dd($subscriptions);

        return view('frontend.layouts.user_dashboard.manage_plan', compact('subscriptions'));
    }
}
