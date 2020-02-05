<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine_Treatment extends Model
{
	use SoftDeletes;
	 protected $fillable = [ 'treatment_id','medicine_id','tab','interval','meal','during','type'];
  
}
