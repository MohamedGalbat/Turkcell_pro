<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{

    protected $table = 'items';
    protected $fillable = ['title','version','frd_id'];
    protected  $with = ['comments'];
    public $timestamps = false;

    public function comments(){
        return $this->hasMany("App\comments","item_id",'id');
    }



}
