<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('product_categories', function (Blueprint $table) {
      $table->id();
      $table->string('name')->max(255)->unique();
      $table->string('slug')->max(255)->unique();
      $table->string('description')->max(255)->nullable();
      $table->integer('order')->default(0);
      $table->boolean('active')->default(true);
      $table->boolean('available')->default(true);
      $table->string('icon')->nullable();
      $table->string('thumbnail_image')->nullable(); // 128x128px
      $table->string('header_image')->nullable(); // 1024x256px
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('product_categories');
  }
};
