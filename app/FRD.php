<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FRD extends Model
{

    protected $table ="frd";
    protected $fillable = ['title','description','user_id'];
    protected  $with = ['items','audience','channels','attach','sms','discounts'];
    protected $appends = ['full_name','is_approved','profile_pic'];

    public function getFullNameAttribute(){
        $data = $this->users()->first();
        return $data->first_name.' '.$data->surname;
    }
    public function getProfilePicAttribute(){
        $data = $this->users()->first();
        return $data->profile_pic;
    }

    public function getIsApprovedAttribute(){
        $data = $this->frdApproving();
        if(!$data->exists()) return 0;
        $status = $data->first()->status;
        if($status==1) return 1;
        if($status==2) return 2;
    }

    public function users(){
        return $this->belongsTo("App\User","user_id",'id');
    }

    public function items(){
        return $this->hasMany("App\Items","frd_id",'id');
    }
    public function audience(){
        return $this->hasMany("App\AudienceFRD","frd_id",'id');
    }
    public function channels(){
        return $this->hasMany("App\ChannelFRD","frd_id",'id');
    }
    public function attach(){
        return $this->hasMany("App\Attachments","frd_id",'id');
    }
    public function sms(){
        return $this->hasMany("App\SMS_FRD","frd_id",'id');
    }
    public function discounts(){
        return $this->hasMany("App\DiscountsFRD","frd_id",'id');
    }
    public function frdApproving(){
        return $this->hasOne("App\FRDApproving","frd_id",'id');
    }

}
