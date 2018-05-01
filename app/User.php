<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table='users';
    protected $with=['department'];
    protected $appends = ['is_manager','full_name'];
    //no fillable cuz we add manually to the database



    public function getFullNameAttribute(){

        return $this->first_name.' '.$this->surname;
    }


    public function department(){
        return $this->belongsTo('App\department','department_id','id');
    }
     public function getIsManagerAttribute()
     {
       return  $this->hasOne('App\department', 'manager_id', 'id')->exists();
     }
}

