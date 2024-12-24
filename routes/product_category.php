<?php

use App\Http\Controllers\AdminHomePageController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// index
Route::get('/product-categories', [
  ProductCategoryController::class,
  'index'
])->name('product-categories.index');

// show
Route::get('/product-categories/{productCategory:slug}', [
  ProductCategoryController::class,
  'index'
])->name('product-categories.show');
