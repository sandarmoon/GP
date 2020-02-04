<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['name','fatherName','age','chind', 'gender','phoneno','address','married_status','pregnant', 'body_weight','allergy','job','file','status',
    ];
}
