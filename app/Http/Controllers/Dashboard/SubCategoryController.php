<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SubCategory\StoreSubCategoryRequest;
use App\Http\Requests\Dashboard\SubCategory\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SubCategory::with('category')->select('*');
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                <a data-bs-toggle="modal" class="btn btn-icon btn-primary" onclick="showEdit(' . $row->id . ', \'' . $row->name_en . '\', \'' . $row->name_ar . '\', ' . $row->category_id . ')"
                                            data-bs-target="#kt_modal_edit_item"><i class="fas fa-edit fs-4"></i></a>
                                        <button type="button" onclick="delItem(\'' . $row->id . '\',this)"
                                            class="btn btn-icon btn-danger"><i class="fas fa-trash fs-4"></i></button>
                ';
                })
                ->addColumn('category', function ($row) {
                    return $row->category->name_en . ' - ' . $row->category->name_ar;
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d h:i a');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $categories = Category::all();
        return response()->view('dashboard.sub-categories.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $category = new SubCategory($request->validated());
        $isSaved = $category->save();
        return $isSaved ? parent::successResponse() : parent::errorResponse();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $sub_category)
    {
        $updated = $sub_category->update($request->validated());
        return $updated ? parent::successResponse() : parent::errorResponse();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $sub_category)
    {
        $deleted = $sub_category->delete();
        return $deleted ? parent::successResponse() : parent::errorResponse();
    }
}
