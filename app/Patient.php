<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Patient extends Model
{
	use SoftDeletes;
    protected $fillable = ['name','fatherName','age','chind', 'gender','phoneno','address','married_status','pregnant', 'body_weight','allergy','job','file','reception_id',
    ];

    public function treatments($value='')
    {
    	return $this->hasMany('App\Treatment');
    }
}
