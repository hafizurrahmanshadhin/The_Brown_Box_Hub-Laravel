<?php

namespace App\Http\Controllers\Web\Backend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\EstablishPhiladelphiaPresence;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EstablishPhiladelphiaPresenceController extends Controller {
    /**
     * Display the establish Philadelphia Presence page.
     *
     * @return View
     */
    public function index(): View {
        $subTitles                     = ['secure_mail_&_package_handling', 'privacy_protection', 'convenient_mail_management'];
        $establishPhiladelphiaPresence = EstablishPhiladelphiaPresence::firstOrNew();

        //# Ensure sub_description is an array for each sub_title
        $subDescriptions = is_string($establishPhiladelphiaPresence->sub_description) ? json_decode($establishPhiladelphiaPresence->sub_description, true) : $establishPhiladelphiaPresence->sub_description;

        return view('backend.layouts.establish_philadelphia_presence.index', compact('subTitles', 'establishPhiladelphiaPresence', 'subDescriptions'));
    }

    /**
     * Update the establish Philadelphia Presence.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse {
        $subTitles = ['secure_mail_&_package_handling', 'privacy_protection', 'convenient_mail_management'];

        $validatedData = $request->validate([
            'title'                  => 'required|string',
            'description'            => 'required|string',
            'sub_description'        => 'required|array',
            'sub_description.*'      => 'nullable|string',
            'thumbnail_image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'remove_thumbnail_image' => 'nullable|boolean',
            'video'                  => 'nullable|max:512000',
            'remove_video'           => 'nullable|boolean',
        ]);

        //~ Only save descriptions for the fixed sub_titles
        $filteredDescriptions = [];
        foreach ($subTitles as $subTitle) {
            $filteredDescriptions[$subTitle] = $request->input("sub_description.$subTitle", null);
        }

        $establishPhiladelphiaPresence = EstablishPhiladelphiaPresence::firstOrNew();
        $establishPhiladelphiaPresence->fill([
            'title'           => $validatedData['title'],
            'description'     => $validatedData['description'],
            'sub_description' => json_encode($filteredDescriptions),
        ]);

        //* Handle thumbnail image file
        if ($request->boolean('remove_thumbnail_image')) {
            if ($establishPhiladelphiaPresence->thumbnail_image) {
                Helper::fileDelete(public_path($establishPhiladelphiaPresence->thumbnail_image));
                $establishPhiladelphiaPresence->thumbnail_image = null;
            }
        } elseif ($request->hasFile('thumbnail_image')) {
            if ($establishPhiladelphiaPresence->thumbnail_image) {
                Helper::fileDelete(public_path($establishPhiladelphiaPresence->thumbnail_image));
            }
            $establishPhiladelphiaPresence->thumbnail_image = Helper::fileUpload($request->file('thumbnail_image'), 'establishPhiladelphiaPresence', $establishPhiladelphiaPresence->thumbnail_image);
        }

        //^ Handle video
        if ($request->boolean('remove_video')) {
            if ($establishPhiladelphiaPresence->video) {
                Helper::fileDelete(public_path($establishPhiladelphiaPresence->video));
                $establishPhiladelphiaPresence->video = null;
            }
        } elseif ($request->hasFile('video')) {
            if ($establishPhiladelphiaPresence->video) {
                Helper::fileDelete(public_path($establishPhiladelphiaPresence->video));
            }
            $establishPhiladelphiaPresence->video = Helper::fileUpload($request->file('video'), 'establishPhiladelphiaPresence', $establishPhiladelphiaPresence->video);
        }

        $establishPhiladelphiaPresence->save();

        return redirect()->route('establish-philadelphia-presence.index')->with('t-success', 'Establish Philadelphia Presence Updated Successfully.');
    }
}
