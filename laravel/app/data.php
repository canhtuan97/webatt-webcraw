<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data extends Model
{
      protected $fillable = [
        'name', 'price', 'image','link','comment','website','type'
    ];
}
