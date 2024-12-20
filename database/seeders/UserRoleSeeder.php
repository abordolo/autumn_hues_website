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
      [
        'column_name' => 'name',
        'key' => 'Name',
        'column_type' => 'value',
        'reference_class' => null,
        'reference_column' => null,
        // index of the record in a row
        // to be filled
        'lookup_index' => null,
      ],

      [
        'column_name' => 'slug',
        'key' => 'Slug',
        'column_type' => 'value',
        'reference_class' => null,
        'reference_column' => null,
        // index of the record in a row
        // to be filled
        'lookup_index' => null,
      ],

      [
        'column_name' => 'description',
        'key' => 'Description',
        'column_type' => 'value',
        'reference_class' => null,
        'reference_column' => null,
        // index of the record in a row
        // to be filled
        'lookup_index' => null,
      ],

      [
        'column_name' => 'active',
        'key' => 'Active',
        'column_type' => 'boolean',
        'reference_class' => null,
        'reference_column' => null,
        // index of the record in a row
        // to be filled
        'lookup_index' => null,
      ],
    ];

    if (count($model::all()) > 0) {
      echo "{$table_name} table is already populated\n";
      return;
    }

    $fh = fopen($seeding_file_name, "r");
    $line = fgets($fh);
    $line = str_replace(array("\r", "\n"), '', $line);
    $headers = preg_split("/[\t]/", $line);

    // create array of indices for the column names
    for ($i = 0; $i < count($columns); $i++) {
      $column_name = $columns[$i]['column_name'];
      $key = $columns[$i]['key'];

      $index = array_search($key, $headers);
      if ($index === false) {
        echo "Key ({$key}) for column name ({$column_name}) is not found in the header.\n";
        return;
      }

      $columns[$i]['lookup_index'] = $index;
      // echo "name: {$name}, key: {$key}, type: {$type}, lookup_index: {$column['lookup_index']}\n";
    }

    // iterate over the rows
    while (($line = fgets($fh)) !== false) {
      $line = str_replace(array("\r", "\n"), '', $line);
      $fields = preg_split("/[\t]/", $line);

      $data = [];
      foreach ($columns as $column) {
        $column_name = $column['column_name'];
        $column_type = $column['column_type'];
        $lookup_index = $column['lookup_index'];

        // echo "name: {$name}, lookup_index: {$lookup_index}\n";

        $value_in_record = $fields[$lookup_index];

        $value_to_be_inserted = null;

        if ($column_type === 'value') {
          $value_to_be_inserted = $value_in_record;
        } else if ($column_type === 'boolean') {
          if ($value_in_record == 'TRUE' || $value_in_record == 1) {
            $value_to_be_inserted = true;
          } else {
            $value_to_be_inserted = false;
          }
        }


        $data[$column_name] = $value_to_be_inserted;
      }

      $model::create($data);
    }

    echo "{$table_name} table is populated successfully.\n";
  }
}
