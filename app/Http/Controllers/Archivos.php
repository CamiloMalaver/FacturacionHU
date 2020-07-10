<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Archivos extends Controller
{
    public function getView(){
        return view('archivo');
    }
}
