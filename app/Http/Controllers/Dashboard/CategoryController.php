<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Category\StoreCategoryRequest;
use App\Http\Requests\Dashboard\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::select('*');
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                <a data-bs-toggle="modal" class="btn btn-icon btn-primary" onclick="showEdit(' . $row->id . ', \'' . $row->name_en . '\', \'' . $row->name_ar . '\')"
                                            data-bs-target="#kt_modal_edit_item"><i class="fas fa-edit fs-4"></i></a>
                                        <button type="button" onclick="delItem(\'' . $row->id . '\',this)"
                                            class="btn btn-icon btn-danger"><i class="fas fa-trash fs-4"></i></button>
                ';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d h:i a');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return response()->view('dashboard.categories.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category($request->validated());
        $isSaved = $category->save();
        return response()->json([
            'message' => $isSaved ? 'Category Created Successfully!' : 'Failed to create category, Please try again later.'
        ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $updated = $category->update($request->validated());
        return response()->json([
            'message' => $updated ? 'Category Updated Successfully!' : 'Failed to update category, Please try again later.'
        ], $updated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $deleted = $category->delete();
        return response()->json([
            'message' => $deleted ? 'Category Deleted Successfully!' : 'Failed to delete category, Please try again later.'
        ], $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
