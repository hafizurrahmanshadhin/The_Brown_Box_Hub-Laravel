<?php

namespace App\Http\Controllers\Web\Backend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\WorkProcess;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WorkProcessController extends Controller {
    /**
     * Display the work process page.
     *
     * @return View
     */
    public function index(): View {
        $subTitles   = ['order_online', 'get_notified', 'pick_up'];
        $workProcess = WorkProcess::firstOrNew();

        //# Ensure sub_description is an array for each sub_title
        $subDescriptions = is_string($workProcess->sub_description) ? json_decode($workProcess->sub_description, true) : $workProcess->sub_description;

        return view('backend.layouts.work_process.index', compact('subTitles', 'workProcess', 'subDescriptions'));
    }

    /**
     * Update the work process.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse {
        $subTitles = ['order_online', 'get_notified', 'pick_up'];

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

        $workProcess = WorkProcess::firstOrNew();
        $workProcess->fill([
            'title'           => $validatedData['title'],
            'description'     => $validatedData['description'],
            'sub_description' => json_encode($filteredDescriptions),
        ]);

        //* Handle image file
        if ($request->boolean('remove_image')) {
            if ($workProcess->image) {
                Helper::fileDelete(public_path($workProcess->image));
                $workProcess->image = null;
            }
        } elseif ($request->hasFile('image')) {
            if ($workProcess->image) {
                Helper::fileDelete(public_path($workProcess->image));
            }
            $workProcess->image = Helper::fileUpload($request->file('image'), 'workProcess', $workProcess->image);
        }
        $workProcess->save();

        return redirect()->route('work-process.index')->with('t-success', 'Work Process updated successfully.');
    }
}
