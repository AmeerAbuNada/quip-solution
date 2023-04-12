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
use App\Models\Maintenance;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{

  public function index()
  {
    $categories = Category::all();
    $projects = Project::where('is_active', true)->get();
    $products = Product::where('is_active', true)->where('is_best_selling', true)->get();
    return response()->view('landing.index', compact('categories', 'projects', 'products'));
  }

  public function products(Request $request) {
    $validator = validator($request->all(), [
      'category' => 'nullable|integer|exists:categories,id',
    ]);
    if($validator->fails()) return abort(Response::HTTP_NOT_FOUND);
    
    $categories = Category::with('activeProducts')->get();
    $products = Product::all();
    return response()->view('landing.products', compact('categories', 'products'));
  }

  public function productDetails($product) {
    $product = Product::where('is_active', true)->findOrFail($product);
    $categories = Category::all();
    return response()->view('landing.product-details', compact('product', 'categories'));
  }

  public function contactUs() {
    $categories = Category::all();
    return response()->view('landing.contact-us', compact('categories'));
  }

  public function maintenance() {
    $categories = Category::all();
    return response()->view('landing.maintenance', compact('categories'));
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
