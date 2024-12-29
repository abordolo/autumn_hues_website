<?php

use App\Http\Controllers\ContactUsPageController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestPageController;
use App\Models\ProductCategory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;


Route::get('/test', [
  TestPageController::class,
  'index'
])->name('test.index');

Route::get('/', [
  HomePageController::class,
  'index'
])->name('home.index');

Route::get('/contact-us', [
  ContactUsPageController::class,
  'index'
])->name('contact-us.index');

require __DIR__ . '/product_category.php';
require __DIR__ . '/product.php';

require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
