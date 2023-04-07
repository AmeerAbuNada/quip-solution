<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Maintenance::select('*');
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if ($row->status == 'pending') {
                        return '
                        <button type="button" onclick="getDescription(' . $row->id . ', this)" class="btn btn-icon btn-warning" ><i class="fas fa-eye fs-4"></i></button>
                                                <button type="button" onclick="delItem(\'' . $row->id . '\',this)"
                                                    class="btn btn-icon btn-danger"><i class="fas fa-trash fs-4"></i></button>
                        ';
                    }
                    return '
                    <button type="button" onclick="getDescription(' . $row->id . ', this)" class="btn btn-icon btn-success" ><i class="fas fa-eye fs-4"></i></button>
                                            <button type="button" onclick="delItem(\'' . $row->id . '\',this)"
                                                class="btn btn-icon btn-danger"><i class="fas fa-trash fs-4"></i></button>
                    ';
                })
                ->addColumn('message_raw', function ($row) {
                    return Str::limit($row->description, 40, '...');
                })
                ->addColumn('status_raw', function ($row) {
                    if ($row->status == 'completed') {
                        return '<span class="badge badge-light-success">' . __('maintenances.completed') . '</span>';
                    }
                    return '<span class="badge badge-light-warning">' . __('maintenances.pending') . '</span>';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d h:i a');
                })
                ->rawColumns(['action', 'status_raw'])
                ->make(true);
        }
        return response()->view('dashboard.maintenances.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Maintenance $maintenance)
    {
        return response()->json($maintenance);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        $maintenance->status = 'completed';
        $isSaved = $maintenance->save();
        return $isSaved ? parent::successResponse() : parent::errorResponse();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        $deleted = $maintenance->delete();
        return $deleted ? parent::successResponse() : parent::errorResponse();
    }
}
