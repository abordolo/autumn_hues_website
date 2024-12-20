<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
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
      UserRoleSeeder::class
    ]);

    // User::factory()->create([
    //   'user_role_id' => UserRole::where('name', 'admin')->id,
    //   'firstname' => 'admin',
    //   'lastname' => 'admin',
    //   'email' => 'admin@autumnhues.com',
    //   'password' => bcrypt('NajanuDei@2024'),
    // ]);
  }
}
