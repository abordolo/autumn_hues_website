<?php

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
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(ProductCategory::class)->constrained()->cascadeOnDelete();
      $table->foreignIdFor(ProductSubCategory::class)->constrained()->cascadeOnDelete();
      $table->string('name')->max(255)->unique();
      $table->string('slug')->max(255)->unique();
      $table->string('description')->max(255)->nullable();
      $table->integer('order')->default(0);
      $table->boolean('active')->default(true);
      $table->boolean('available')->default(true);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('products');
  }
};
