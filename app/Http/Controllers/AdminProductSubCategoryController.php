<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminProductSubCategoryController extends Controller
{
  public function index()
  {
    return Inertia::render('Admin/ProductSubCategory/Index');
  }
}
