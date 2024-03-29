<?php

use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\FeatureController;
use App\Http\Controllers\Dashboard\MaintenanceController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Landing\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
  Route::prefix('/login')->controller(LoginController::class)->group(function () {
    Route::get('/', 'showLogin')->name('login');
    Route::post('/', 'login')->name('login.post');
  });

  Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('/forgot-password', 'showForgotPassword')->name('password.request');
    Route::post('/forgot-password', 'forgotPassword')->name('password.email');
    Route::get('/reset-password/{token}', 'showResetPassword')->name('password.reset');
    Route::post('/reset-password', 'resetPassword')->name('password.update');
  });
});

Route::middleware(['auth', 'locale'])->prefix('/dashboard')->group(function () {
  // Route::middleware('auth')->prefix('/dashboard')->group(function () {
  Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
  Route::get('/contacts/api', [DashboardController::class, 'contacts'])->name('dashboard.contacts');
  Route::get('/maintenances/api', [DashboardController::class, 'maintenances'])->name('dashboard.maintenances');


  Route::resource('admins', AdminController::class)->except(['create']);
  Route::resource('categories', CategoryController::class)->except(['create', 'show', 'edit']);
  Route::resource('contacts', ContactController::class)->only(['index', 'show', 'destroy']);
  Route::put('/contacts/{contact}/reply', [ContactController::class, 'reply'])->name('contacts.reply');

  Route::resource('products', ProductController::class)->except(['show']);
  Route::put('/products/{product}/toggle', [ProductController::class, 'toggleOption']);
  Route::delete('/products/images/{image}', [ProductController::class, 'deleteImage']);

  Route::resource('projects', ProjectController::class)->except(['show']);
  Route::put('/projects/{project}/toggle', [ProjectController::class, 'toggleOption']);

  Route::resource('maintenances', MaintenanceController::class)->except(['create', 'edit', 'store']);

  Route::resource('features', FeatureController::class)->except(['show']);
  Route::put('/features/{feature}/toggle', [FeatureController::class, 'toggleOption']);

  Route::prefix('/account')->controller(AccountController::class)->group(function () {
    Route::get('/', 'profile')->name('account.profile');
    Route::get('/settings', 'settings')->name('account.settings');
    Route::put('/settings', 'saveSettings')->name('account.save-settings');
    Route::put('/change-email', 'changeEmail')->name('account.change-email');
    Route::put('/change-password', 'changePassword')->name('account.change-password');
  });

  Route::prefix('/settings')->controller(SettingController::class)->group(function () {
    Route::get('/', 'general')->name('settings.general');
    Route::get('/home', 'home')->name('settings.home');
    Route::get('/autoequip', 'autoequip')->name('settings.autoequip');
    Route::post('/', 'update')->name('settings.update');
  });

  Route::get('/language/{locale}', [DashboardController::class, 'changeLocale'])->name('dashboard.locale');

  Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['locale', 'location'])->group(function () {
  Route::get('/', [MainController::class, 'index'])->name('landing.index');
  Route::get('/products', [MainController::class, 'products'])->name('landing.products');
  Route::get('/products/{product}', [MainController::class, 'productDetails'])->name('landing.product-details');
  Route::get('/contact-us', [MainController::class, 'contactUs'])->name('landing.contact');
  Route::get('/maintenance', [MainController::class, 'maintenance'])->name('landing.maintenance');
  Route::get('/acw', [MainController::class, 'acw'])->name('landing.acw');

  Route::get('/language/{locale}', [MainController::class, 'changeLocale'])->name('landing.locale');
  Route::post('/contact', [MainController::class, 'sendContactMessage'])->name('contact.post');
  Route::post('/maintenance', [MainController::class, 'sendMaintenance'])->name('maintenance.post');
});

Route::get('/start', function() {
  if(!App::isProduction()) {
    Artisan::call('migrate');
    Artisan::call('db:seed');
    Artisan::call('storage:link');
    echo 'done';
  } else {
    return abort(404);
  }
});
