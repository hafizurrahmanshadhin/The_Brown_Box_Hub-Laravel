<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class SubscriptionController extends Controller {
    /**
     * Display a listing of subscription packages.
     *
     * @param Request $request
     * @return View|JsonResponse
     * @throws Exception
     */
    public function index(Request $request): View | JsonResponse {
        if ($request->ajax()) {
            $data = Subscription::with('features')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('description', function ($data) {
                    $description      = $data->description;
                    $shortDescription = strlen($description) > 20 ? substr($description, 0, 20) . '...' : $description;
                    return '<p>' . $shortDescription . '</p>';
                })
                ->addColumn('features', function ($data) {
                    $features    = $data->features->pluck('feature_name')->toArray();
                    $featureList = '<ul>';
                    foreach ($features as $feature) {
                        $featureList .= '<li>' . $feature . '</li>';
                    }
                    $featureList .= '</ul>';
                    return $featureList;
                })
                ->addColumn('status', function ($subscription) {
                    $status = '<div class="form-check form-switch" style="margin-left: 40px; width: 50px; height: 24px;">';
                    $status .= '<input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck' . $subscription->id . '" ' . ($subscription->status == 'active' ? 'checked' : '') . ' onclick="showStatusChangeAlert(' . $subscription->id . ')">';
                    $status .= '</div>';

                    return $status;
                })
                ->addColumn('action', function ($subscription) {
                    return '
                            <div class="hstack gap-3 fs-base">
                                <a href="' . route('subscription.edit', ['id' => $subscription->id]) . '" class="link-primary text-decoration-none" title="Edit">
                                    <i class="ri-pencil-line" style="font-size: 24px;"></i>
                                </a>

                                <a href="javascript:void(0);" onclick="showDeleteConfirm(' . $subscription->id . ')" class="link-danger text-decoration-none" title="Delete">
                                    <i class="ri-delete-bin-5-line" style="font-size: 24px;"></i>
                                </a>
                            </div>
                        ';
                })
                ->rawColumns(['description', 'features', 'status', 'action'])
                ->make(true);
        }
        return view('backend.layouts.subscription.index');
    }

    /**
     * Show the form for creating a new subscription package.
     *
     * @return View
     */
    // public function create() {
    //     return view('backend.layouts.subscription.create');
    // }

    /**
     * Store a newly created subscription package in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    // public function store(Request $request): RedirectResponse {
    //     $data = $request->validate([
    //         'name'        => 'required|string|in:Basic,Standard,Premium|max:255',
    //         'description' => 'nullable|string',
    //         'price'       => 'required|numeric|min:0',
    //         'deadline'    => 'required|in:monthly,yearly',
    //         'features'    => 'nullable|array',
    //         'features.*'  => 'string|max:255',
    //     ]);

    //     // Check if a subscription with the same name already exists
    //     $existingSubscription = Subscription::where('name', $data['name'])->first();
    //     if ($existingSubscription) {
    //         return redirect()->route('subscription.index')->with('t-error', 'A subscription plan with the name "' . $data['name'] . '" already exists. You can only update the existing plan.');
    //     }

    //     $subscription = Subscription::create($data);

    //     if (!empty($data['features'])) {
    //         foreach ($data['features'] as $feature) {
    //             $subscription->features()->create(['feature_name' => $feature]);
    //         }
    //     }

    //     return redirect()->route('subscription.index')->with('t-success', 'Subscription created successfully.');
    // }

    /**
     * Show the form for editing the specified subscription package.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id) {
        $subscription = Subscription::with('features')->findOrFail($id);
        return view('backend.layouts.subscription.edit', compact('subscription'));
    }

    /**
     * Update the specified subscription package in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse {
        $data = $request->validate([
            'name'        => 'required|string|in:Basic,Standard,Premium|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'deadline'    => 'required|in:monthly,yearly',
            'features'    => 'nullable|array',
            'features.*'  => 'string|max:255',
        ]);

        $subscription = Subscription::findOrFail($id);

        // Check if a subscription with the same name already exists, excluding the current one
        $existingSubscription = Subscription::where('name', $data['name'])
            ->where('id', '!=', $id)
            ->first();
        if ($existingSubscription) {
            return redirect()->route('subscription.index')->with('t-error', 'A subscription plan with the name "' . $data['name'] . '" already exists. You can only update the existing plan.');
        }

        $subscription->update($data);

        // Update features
        if (!empty($data['features'])) {
            $subscription->features()->delete(); // Delete existing features
            foreach ($data['features'] as $feature) {
                $subscription->features()->create(['feature_name' => $feature]);
            }
        }

        return redirect()->route('subscription.index')->with('t-success', 'Subscription updated successfully.');
    }

    /**
     * Toggle the status of the specified subscription package.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function status(int $id): JsonResponse {
        $subscription = Subscription::findOrFail($id);

        if ($subscription->status == 'active') {
            $subscription->status = 'inactive';
            $subscription->save();
            return response()->json([
                'success' => false,
                'message' => 'Unpublished Successfully.',
                'data'    => $subscription,
            ]);
        } else {
            $subscription->status = 'active';
            $subscription->save();
            return response()->json([
                'success' => true,
                'message' => 'Published Successfully.',
                'data'    => $subscription,
            ]);
        }
    }

    /**
     * Remove the specified subscription package from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();

        return response()->json([
            't-success' => true,
            'message'   => 'Deleted successfully.',
        ]);
    }
}
