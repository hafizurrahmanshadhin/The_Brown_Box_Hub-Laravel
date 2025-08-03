<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class UserController extends Controller {
    /**
     * Display the list of all users.
     *
     * @param Request $request
     * @return View|JsonResponse
     * @throws Exception
     */
    public function index(Request $request): View | JsonResponse {
        if ($request->ajax()) {
            $data = User::where('role', 'user')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    $name       = $data->firstName . ' ' . $data->lastName;
                    $short_name = strlen($name) > 40 ? substr($name, 0, 40) . '...' : $name;
                    return $short_name;
                })

                ->addColumn('address', function ($data) {
                    $address = $data->address;

                    if (is_null($address)) {
                        return '<p>N/A</p>';
                    }

                    $shortAddress = strlen($address) > 100 ? substr($address, 0, 100) . '...' : $address;
                    return '<p>' . $shortAddress . '</p>';
                })
                ->rawColumns(['name', 'address'])
                ->make();
        }
        return view('backend.layouts.users.index');
    }
}
