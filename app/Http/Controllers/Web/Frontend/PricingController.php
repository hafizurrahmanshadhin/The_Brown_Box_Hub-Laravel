<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ClientsFeedback;
use App\Models\FAQ;
use App\Models\Subscription;
use App\Models\SystemSetting;
use Illuminate\View\View;

class PricingController extends Controller {
    /**
     * Display the pricing page.
     *
     * @return View
     */
    public function index(): View {
        $clientsFeedback = ClientsFeedback::where('status', 'active')->whereNull('deleted_at')->get();
        // dd($clientsFeedback);

        $systemSettings = SystemSetting::first();
        // dd($systemSettings);

        $faqs = FAQ::where('status', 'active')->whereNull('deleted_at')->get();
        // dd($faqs);

        //# Fetch active subscriptions
        $subscriptions = Subscription::where('status', 'active')->get();
        // dd($subscriptions);

        return view('frontend.layouts.pricing.index', compact('clientsFeedback', 'systemSettings', 'faqs', 'subscriptions'));
    }
}
