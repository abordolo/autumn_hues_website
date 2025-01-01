<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSku;
use App\Models\Variation;
use App\Models\VariationType;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ProductController extends Controller
{
  public function show(Product $product)
  {
    $productSkus = ProductSku::query()
      ->where('product_id', $product->id)
      ->where('stock', '>', 0)
      ->where('active', 1)
      ->with([
        'variations' => function ($query) {
          $query->select('id', 'product_sku_id', 'variation_type_id', 'name');
        },
        'variations.variationType' => function ($query) {
          $query->select('id', 'name');
        },
        'images' => function ($query) {
          $query->select('product_sku_id', 'path');
        }
      ])
      ->select('id', 'name', 'description', 'price')
      ->get();

    $availableVariationTypeIds = Collection::make();
    $availableVariationIds = Collection::make();
    $variationCombinations = Collection::make();

    $productSkus->transform(function ($productSku) use ($availableVariationTypeIds, $availableVariationIds, $variationCombinations) {
      $variations = $productSku->variations;

      $variationCountObject = []; // for combinations
      foreach ($variations as $variation) {
        $variationTypeId = $variation->variationType->id;
        $variationId = $variation->id;
        $variationTypeName = $variation->variationType->name;
        $variationName = $variation->name;

        $availableVariationTypeIds->push($variationTypeId);
        $availableVariationIds->push($variationId);

        $variationCountObject[$variationTypeName] = $variationName;  // for combinations

        // add variation type name to product sku
        $productSku->{$variationTypeName} = $variationName;
      }

      $variationCombinations->push($variationCountObject);

      // uncomment the following to see the full structure
      unset($productSku->variations);
      return $productSku;
    });

    $availableVariationTypeIds = $availableVariationTypeIds->unique();
    $availableVariationIds = $availableVariationIds->unique();

    $variationTypes = VariationType::query()
      ->whereIn('id', $availableVariationTypeIds)
      ->with([
        'variations' => function ($query) use ($availableVariationIds) {
          $query
            ->whereIn('id', $availableVariationIds)
            ->distinct()
            ->select('variation_type_id', 'name');
        }
      ])
      ->select('id', 'name')
      ->get();

    $data = [
      'product' => $product->only([
        'id',
        'name',
        'description'
      ]),
      'productSkus' => $productSkus,
      'variationTypes' => $variationTypes,
      'variationCombinations' => $variationCombinations,
    ];

    return Inertia::render('Product/Show', $data);
  }
}
