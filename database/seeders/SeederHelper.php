<?php

namespace Database\Seeders;

use App\Models\UserRole;

class SeederHelper
{

  public static function getReferenceColumn($referenceModel, $referenceColumn = 'id')
  {
    return [
      'column_name' => 'user_role_id',
      'key' => 'User Role',
      'column_type' => 'relationship',
      'reference_model' => $referenceModel,
      'reference_column' => $referenceColumn,
      'lookup_index' => null,
    ];
  }

  public static $firstname = [
    'column_name' => 'firstname',
    'key' => 'First Name',
    'column_type' => 'value',
    'reference_model' => null,
    'reference_column' => null,
    'lookup_index' => null,
  ];

  public static $lastname = [
    'column_name' => 'lastname',
    'key' => 'Last Name',
    'column_type' => 'value',
    'reference_model' => null,
    'reference_column' => null,
    'lookup_index' => null,
  ];

  public static $email = [
    'column_name' => 'email',
    'key' => 'Email',
    'column_type' => 'value',
    'reference_model' => null,
    'reference_column' => null,
    'lookup_index' => null,
  ];

  public static $country_code = [
    'column_name' => 'country_code',
    'key' => 'Country Code',
    'column_type' => 'value',
    'reference_model' => null,
    'reference_column' => null,
    'lookup_index' => null,
  ];

  public static $phone = [
    'column_name' => 'phone',
    'key' => 'Phone',
    'column_type' => 'value',
    'reference_model' => null,
    'reference_column' => null,
    'lookup_index' => null,
  ];

  public static $password = [
    'column_name' => 'password',
    'key' => 'Password',
    'column_type' => 'password',
    'reference_model' => null,
    'reference_column' => null,
    'lookup_index' => null,
  ];

  public static $name = [
    'column_name' => 'name',
    'key' => 'Name',
    'column_type' => 'value',
    'reference_model' => null,
    'reference_column' => null,
    'lookup_index' => null,
  ];

  public static $slug = [
    'column_name' => 'slug',
    'key' => 'Slug',
    'column_type' => 'value',
    'reference_model' => null,
    'reference_column' => null,
    'lookup_index' => null,
  ];

  public static $description = [
    'column_name' => 'description',
    'key' => 'Description',
    'column_type' => 'value',
    'reference_model' => null,
    'reference_column' => null,
    'lookup_index' => null,
  ];

  public static $order = [
    'column_name' => 'order',
    'key' => 'Order',
    'column_type' => 'value',
    'reference_model' => null,
    'reference_column' => null,
    'lookup_index' => null,
  ];

  public static $active = [
    'column_name' => 'active',
    'key' => 'Active',
    'column_type' => 'boolean',
    'reference_model' => null,
    'reference_column' => null,
    'lookup_index' => null,
  ];

  public static $available = [
    'column_name' => 'available',
    'key' => 'Available',
    'column_type' => 'boolean',
    'reference_model' => null,
    'reference_column' => null,
    'lookup_index' => null,
  ];

  public static $icon = [
    'column_name' => 'icon',
    'key' => 'Icon Image',
    'column_type' => 'value',
    'reference_model' => null,
    'reference_column' => null,
    'lookup_index' => null,
  ];

  public static $thumbnail_image = [
    'column_name' => 'thumbnail_image',
    'key' => 'Thumbnail Image',
    'column_type' => 'value',
    'reference_model' => null,
    'reference_column' => null,
    'lookup_index' => null,
  ];

  public static $header_image = [
    'column_name' => 'header_image',
    'key' => 'Header Image',
    'column_type' => 'value',
    'reference_model' => null,
    'reference_column' => null,
    'lookup_index' => null,
  ];


}
