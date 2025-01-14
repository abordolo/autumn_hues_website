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
    Schema::create('user_roles', function (Blueprint $table) {
      $table->id();
      $table->string('name')->max(255)->unique();
      $table->string('slug')->max(255)->unique();
      $table->string('description')->max(255)->nullable();
      $table->boolean('active')->default(true);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('user_roles');
  }
};
