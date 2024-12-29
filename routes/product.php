<?php

use App\Http\Controllers\AdminHomePageController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// index
Route::get('/products', [
  ProductController::class,
  'index'
])->name('products.index');

// show
Route::get('/products/{product:slug}', [
  ProductController::class,
  'show'
])->name('products.show');
