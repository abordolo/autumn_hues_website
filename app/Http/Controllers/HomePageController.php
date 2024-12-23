<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomePageController extends Controller
{
  public function index()
  {
    $productCategories = ProductCategory::query()
      ->where('active', 1)
      ->where('available', 1)
      ->get([
        'id',
        'name',
        'icon',
        'slug',
      ]);

    $data = [
      'productCategories' => $productCategories
    ];

    return Inertia::render('Home/Index', $data);
  }
}
