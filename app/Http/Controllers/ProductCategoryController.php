<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
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
    // load the products relationship
    $productCategory->load([
      // products
      'products' => function ($query) {
        $query->where('active', 1)
          ->where('available', 1)
          ->orderBy('order');
        // ->select('id', 'product_category_id', 'name', 'description');
      },

      // product skus
      'products.productSkus' => function ($query) {
        $query
          ->where('active', 1)
          ->where('stock', '>', 0)
          ->select('id', 'product_id', 'price');
      },
    ]);

    $data = [
      'productCategory' => $productCategory
    ];

    $productCategory->makeHidden([
      'id',
      'slug',
      'created_at',
      'updated_at',
    ]);

    $productCategory->products->makeHidden([
      'id',
      'product_category_id',
      'order',
      'active',
      'available',
      'created_at',
      'updated_at',
    ]);

    return Inertia::render('ProductCategory/Show', $data);
  }
}
