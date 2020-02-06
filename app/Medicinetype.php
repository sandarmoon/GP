<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicinetype extends Model
{
	use SoftDeletes;
    protected $fillable=['name'];

    public function medicines(){
    	return $this->hasMany('App\Medicine');
    }
}
