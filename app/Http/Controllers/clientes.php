<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class clientes extends Controller
{
    public function getView(){
        return view('clientes');
    }

    public static function addClient(Request $request){
        DB::insert('INSERT INTO `cliente`(`nombre`, `nit`, `direccion`,`telefono`) VALUES (?,?,?,?)', [$request->nombreCliente, $request->idCliente, $request->direccionCliente, $request->telefonoCliente]);
        session(['clientSaved' => '¡Registro exitoso!']);        
    }
}
