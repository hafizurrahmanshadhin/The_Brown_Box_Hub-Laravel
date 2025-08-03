<?php

namespace App\Http\Controllers\Web\Frontend\User_Dashboard;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PersonalDetailsController extends Controller {
    /**
     * Display the personal details page in user dashboard.
     *
     * @return View
     */
    public function index(): View {
        return view('frontend.layouts.user_dashboard.personal_details');
    }

    /**
     * Update the user's profile.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function UpdateUserProfile(Request $request) {
        $validator = Validator::make($request->all(), [
            'firstName'         => 'nullable|string|max:200|min:2',
            'lastName'          => 'nullable|string|max:200|min:2',
            'phone_number'      => 'nullable|numeric|unique:users,phone_number,' . auth()->user()->id,
            'email'             => 'nullable|email|unique:users,email,' . auth()->user()->id,
            'address'           => 'nullable|string',
            'unit_or_apartment' => 'nullable|string',
            'zip_code'          => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $user                    = Auth::user();
            $user->firstName         = $request->firstName;
            $user->lastName          = $request->lastName;
            $user->phone_number      = $request->phone_number;
            $user->email             = $request->email;
            $user->address           = $request->address;
            $user->unit_or_apartment = $request->unit_or_apartment;
            $user->zip_code          = $request->zip_code;

            $user->save();

            return redirect()->back()->with('t-success', 'Profile updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', 'Something went wrong');
        }
    }
}
