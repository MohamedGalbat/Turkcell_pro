<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMS_FRD extends Model
{
    protected $table='sms_frd';
    protected $fillable=['frd_id','explanation','version','user_id','content_tr','content_en','sender','status'];

}
