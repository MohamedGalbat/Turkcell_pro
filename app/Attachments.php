<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachments extends Model
{
    protected $table='attachment';
    protected $fillable=['title','version','user_id','file_type','file','frd_id'];
    protected $with=['users'];

    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
