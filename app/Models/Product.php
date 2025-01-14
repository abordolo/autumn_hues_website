<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  /** @use HasFactory<\Database\Factories\ProductFactory> */
  use HasFactory;

  // product skus
  public function productSkus()
  {
    return $this->hasMany(ProductSku::class);
  }

  public function images()
  {
    return $this->hasMany(ProductImage::class);
  }
}
