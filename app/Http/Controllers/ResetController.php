<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Artisan;

class ResetController extends Controller {
    /**
     * Reset the system by running migrations and seeding the database.
     *
     * @return JsonResponse
     */
    public function RunMigrations(): JsonResponse {
        try {
            Artisan::call('optimize:clear');

            return Helper::jsonResponse(true, 'System Cache Clear', 200);
        } catch (Exception $e) {
            return Helper::jsonResponse(false, 'An error occurred while clear the system cache.', 500);
        }
    }
}
