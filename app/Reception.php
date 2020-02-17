<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reception extends Model
{
    
	use SoftDeletes;
    protected $fillable=['gender','phoneno','education','address','user_id','file'];
    
     public function user(){
    	return $this->belongsTo('App\User');
    }
}
