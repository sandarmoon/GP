<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine_Treatment extends Model
{
	 protected $fillable = [ 'treatment_id','medicine_id','tab','interval','meal','during','type'];
  
}
