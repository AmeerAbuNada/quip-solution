<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Product\StoreProductRequest;
use App\Http\Requests\Dashboard\Product\ToggleOptionRequest;
use App\Http\Requests\Dashboard\Product\UpdateProductRequest;
use App\Models\Image;
use App\Models\Product;
use App\Models\SubCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::with('subCategory')->select('*');
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                <a href="' . route('products.edit', $row->id) . '" class="btn btn-icon btn-primary"><i class="fas fa-edit fs-4"></i></a>
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
                ->addColumn('category', function ($row) {
                    return $row->subCategory->name_en . ' - ' . $row->subCategory->name_ar;
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
                ->addColumn('best_selling', function ($row) {
                    $input = '<input onclick="toggleOptions(' . $row->id . ', \'is_best_selling\', this)" class="form-check-input" type="checkbox"';
                    if ($row->is_best_selling) {
                        $input .= ' checked>';
                    } else {
                        $input .= ' >';
                    }
                    return $input;
                })
                ->rawColumns(['action', 'image', 'active', 'best_selling'])
                ->make(true);
        }
        return response()->view('dashboard.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = SubCategory::all();
        return response()->view('dashboard.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $data['is_active'] == 'true';
        $data['is_best_selling'] = $data['is_best_selling'] == 'true';


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
            $image = $file->storePubliclyAs('files/products', $imageName, ['disk' => 'public']);
            $data['image'] = $image;
        }

        if ($request->hasFile('catalog')) {
            $file = $request->file('catalog');
            $imageName = time() . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
            $image = $file->storePubliclyAs('files/products/catalogs', $imageName, ['disk' => 'public']);
            $data['catalog'] = $image;
        }

        try {
            DB::beginTransaction();
            $product = new Product($data);
            $isSaved = $product->save();
            if ($isSaved) {
                if ($request->hasFile('images')) {
                    $images = [];
                    foreach ($request->file('images') as $image) {
                        $imageName = time() . '_' . rand(1, 1000000) . '.' . $image->getClientOriginalExtension();
                        $image = $image->storePubliclyAs('files/products/product_' . $product->id, $imageName, ['disk' => 'public']);
                        $productImage = new Image();
                        $productImage->product_id = $product->id;
                        $productImage->path = $image;
                        array_push($images, $productImage);
                    }
                    $product->images()->saveMany($images);
                }
                DB::commit();
                return parent::successResponse();
            } else {
                return parent::errorResponse();
            }
        } catch (Exception $ex) {
            DB::rollBack();
            return parent::errorResponse();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = SubCategory::all();
        return response()->view('dashboard.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['is_active'] = $data['is_active'] == 'true';
        $data['is_best_selling'] = $data['is_best_selling'] == 'true';


        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('' . $product->image);
            $file = $request->file('image');
            $imageName = time() . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
            $image = $file->storePubliclyAs('files/products', $imageName, ['disk' => 'public']);
            $data['image'] = $image;
        }

        if ($request->hasFile('catalog')) {
            Storage::disk('public')->delete('' . $product->catalog);
            $file = $request->file('catalog');
            $imageName = time() . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
            $image = $file->storePubliclyAs('files/products/catalogs', $imageName, ['disk' => 'public']);
            $data['catalog'] = $image;
        }

        try {
            DB::beginTransaction();
            $updated = $product->update($data);
            if ($updated) {
                if ($request->hasFile('images')) {
                    $images = [];
                    foreach ($request->file('images') as $image) {
                        $imageName = time() . '_' . rand(1, 1000000) . '.' . $image->getClientOriginalExtension();
                        $image = $image->storePubliclyAs('files/products/product_' . $product->id, $imageName, ['disk' => 'public']);
                        $productImage = new Image();
                        $productImage->product_id = $product->id;
                        $productImage->path = $image;
                        array_push($images, $productImage);
                    }
                    $product->images()->saveMany($images);
                }
                DB::commit();
                return parent::successResponse();
            } else {
                return parent::errorResponse();
            }
        } catch (Exception $ex) {
            DB::rollBack();
            return parent::errorResponse();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $deleted = $product->delete();
        if ($deleted) {
            Storage::disk('public')->delete('' . $product->image);
            Storage::disk('public')->delete('' . $product->catalog);
            Storage::disk('public')->deleteDirectory('files/products/product_' . $product->id);
        }
        return $deleted ? parent::successResponse() : parent::errorResponse();
    }



    public function toggleOption(Product $product, ToggleOptionRequest $request)
    {
        $product[$request->input('type')] = $request->input('value');
        $isSaved = $product->save();
        return $isSaved ? parent::successResponse() : parent::errorResponse();
    }



    public function deleteImage(Image $image)
    {
        $deleted = $image->delete();
        if ($deleted) Storage::disk('public')->delete('' . $image->path);
        return $deleted ? parent::successResponse() : parent::errorResponse();
    }
}
