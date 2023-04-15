<?php

namespace App\Http\Controllers\Landing;

use App\Events\NewContactEvent;
use App\Events\NewMaintenanceRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Landing\StoreContactRequest;
use App\Http\Requests\Landing\StoreMaintenaceRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Feature;
use App\Models\Maintenance;
use App\Models\Product;
use App\Models\Project;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{

  public function index()
  {
    $mainCategories = Category::query()->whereDoesntHave('subCategories')->get();
    $categoriesWithSubs = Category::query()->whereHas('subCategories')->get();
    $projects = Project::where('is_active', true)->get();
    $products = Product::where('is_active', true)->where('is_best_selling', true)->get();
    return response()->view('landing.index', compact('categoriesWithSubs', 'projects', 'products', 'mainCategories'));
  }

  public function products(Request $request)
  {
    $validator = validator($request->all(), [
      'category' => 'nullable|integer|exists:categories,id',
      'sub_category' => 'nullable|integer|exists:sub_categories,id',
    ]);
    if ($validator->fails()) return abort(Response::HTTP_NOT_FOUND);
    if ($request->sub_category) {
      $products = Product::where('sub_category_id', $request->sub_category)->where('is_active', true)->get();
    } else {
      $products = Product::all();
    }
    $mainCategories = Category::query()->whereDoesntHave('subCategories')->get();
    $categoriesWithSubs = Category::query()->whereHas('subCategories')->get();
    return response()->view('landing.products', compact('products', 'mainCategories', 'categoriesWithSubs'));
  }

  public function productDetails($product)
  {
    $product = Product::where('is_active', true)->findOrFail($product);
    $mainCategories = Category::query()->whereDoesntHave('subCategories')->get();
    $categoriesWithSubs = Category::query()->whereHas('subCategories')->get();
    return response()->view('landing.product-details', compact('product', 'mainCategories', 'categoriesWithSubs'));
  }

  public function contactUs()
  {
    $mainCategories = Category::query()->whereDoesntHave('subCategories')->get();
    $categoriesWithSubs = Category::query()->whereHas('subCategories')->get();
    return response()->view('landing.contact-us', compact('mainCategories', 'categoriesWithSubs'));
  }

  public function maintenance()
  {
    $mainCategories = Category::query()->whereDoesntHave('subCategories')->get();
    $categoriesWithSubs = Category::query()->whereHas('subCategories')->get();
    return response()->view('landing.maintenance', compact('mainCategories', 'categoriesWithSubs'));
  }

  public function acw()
  {
    $mainCategories = Category::query()->whereDoesntHave('subCategories')->get();
    $categoriesWithSubs = Category::query()->whereHas('subCategories')->get();
    $features = Feature::where('is_active', true)->get();
    return response()->view('landing.acw', compact('mainCategories', 'categoriesWithSubs', 'features'));
  }

  public function changeLocale($locale)
  {
    if (!in_array($locale, ['en', 'ar'])) return abort(Response::HTTP_NOT_FOUND);
    Session::put('locale', $locale);
    return redirect()->back();
  }

  public function sendContactMessage(StoreContactRequest $request)
  {
    $contact = new Contact($request->validated());
    $isSaved = $contact->save();
    if ($isSaved) {
      event(new NewContactEvent());
      return response()->json([
        'message' => App::isLocale('en') ? 'Message Sent Successfully!' : 'تم إرسال الرسالة بنجاح'
      ], Response::HTTP_CREATED);
    } else {
      return response()->json([
        'message' => App::isLocale('en') ? 'Something went wrong, Please try again.' : 'فشلت عملية الإرسال, يرجى المحاولة مرة أخرى'
      ], Response::HTTP_BAD_REQUEST);
    }
  }

  public function sendMaintenance(StoreMaintenaceRequest $request)
  {
    $maintenance = new Maintenance($request->validated());
    $isSaved = $maintenance->save();
    if ($isSaved) {
      event(new NewMaintenanceRequest());
      return response()->json([
        'message' => App::isLocale('en') ? 'Maintenace Request Sent Successfully!' : 'تم إرسال طلب الصيانة بنجاح'
      ], Response::HTTP_CREATED);
    } else {
      return response()->json([
        'message' => App::isLocale('en') ? 'Something went wrong, Please try again.' : 'فشلت عملية الإرسال, يرجى المحاولة مرة أخرى'
      ], Response::HTTP_BAD_REQUEST);
    }
  }
}
