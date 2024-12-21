<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $table_name = 'product_categories';
    $model = ProductCategory::class;
    $seeding_file_name = storage_path('database_seeding_files/' . 'product_categories.tsv');
    $columns = [
      SeederHelper::$name,
      SeederHelper::$slug,
      SeederHelper::$description,
      SeederHelper::$order,
      SeederHelper::$active,
      SeederHelper::$available,
      SeederHelper::$icon,
      SeederHelper::$thumbnail_image,
      SeederHelper::$header_image,
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

    // iterate over the rows in the file
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
        } else if ($column_type === 'password') {
          $value_to_be_inserted = bcrypt($value_in_record);
        } else if ($column_type === 'relationship') {
          $reference_model = $column['reference_model'];
          $reference_column = $column['reference_column'];

          $record = $reference_model::where('name', $value_in_record)->first();

          if ($record === null) {
            echo "Record with name {$value_in_record} not found in {$reference_model} table.\n";
            return;
          }

          $value_to_be_inserted = $record->$reference_column;
        }


        $data[$column_name] = $value_to_be_inserted;
      }

      $model::create($data);
    }

    echo "{$table_name} table is populated successfully.\n";
  }
}
