<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Feature\StoreFeatureRequest;
use App\Http\Requests\Dashboard\Feature\ToggleOptionRequest;
use App\Http\Requests\Dashboard\Feature\UpdateFeatureRequest;
use App\Models\Feature;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Feature::select('*');
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                <a href="' . route('features.edit', $row->id) . '" class="btn btn-icon btn-primary"><i class="fas fa-edit fs-4"></i></a>
                                        <button type="button" onclick="delItem(\'' . $row->id . '\',this)"
                                            class="btn btn-icon btn-danger"><i class="fas fa-trash fs-4"></i></button>
                ';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d h:i a');
                })
                ->addColumn('image', function ($row) {
                    return '<img src="' .  $row->image_url  . '" class="w-100">';
                })
                ->addColumn('active', function ($row) {
                    $input = '<input onclick="toggleOptions(' . $row->id . ', \'is_active\', this)" class="form-check-input" type="checkbox"';
                    if ($row->is_active) {
                        $input .= ' checked>';
                    } else {
                        $input .= ' >';
                    }
                    return $input;
                })
                ->rawColumns(['action', 'image', 'active'])
                ->make(true);
        }
        return response()->view('dashboard.features.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('dashboard.features.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeatureRequest $request)
    {
        $feature = new Feature($request->validated());
        $isSaved = $feature->save();
        return $isSaved ? parent::successResponse() : parent::errorResponse();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return response()->view('dashboard.features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        $updated = $feature->update($request->validated());
        return $updated ? parent::successResponse() : parent::errorResponse();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        $deleted = $feature->delete();
        return $deleted ? parent::successResponse() : parent::errorResponse();
    }


    public function toggleOption(Feature $feature, ToggleOptionRequest $request)
    {
        $feature[$request->input('type')] = $request->input('value');
        $isSaved = $feature->save();
        return $isSaved ? parent::successResponse() : parent::errorResponse();
    }
}
