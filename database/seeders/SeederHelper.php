<?php

namespace Database\Seeders;

use App\Models\UserRole;

class SeederHelper
{
  public static function getColumnDefinition(
    // name of the column in database
    $column_name,

    // name of the column in the seeding file
    $key,

    // value | boolean | reference
    $column_type = 'value',

    // model to refer to for the reference column
    $reference_model = null,

    // column to refer to for the reference column
    $reference_column = 'name'
  ) {
    return [
      'column_name' => $column_name,
      'key' => $key,
      'column_type' => $column_type,
      'reference_model' => $reference_model,
      'reference_column' => $reference_column
    ];
  }

  // open seeding file
  public static function openSeedingFile($seeding_file_name)
  {
    // check if file exists
    if (!file_exists($seeding_file_name)) {
      dd("ERROR: File does not exist: {$seeding_file_name}\n");
    }

    return fopen($seeding_file_name, "r");
  }

  // get column indices
  public static function getColumnIndices($fh, $columns)
  {
    $line = fgets($fh);
    $line = str_replace(array("\r", "\n"), '', $line);
    $headers = preg_split("/[\t]/", $line);

    $columnIndices = [];

    // create array of indices for the column names
    for ($i = 0; $i < count($columns); $i++) {
      $column_name = $columns[$i]['column_name'];
      $key = $columns[$i]['key'];

      $index = array_search($key, $headers);
      if ($index === false) {
        dd("ERROR: Key ({$key}) for column name ({$column_name}) is not found in the header.\n");
      }

      $columnIndices[$column_name] = $index;
    }

    return $columnIndices;
  }

  // get value to be inserted
  public static function getValueToBeInserted($column, $value_in_record)
  {
    $column_type = $column['column_type'];

    $value_to_be_inserted = null;

    switch ($column_type) {
      case 'value':
        $value_to_be_inserted = $value_in_record;
        break;
      case 'boolean':
        if ($value_in_record == 'TRUE' || $value_in_record == 1) {
          $value_to_be_inserted = true;
        } else {
          $value_to_be_inserted = false;
        }
        break;
      case 'password':
        $value_to_be_inserted = bcrypt($value_in_record);
        break;
      case 'relationship':
        $reference_model = $column['reference_model'];
        $reference_column = $column['reference_column'];

        $record = $reference_model::where($reference_column, $value_in_record)->first();

        // dd($record);
        if ($record === null) {
          dd("ERROR: Record with name {$value_in_record} not found in {$reference_model} table.\n");
        }

        $value_to_be_inserted = $record->id;
        break;
    }

    return $value_to_be_inserted;
  }
}
