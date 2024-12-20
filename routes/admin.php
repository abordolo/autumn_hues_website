<?php

use App\Http\Controllers\AdminHomePageController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/admin', [
  AdminHomePageController::class,
  'index'
])->name('admin.index');

require __DIR__ . '/product_category.php';
