<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentFRD extends Model
{
    protected $table='department_frd';
    protected $fillable=['frd_id','department_id','user_id'];
    // cuz i can check the department id with the dp_id of the user
}
