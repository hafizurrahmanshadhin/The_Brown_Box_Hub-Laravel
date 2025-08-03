<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\GrowPhiladelphiaBusiness;
use App\Models\Subscription;
use App\Models\SystemSetting;
use App\Models\WorkProcess;
use Illuminate\View\View;

class HomeController extends Controller {
    /**
     * Display the home page.
     *
     * @return View
     */
    public function index(): View {
        $faqs           = FAQ::where('status', 'active')->whereNull('deleted_at')->get();
        $systemSettings = SystemSetting::first();

        $workProcesses = WorkProcess::all();
        //~ Decode the sub_description field for each work process
        foreach ($workProcesses as $workProcess) {
            if (is_string($workProcess->sub_description)) {
                $workProcess->sub_description = json_decode($workProcess->sub_description, true);
            }
        }

        $growPhiladelphiaBusiness = GrowPhiladelphiaBusiness::first();
        //~ Decode the sub_description field for grow Philadelphia Business if it exists
        if ($growPhiladelphiaBusiness && is_string($growPhiladelphiaBusiness->sub_description)) {
            $growPhiladelphiaBusiness->sub_description = json_decode($growPhiladelphiaBusiness->sub_description, true);
        }

        //# Fetch active subscriptions
        $subscriptions = Subscription::where('status', 'active')->get();
        // dd($subscriptions);

        return view('frontend.layouts.home.index', compact(
            'faqs',
            'systemSettings',
            'workProcesses',
            'growPhiladelphiaBusiness',
            'subscriptions'
        ));
    }
}
