<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable=['user_id','nrc','age','dob','avatar','clinic_name','clinic_logo','clinic_time','address','phone'];

    public function doctors(){
    	return $this->hasMany('App\Doctor');
    }

    public function receptions(){
    	return $this->hasMany('App\Reception');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
