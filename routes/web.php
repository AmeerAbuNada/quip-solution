<?php

use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Landing\MainController;
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

Route::middleware('auth')->prefix('/dashboard')->group(function () {
  Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
  Route::resource('admins', AdminController::class)->except(['create']);
  Route::resource('categories', CategoryController::class)->except(['show', 'create', 'edit']);
  Route::resource('contacts', ContactController::class)->only(['index', 'destroy']);

  Route::resource('products', ProductController::class)->except(['show']);
  Route::put('/products/{product}/toggle', [ProductController::class, 'toggleOption']);
  Route::delete('/products/images/{image}', [ProductController::class, 'deleteImage']);

  Route::resource('projects', ProjectController::class)->except(['show']);
  Route::put('/projects/{project}/toggle', [ProjectController::class, 'toggleOption']);

  Route::prefix('/account')->controller(AccountController::class)->group(function () {
    Route::get('/', 'profile')->name('account.profile');
    Route::get('/settings', 'settings')->name('account.settings');
    Route::put('/settings', 'saveSettings')->name('account.save-settings');
    Route::put('/change-email', 'changeEmail')->name('account.change-email');
    Route::put('/change-password', 'changePassword')->name('account.change-password');
  });

  Route::prefix('/settings')->controller(SettingController::class)->group(function () {
    Route::get('/', 'general')->name('settings.general');
    Route::post('/', 'update')->name('settings.update');
  });

  Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::redirect('/', '/en');
Route::middleware('locale')->prefix('{locale}')->group(function () {
});
