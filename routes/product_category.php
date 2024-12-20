<?php

use App\Http\Controllers\AdminHomePageController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::prefix('admin')
  ->name('admin.')
  ->group(function () {
    Route::resource('product-category', ProductCategoryController::class);
  });
