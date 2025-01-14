<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use App\Models\VariationType;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();

    $this->call([
      UserRoleSeeder::class,
      UserSeeder::class,
      ProductCategorySeeder::class,
      ProductSubCategorySeeder::class,
      ProductSeeder::class,
      VariationTypeSeeder::class,
      ProductSkuSeeder::class,
      VariationSeeder::class,
      ProductImageSeeder::class,
    ]);
  }
}
