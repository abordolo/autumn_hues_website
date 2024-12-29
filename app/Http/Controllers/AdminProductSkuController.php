<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductSku;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Illuminate\Support\Str;

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
    // product categories for dropdown
    $productCategories = ProductCategory::query()
      ->where('active', true)
      ->orderBy('name')
      ->get([
        'id',
        'name as label'
      ]);

    // product sub categories for dropdown
    $productSubCategories = ProductSubCategory::query()
      ->where('active', true)
      ->orderBy('name')
      ->get([
        'id',
        'name as label'
      ]);

    // products for dropdown
    $products = Product::query()
      ->where('active', true)
      ->orderBy('name')
      ->get([
        'id',
        'name as label'
      ]);


    $sections = [
      // block section
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

          // stock
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

          // active
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

      // description section
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

      // related to section
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
              'value' => [
                'id' => $productSku->productCategory->id,
                'label' => $productSku->productCategory->name,
              ],
              'options' => $productCategories,
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
              'value' => [
                'id' => $productSku->productSubCategory->id,
                'label' => $productSku->productSubCategory->name,
              ],
              'options' => $productSubCategories,
              'placeholder' => 'Select product sub category',
            ]
          ],

          // product
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
              'value' => [
                'id' => $productSku->product->id,
                'label' => $productSku->product->name,
              ],
              'options' => $products,
              'placeholder' => 'Select product',
            ]
          ]
        ],
      ],
      // related to section
    ];

    $images = $productSku->images->map(function ($image) {
      return [
        'id' => $image->id,
        'path' => $image->path,
      ];
    });

    $data = [
      'productSku' => $productSku->only('id', 'name'),
      'heading' => 'Product SKU Details',
      'sections' => $sections,
      'images' => $images,
      'updateRoute' => route('admin.product-skus.update', $productSku),
      'deleteImageRoute' => route('admin.product-skus.delete-image', $productSku),
      'addImageRoute' => route('admin.product-skus.add-image', $productSku),
      'editResourceRoute' => route('admin.product-skus.edit', $productSku),
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
      'product_category' => [
        'nullable',
      ],

      'product_category.id' => [
        'nullable',
        'exists:product_categories,id',
      ],

      'product_sub_category' => [
        'nullable',
      ],

      'product_sub_category.id' => [
        'nullable',
        'exists:product_sub_categories,id',
      ],

      'product' => [
        'nullable',
      ],

      'product.id' => [
        'nullable',
        'exists:products,id',
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

    // get non null parameters
    $nonNullParameters = array_filter(
      $validated,
      function ($value) {
        return $value !== null;
      }
    );

    if (!count($nonNullParameters)) {
      // flash error message
      $request->session()->flash('flashData', [
        'warning' => 'No value provided for update.',
      ]);
    }

    // normal parameters
    $nonSelectParameters = [
      'name',
      'description',
      'price',
      'stock',
      'active',
    ];

    // parameters coming from select fields
    $selectParameters = [
      'product_category',
      'product_sub_category',
      'product',
    ];

    foreach ($nonSelectParameters as $parameter) {
      if (isset($validated[$parameter])) {
        $productSku->$parameter = $validated[$parameter];
      }
    }

    foreach ($selectParameters as $parameter) {
      if (isset($validated[$parameter])) {
        $idParameter = $parameter . '_id';
        $productSku->$idParameter = $validated[$parameter]['id'];
      }
    }

    $productSku->save();
  }

  public function deleteImage(Request $request, ProductSku $productSku)
  {
    $validated = $request->validate([
      'image_id' => [
        'required',
        'exists:product_images,id',
      ],
    ]);

    $image = ProductImage::find($validated['image_id']);
    $image->delete();
  }

  public function addImage(Request $request, ProductSku $productSku)
  {
    // dd('add image');
    $productSku->load([
      'product',
      'productCategory',
      'productSubCategory',
    ]);

    $request->validate([
      'image' => [
        'required',
        'image',
        'mimes:jpeg,png,jpg,gif,svg',
        'max:2048',
      ],
    ]);

    // components for the filename
    $productNameSlug = Str::slug($productSku->product->name);
    $productCategoryNameSlug = Str::slug($productSku->productCategory->name);
    $productSubCategoryNameSlug = Str::slug($productSku->productSubCategory->name);
    $productSkuNameSlug = Str::slug($productSku->name);
    $fileNameComponents = [
      $productNameSlug,
      $productCategoryNameSlug,
      $productSubCategoryNameSlug,
      $productSkuNameSlug,
      time(),
    ];

    // $fileName = $request->file('image')->getClientOriginalName();
    $fileExtension = $request->file('image')->getClientOriginalExtension();

    $fileName = implode('-', $fileNameComponents);
    $fileName = "{$fileName}.{$fileExtension}";
    $path = $request
      ->file('image')
      ->storeAs(
        'product_images',
        $fileName,
        'public'
      );

    $productImage = new ProductImage();
    $productImage->product_id = $productSku->product->id;
    $productImage->product_sku_id = $productSku->id;
    $productImage->path = "/storage/{$path}";
    $productImage->save();
  }
}
