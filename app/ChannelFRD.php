<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class channelFRD extends Model
{
    protected $table='channel_frd';
    protected $fillable=['frd_id','channel_id','version','user_id'];
    protected $with=['users','name'];

    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function name(){
        return $this->belongsTo("App\Channels",'channel_id','id');
    }

}
