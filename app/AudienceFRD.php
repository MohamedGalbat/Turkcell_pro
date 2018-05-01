<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudienceFRD extends Model
{
    protected $table='audience_frd';
    protected $fillable=['frd_id','audience_id','version','user_id'];
    protected $with=['users','name'];

    public function users(){
        return $this->belongsTo("App\User",'user_id','id');
    }
    public function name(){
        return $this->belongsTo("App\Audience",'audience_id','id');
    }
}
