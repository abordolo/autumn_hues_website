<?php

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('product_skus', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(ProductCategory::class)->constrained()->cascadeOnDelete();
      $table->foreignIdFor(ProductSubCategory::class)->constrained()->cascadeOnDelete();
      $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
      $table->string('name')->max(255)->unique();
      $table->string('description')->max(255);
      $table->float('price');
      $table->integer('stock')->default(100);
      $table->boolean('active')->default(true);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('product_skus');
  }
};
