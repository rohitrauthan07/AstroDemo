<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/', [HomeController::class, 'main'])->name('home');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/profile/update', [DashboardController::class, 'updateProfile'])->name('profile.update');
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/manage/{user}', [AdminController::class, 'manageCategories'])->name('admin.manageCategories');
    Route::post('admin/{user}/category', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
    Route::post('admin/{user}/subcategory', [AdminController::class, 'storeSubcategory'])->name('admin.storeSubcategory');
    Route::put('/admin/category/update/{id}', [AdminController::class, 'updateCategory'])->name('admin.updateCategory');
    Route::delete('/admin/category/delete/{id}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::put('/admin/subcategory/update/{id}', [AdminController::class, 'updateSubcategory'])->name('admin.updateSubcategory');
    Route::delete('/admin/subcategory/delete/{id}', [AdminController::class, 'deleteSubcategory'])->name('admin.deleteSubcategory');
    
});
