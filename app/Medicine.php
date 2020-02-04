<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['medicine_type_id','name','chemical'];
}
