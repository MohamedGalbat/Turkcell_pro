<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table ="comments";
    protected $fillable = ['title','item_id','user_id','version','file','file_type'];
    protected $appends =['full_name','profile_pic'];

    public function getProfilePicAttribute(){
        $data = $this->users()->first();
        return $data->profile_pic;
    }
    public function getFullNameAttribute(){
        $data = $this->users()->first();
        return $data->first_name.' '.$data->surname;
    }
    public function users(){
        return $this->belongsTo("App\User","user_id",'id');//relation between the user_id in the comments table and the id in the users table
    }

}
