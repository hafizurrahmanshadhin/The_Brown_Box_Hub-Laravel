<?php

namespace App\Http\Controllers\Web\Frontend\User_Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PartnerAccessController extends Controller {
    /**
     * Display the partner access page in user dashboard.
     *
     * @return View
     */
    public function index(): View {
        return view('frontend.layouts.user_dashboard.partner_access');
    }
}
