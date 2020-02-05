<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicine extends Model
{
	use SoftDeletes;
    protected $fillable = ['medicine_type_id','name','chemical'];
}
