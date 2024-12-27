<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $table_name = 'product_images';
    $model = ProductImage::class;
    $seeding_file_name = storage_path('database_seeding_files/' . 'product_images.tsv');

    $columns = [
      SeederHelper::getColumnDefinition(
        'product_id',
        'Product',
        'relationship',
        Product::class
      ),
      SeederHelper::getColumnDefinition(
        'product_sku_id',
        'Product Sku',
        'relationship',
        ProductSku::class
      ),
      SeederHelper::getColumnDefinition('path', 'Path')
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

      $original_path = $data['path'];

      for ($i = 0; $i < 5; $i++) {
        $random_number = rand(10, 100);
        print ('random_number: ' . $random_number . "\n");
        $data['path'] = str_replace('random=N', 'random=' . $random_number, $original_path);
        $model::create($data);
      }

      $model::create($data);
      $model::create($data);
      $model::create($data);
      $model::create($data);
    }

    echo "{$table_name} table is populated successfully.\n";
  }
}
