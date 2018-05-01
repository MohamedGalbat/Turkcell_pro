<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountsFRD extends Model
{
    protected $table='discounts_frd';
    protected $fillable=['frd_id','version','user_id','code','description'];
    protected $with=['users'];
    protected $appends = ['full_name'];


    public function users(){
        return $this->belongsTo("App\User",'user_id','id');
    }

    public function getFullNameAttribute(){
        $data = $this->users()->first();
        return $data->first_name.' '.$data->surname;
    }
}
