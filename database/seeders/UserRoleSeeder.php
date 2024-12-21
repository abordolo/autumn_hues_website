<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $table_name = 'user_roles';
    $model = UserRole::class;
    $seeding_file_name = storage_path('database_seeding_files/' . 'user_roles.tsv');

    $columns = [
      SeederHelper::getColumnDefinition('name', 'Name'),
      SeederHelper::getColumnDefinition('slug', 'Slug'),
      SeederHelper::getColumnDefinition('description', 'Description'),
      SeederHelper::getColumnDefinition('active', 'Active'),
    ];

    if (count($model::all()) > 0) {
      echo "{$table_name} table is already populated\n";
      return;
    }

    $fh = SeederHelper::openSeedingFile($seeding_file_name);

    // ['column_key' => index1, 'column_key' => index2, ...]
    $columnIndices = SeederHelper::getColumnIndices($fh, $columns);

    // iterate over the rows in the file
    while (($line = fgets($fh)) !== false) {
      $line = str_replace(array("\r", "\n"), '', $line);
      $fields = preg_split("/[\t]/", $line);

      $data = [];
      foreach ($columns as $column) {
        $column_name = $column['column_name'];
        $lookup_index = $columnIndices[$column_name];

        if ($lookup_index === false) {
          dd("Index not found for column name {$column_name}.\n");
        }

        $value_in_record = $fields[$lookup_index];

        $value_to_be_inserted = SeederHelper::getValueToBeInserted($column, $value_in_record);

        $data[$column_name] = $value_to_be_inserted;
      }

      $model::create($data);
    }

    echo "{$table_name} table is populated successfully.\n";
  }
}
