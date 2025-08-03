<?php

namespace App\Http\Controllers\Web\Backend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\GrowPhiladelphiaBusiness;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GrowPhiladelphiaBusinessController extends Controller {
    /**
     * Display the grow philadelphia business page.
     *
     * @return View
     */
    public function index(): View {
        $subTitles                = ['mail_notifications', 'flexible_pickup_and_forwarding_options', 'personal_doorman_experience'];
        $growPhiladelphiaBusiness = GrowPhiladelphiaBusiness::firstOrNew();

        //# Ensure sub_description is an array for each sub_title
        $subDescriptions = is_string($growPhiladelphiaBusiness->sub_description) ? json_decode($growPhiladelphiaBusiness->sub_description, true) : $growPhiladelphiaBusiness->sub_description;

        return view('backend.layouts.grow_Philadelphia_Business.index', compact('subTitles', 'growPhiladelphiaBusiness', 'subDescriptions'));
    }

    /**
     * Update the grow philadelphia business.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse {
        $subTitles = ['mail_notifications', 'flexible_pickup_and_forwarding_options', 'personal_doorman_experience'];

        $validatedData = $request->validate([
            'title'             => 'required|string',
            'description'       => 'required|string',
            'sub_description'   => 'required|array',
            'sub_description.*' => 'nullable|string',
            'image'             => 'nullable',
            'remove_image'      => 'nullable|boolean',
        ]);

        //~ Only save descriptions for the fixed sub_titles
        $filteredDescriptions = [];
        foreach ($subTitles as $subTitle) {
            $filteredDescriptions[$subTitle] = $request->input("sub_description.$subTitle", null);
        }

        $growPhiladelphiaBusiness = GrowPhiladelphiaBusiness::firstOrNew();
        $growPhiladelphiaBusiness->fill([
            'title'           => $validatedData['title'],
            'description'     => $validatedData['description'],
            'sub_description' => json_encode($filteredDescriptions),
        ]);

        //* Handle image file
        if ($request->boolean('remove_image')) {
            if ($growPhiladelphiaBusiness->image) {
                Helper::fileDelete(public_path($growPhiladelphiaBusiness->image));
                $growPhiladelphiaBusiness->image = null;
            }
        } elseif ($request->hasFile('image')) {
            if ($growPhiladelphiaBusiness->image) {
                Helper::fileDelete(public_path($growPhiladelphiaBusiness->image));
            }
            $growPhiladelphiaBusiness->image = Helper::fileUpload($request->file('image'), 'growPhiladelphiaBusiness', $growPhiladelphiaBusiness->image);
        }

        $growPhiladelphiaBusiness->save();

        return redirect()->route('grow-philadelphia-business.index')->with('t-success', 'Grow Philadelphia Business Updated Successfully.');
    }
}
