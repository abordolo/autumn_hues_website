<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
  public function show(Product $product)
  {
    $data = [
      'product' => $product
    ];

    return Inertia::render('Product/Show', $data);
  }
}
