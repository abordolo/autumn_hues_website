<?php

use App\Http\Controllers\ProductCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/product-categories', [
  ProductCategoryController::class,
  'index'
])->name('product-categories.index');

Route::get('/product-categories/{productCategory:slug}', [
  ProductCategoryController::class,
  'show'
])->name('product-categories.show');
