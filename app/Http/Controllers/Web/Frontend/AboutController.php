<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ClientsFeedback;
use App\Models\EstablishPhiladelphiaPresence;
use App\Models\SystemSetting;
use Illuminate\View\View;

class AboutController extends Controller {
    /**
     * Display the about page.
     *
     * @return View
     */
    public function index(): View {
        $clientsFeedback = ClientsFeedback::where('status', 'active')->whereNull('deleted_at')->get();
        // dd($clientsFeedback);

        $systemSettings = SystemSetting::first();
        // dd($systemSettings);

        $establishPhiladelphiaPresence = EstablishPhiladelphiaPresence::first();
        //~ Decode the sub_description field for grow Philadelphia Business if it exists
        if ($establishPhiladelphiaPresence && is_string($establishPhiladelphiaPresence->sub_description)) {
            $establishPhiladelphiaPresence->sub_description = json_decode($establishPhiladelphiaPresence->sub_description, true);
        }

        return view('frontend.layouts.about.index', compact('clientsFeedback', 'systemSettings', 'establishPhiladelphiaPresence'));
    }
}
