<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\clientes;

class index extends Controller
{
    public function getView()
    {
        $clientes = clientes::listClients();
        return view('index')->with(compact('clientes'));
    }
}
