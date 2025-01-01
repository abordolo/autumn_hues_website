<?php

use App\Models\Product;
use App\Models\ProductSku;
use App\Models\VariationType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('variations', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(ProductSku::class)->constrained()->cascadeOnDelete();
      $table->foreignIdFor(VariationType::class)->constrained()->cascadeOnDelete();
      $table->string('name')->max(255);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('variations');
  }
};
