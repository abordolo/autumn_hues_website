<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationType extends Model
{
  /** @use HasFactory<\Database\Factories\VariationTypeFactory> */
  use HasFactory;

  public function variations()
  {
    return $this->hasMany(Variation::class);
  }
}
