<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Medicine_Type extends Model
{
	use SoftDeletes;

     protected $fillable = ['name'];
}
