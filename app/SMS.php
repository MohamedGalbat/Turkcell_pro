<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    protected $table='sms';
    protected $fillable=['code','explanation','content_tr','length_tr','content_en','length_en','sender'];
}
