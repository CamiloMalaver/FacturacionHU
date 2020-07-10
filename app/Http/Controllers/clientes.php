<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clientes extends Controller
{
    public function getView(){
        return view('clientes');
    }
}
