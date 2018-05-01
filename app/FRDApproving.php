<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FRDApproving extends Model
{
    protected $table='frd_approving';
    protected $fillable=['user_id','frd_id','status'];

}
