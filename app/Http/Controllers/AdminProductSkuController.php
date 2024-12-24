<?php

namespace App\Http\Controllers;

use App\Models\ProductSku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AdminProductSkuController extends Controller
{
  public function index()
  {
    $productFilterString = 'Ear Ring 1';

    // $productSkus = ProductSku::query()
    //   ->select('id', 'name', 'product_id', 'product_category_id', 'price')
    //   ->orderBy('name')
    //   ->with([
    //     'product' => function ($query) use ($productFilterString) {
    //       $query->select('id', 'name');
    //     },
    //     'productCategory' => function ($query) {
    //       $query->select('id', 'name');
    //     },
    //   ])
    //   ->paginate();

    $productSkus = DB::table('product_skus')
      ->join(
        'products',
        'product_skus.product_id',
        '=',
        'products.id'
      )
      ->join(
        'product_categories',
        'product_skus.product_category_id',
        '=',
        'product_categories.id'
      )
      ->orderBy('product_skus.name')
      ->select(
        'product_skus.id',
        'product_skus.name',
        'product_skus.price',
        'product_skus.stock',
        'product_skus.active',
        'products.name as product',
        'product_categories.name as product_category'
      )
      ->paginate();

    $columns = [
      [
        'name' => 'id',
        'title' => 'ID',
        'type' => 'string',
        'key' => 'id',
      ],

      [
        'name' => 'name',
        'title' => 'Name',
        'type' => 'string',
        'key' => 'name',
      ],

      [
        'name' => 'product_category',
        'title' => 'Product Category',
        'type' => 'string',
        'key' => 'product_category',
      ],

      [
        'name' => 'product',
        'title' => 'Product',
        'type' => 'string',
        'key' => 'product',
      ],

      [
        'name' => 'price',
        'title' => 'Price',
        'type' => 'string',
        'key' => 'price',
      ],

      [
        'name' => 'stock',
        'title' => 'Stock',
        'type' => 'string',
        'key' => 'stock',
      ],

      [
        'name' => 'active',
        'title' => 'Active',
        'type' => 'boolean',
        'key' => 'active',
      ],
    ];

    $data = [
      'productSkus' => $productSkus,
      'columns' => $columns,
      'paginated' => true
    ];
    return Inertia::render('Admin/ProductSku/Index', $data);
  }
}
