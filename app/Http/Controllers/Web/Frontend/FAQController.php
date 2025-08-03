<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\SystemSetting;
use Illuminate\View\View;

class FAQController extends Controller {
    /**
     * Display the faq page.
     *
     * @return View
     */
    public function index(): View {
        $systemSettings = SystemSetting::first();
        // dd($systemSettings);

        $faqs = FAQ::where('status', 'active')->whereNull('deleted_at')->get();
        // dd($faqs);

        return view('frontend.layouts.faq.index', compact('systemSettings', 'faqs'));
    }
}
