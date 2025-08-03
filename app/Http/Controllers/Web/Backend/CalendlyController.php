<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Services\CalendlyService;

class CalendlyController extends Controller {
    protected $calendlyService;

    public function __construct(CalendlyService $calendlyService) {
        $this->calendlyService = $calendlyService;
    }

    public function index() {
        $events = $this->calendlyService->getScheduledEvents();
        return view('backend.layouts.calendly.index', compact('events'));
    }
}
