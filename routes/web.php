<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\GlassCategoryController;
use App\Http\Controllers\CaseCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;

Route::middleware(['redirect.authenticated'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('language/{locale}', [App\Http\Controllers\LanguageController::class, 'switch'])
        ->name('language.switch');
    Route::get('mode/{locale}', [App\Http\Controllers\LanguageController::class, 'modeSwitch'])
        ->name('mode.switch');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/users', UserController::class);

    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('user', UserController::class);

    Route::post('product-category/change-status', [ProductCategoryController::class, 'changeStatus']);
    Route::resource('product-category', ProductCategoryController::class);

    Route::post('glass-category/change-status', [GlassCategoryController::class, 'changeStatus']);
    Route::resource('glass-category', GlassCategoryController::class);

    Route::post('case-category/change-status', [CaseCategoryController::class, 'changeStatus']);
    Route::resource('case-category', CaseCategoryController::class);
});

require __DIR__ . '/auth.php';
