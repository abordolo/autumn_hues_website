<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductCategoryController extends Controller
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

    return Inertia::render('ProductCategory/Index', $data);
  }

  public function show(ProductCategory $productCategory)
  {
    $productSubCategories = ProductSubCategory::query()
      ->where('product_category_id', $productCategory->id)
      ->where('active', 1)
      ->where('available', 1)
      ->orderBy('order')
      ->get([
        'id',
        'name',
        'icon',
        'slug',
      ]);

    $products = Product::query()
      ->where('product_category_id', $productCategory->id)
      ->where('active', 1)
      ->where('available', 1)
      ->with([
        'images' => function ($query) {
          $query
            ->orderBy('order')
            ->select('id', 'product_id', 'path');
        },
        'productSkus' => function ($query) {
          $query
            ->where('active', 1)
            ->where('stock', '>', 1)
            ->orderBy('price')
            ->select('id', 'product_id', 'price');
        },
      ])
      ->orderBy('order')
      ->get();

    $data = [
      'productCategory' => $productCategory,
      'productSubCategories' => $productSubCategories,
      'products' => $products,
    ];

    return Inertia::render('ProductCategory/Show', $data);
  }
}
