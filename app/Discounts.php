<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discounts extends Model
{
    protected $table='discounts';
    protected $fillable=['discount_name','discount_code'];
}
