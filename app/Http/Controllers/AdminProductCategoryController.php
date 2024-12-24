<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminProductCategoryController extends Controller
{
  public function index()
  {
    return Inertia::render('Admin/ProductCategory/Index');
  }
}
