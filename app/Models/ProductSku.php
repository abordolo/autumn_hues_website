<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
  /** @use HasFactory<\Database\Factories\ProductSkuFactory> */
  use HasFactory;

  public function product()
  {
    return $this->belongsTo(Product::class);
  }

  public function productCategory()
  {
    return $this->belongsTo(ProductCategory::class);
  }
}
