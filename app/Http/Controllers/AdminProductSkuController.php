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
          // id
          [
            'show' => [
              'label' => 'ID',
              'type' => 'string',
              'value' => $productSku->id,
            ],
          ],

          // name
          [
            'show' => [
              'label' => 'Name',
              'type' => 'string',
              'value' => $productSku->name,
            ],

            'edit' => [
              'label' => 'Name',
              'type' => 'text',
              'parameter' => 'name',
              'value' => $productSku->name,
              'placeholder' => 'Enter product sku name',
            ]
          ],

          // price
          [
            'show' => [
              'label' => 'Price',
              'type' => 'string',
              'value' => $productSku->price,
            ],

            'edit' => [
              'label' => 'Price',
              'type' => 'text',
              'parameter' => 'price',
              'value' => $productSku->price,
              'placeholder' => 'Enter product sku price',
            ]
          ],

          [
            'show' => [
              'label' => 'Stock',
              'type' => 'string',
              'value' => $productSku->stock,
            ],

            'edit' => [
              'label' => 'Stock',
              'type' => 'text',
              'parameter' => 'stock',
              'value' => $productSku->stock,
              'placeholder' => 'Enter product sku stock',
            ]
          ],

          [
            'show' => [
              'label' => 'Active',
              'type' => 'string',
              'value' => $productSku->active ? 'Yes' : 'No',
            ],

            'edit' => [
              'label' => 'Active',
              'type' => 'boolean',
              'parameter' => 'active',
              'value' => $productSku->active ? true : false,
              'placeholder' => null,
            ]
          ],
        ],
      ],

      [
        'title' => 'Product SKU Description',
        'type' => 'text',
        'fields' => [
          [
            'show' => [
              'label' => 'Description',
              'type' => 'string',
              'value' => $productSku->description,
            ],

            'edit' => [
              'label' => 'Description',
              'type' => 'textarea',
              'parameter' => 'description',
              'value' => $productSku->description,
              'placeholder' => 'Enter product sku description',
            ]
          ],
        ]
      ],

      [
        'title' => 'Related To',
        'type' => 'block',
        'fields' => [
          // product category
          [
            'show' => [
              'label' => 'Product Category',
              'type' => 'string',
              'value' => $productSku->productCategory->name,
            ],

            'edit' => [
              'label' => 'Product Category',
              'type' => 'select',
              'parameter' => 'product_category',
              'value' => $productSku->description,
              'placeholder' => 'Select product category',
            ]
          ],

          // product sub category
          [
            'show' => [
              'label' => 'Product Sub Category',
              'type' => 'string',
              'value' => $productSku->productSubCategory->name,
            ],

            'edit' => [
              'label' => 'Product Sub Category',
              'type' => 'select',
              'parameter' => 'product_sub_category',
              'value' => $productSku->description,
              'placeholder' => 'Select product sub category',
            ]
          ],

          [
            'show' => [
              'label' => 'Product',
              'type' => 'string',
              'value' => $productSku->product->name,
            ],

            'edit' => [
              'label' => 'Product',
              'type' => 'select',
              'parameter' => 'product',
              'value' => $productSku->description,
              'placeholder' => 'Select product',
            ]
          ]
        ],
      ],
    ];

    $data = [
      'productSku' => $productSku->only('id'),
      'heading' => 'Product SKU Details',
      'sections' => $sections,
      'updateRoute' => route('admin.product-skus.update', $productSku),
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
    $validated = $request->validate([
      'product_category_id' => [
        'nullable',
        'exists:product_categories,id',
      ],

      'product_sub_category_id' => [
        'nullable',
        'exists:product_sub_categories,id',
      ],

      'product_id' => [
        'nullable',
        'exists:products,id',
      ],

      'name' => [
        'nullable',
        'string',
        'min:3',
        'max:255',
        'unique:product_skus,name' . $productSku->name,
      ],

      'description' => [
        'nullable',
        'string',
        'max:255',
      ],

      'price' => [
        'nullable',
        'numeric',
      ],

      'stock' => [
        'nullable',
        'numeric',
      ],

      'active' => [
        'nullable',
        'boolean',
      ],
    ]);

    if (isset($validated['product_category_id'])) {
      $productSku->product_category_id = $validated['product_category_id'];
    }

    if (isset($validated['product_sub_category_id'])) {
      $productSku->product_sub_category_id = $validated['product_sub_category_id'];
    }

    if (isset($validated['product_id'])) {
      $productSku->product_id = $validated['product_id'];
    }

    if (isset($validated['name'])) {
      $productSku->name = $validated['name'];
    }

    if (isset($validated['description'])) {
      $productSku->description = $validated['description'];
    }

    if (isset($validated['price'])) {
      $productSku->price = $validated['price'];
    }

    if (isset($validated['stock'])) {
      $productSku->stock = $validated['stock'];
    }

    if (isset($validated['active'])) {
      $productSku->active = $validated['active'];
    }

    $productSku->save();

    // return redirect()->route('admin.product_sku.show', $productSku);
  }
}
