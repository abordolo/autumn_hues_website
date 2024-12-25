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

  public function show(ProductSku $productSku)
  {
    $sections = [
      [
        'title' => 'Product SKU Details',
        'type' => 'block',
        'fields' => [
          [
            'title' => 'ID',
            'type' => 'string',
            'value' => $productSku->id,
          ],

          [
            'title' => 'Name',
            'type' => 'string',
            'value' => $productSku->name,
          ],

          [
            'title' => 'Price',
            'type' => 'string',
            'value' => $productSku->price,
          ],

          [
            'title' => 'Stock',
            'type' => 'string',
            'value' => $productSku->stock,
          ],

          [
            'title' => 'Active',
            'type' => 'string',
            'value' => $productSku->active ? 'Yes' : 'No',
          ],
        ],
      ],

      [
        'title' => 'Product SKU Description',
        'type' => 'text',
      ],

      [
        'title' => 'Related To',
        'type' => 'block',
        'fields' => [
          [
            'title' => 'Product Category',
            'type' => 'string',
            'value' => $productSku->productCategory->name,
          ],

          [
            'title' => 'Product',
            'type' => 'string',
            'value' => $productSku->product->name,
          ],
        ],
      ],
    ];

    $data = [
      'productSku' => $productSku->only('id'),
      'heading' => 'Product SKU Details',
      'sections' => $sections,
    ];

    return Inertia::render('Admin/ProductSku/Show', $data);
  }

  public function Edit(ProductSku $productSku)
  {
    $data = [
      'heading' => 'Edit Product SKU',
      'productSku' => $productSku,
    ];

    return Inertia::render('Admin/ProductSku/Edit', $data);
  }

  public function update(Request $request, ProductSku $productSku)
  {
    dd('product sku update');
    $productSku->update($request->all());

    return redirect()->route('admin.product_sku.show', $productSku);
  }
}
