<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
	use SoftDeletes;
    protected $fillable = ['medicinetype_id','name','chemical'];

    public function medicinetype(){
    	return $this->belongsTo('App\Medicinetype');
    }

     public function treatments()
    {
        return $this->belongsToMany('App\Treatment');
    }
}
