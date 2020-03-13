<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintOutController extends Controller
{
    public function index($value='')
    {
    	return view('print');
    }
}
