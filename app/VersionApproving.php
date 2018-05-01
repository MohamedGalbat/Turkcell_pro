<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VersionApproving extends Model
{
    protected $table='version_approving';
    protected $fillable=['version','user_id','frd_id'];
    protected $with=['users','frd'];
    public function users(){
        return $this->belongsTo('App/user','user_id','id');
    }
    public function frd(){
        return $this->belongsTo('App/frd','frd_id','id');
    }
}
