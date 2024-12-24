<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;
use App\Models\ProductCategory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [
  HomePageController::class,
  'index'
])->name('home.index');

require __DIR__ . '/product_category.php';

require __DIR__ . '/admin.php';

require __DIR__ . '/auth.php';
