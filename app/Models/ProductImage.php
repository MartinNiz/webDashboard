<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    static $rules = [
        'product_id' => 'required',
        'path' => 'required',
      ];
  
      protected $perPage = 20;
  
      /**
       * Attributes that should be mass-assignable.
       *
       * @var array
       */
      protected $fillable = ['product_id','path'];
}
