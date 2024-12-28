<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProductCategoryController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminProductSkuController;
use App\Http\Controllers\AdminProductSubCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [
  AdminDashboardController::class,
  'index'
])->name('admin.index');

// product categories
Route::prefix('admin')
  ->name('admin.')
  ->group(function () {
    Route::resource('product-categories', AdminProductCategoryController::class);
  });

// product sub categories
Route::prefix('admin')
  ->name('admin.')
  ->group(function () {
    Route::resource('product-sub-categories', AdminProductSubCategoryController::class);
  });

// products
Route::prefix('admin')
  ->name('admin.')
  ->group(function () {
    Route::resource('products', AdminProductController::class);
  });

// product skus
Route::prefix('admin')
  ->name('admin.')
  ->group(function () {
    Route::resource('product-skus', AdminProductSkuController::class);
  });

Route::delete('/admin/product-skus/{product_sku}/delete-image', [
  AdminProductSkuController::class,
  'deleteImage'
])->name('admin.product-skus.delete-image');
