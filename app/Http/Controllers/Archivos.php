<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\cifrasEnLetras;

class Archivos extends Controller
{
    public function getView(){
        $cotizaciones = self::listCotizacion();
        return view('archivoCot')->with(compact('cotizaciones'));
    }

    public function getCuentView(){
        return view('archivoCuen');
    }

    public static function addNewDoc(Request $request){
        //Cuenta los registros para definir el consecutivo
        $consecutivo = DB::table('factura')
            ->where('tipo', 0)
            ->count() + 1;
        //Crea la factura
        DB::insert('INSERT INTO `factura`(`id_cliente`, `tipo`, `created_at`,`fecha_venci`,`consecutivo`) VALUES (?,?,?,?,?)', [$request->cliente, 0, $request->fcreacion, $request->fvencimiento, $consecutivo]);
        //Obtiene id de factura creada
        $idFactura = DB::table('factura')
            ->select('id')            
            ->latest()
            ->first();
        //Agrega items a factura
            $fields = [];
            $itemList = $request->field_name;
            $cont = 0;
            foreach($itemList as $item){           
                $fields[$cont] = $item;           
                if($cont == 2){
                    
                    DB::insert('INSERT INTO `items`(`id_factura`, `cantidad`, `descripcion`, `valor_u`)
                                VALUES (?,?,?,?)', [$idFactura->id, $fields[0], $fields[1], $fields[2]]);

                    $fields = [];
                    $cont = 0;
                }else{
                    $cont++;
                }          
            }
            session(['clientSaved' => '¡Se ha agregado el doc!']);        
            return back();
    }

    public static function listCotizacion(){
        $list = DB::table('factura')
        ->join('cliente', 'factura.id_cliente', '=', 'cliente.id')
        ->select('factura.*', 'cliente.nombre')
        ->where('tipo',0)       
        ->latest()
        ->get();
        return $list;
    }

    public function print($id){
        $factura = DB::table('factura')
            ->join('cliente', 'factura.id_cliente', '=', 'cliente.id')
            ->where('factura.id', $id)
            ->select('factura.*', 'cliente.*')
            ->first();
                
        $items = DB::table('items')
            ->where('id_factura', $id)
            ->get();

        $total=0;
        foreach($items as $it){
            $total+= $it->cantidad*$it->valor_u;
        }

        $totalLetras = cifrasEnLetras::convertirCifrasEnLetras($total);

        return view('printingLay')
            ->with(compact('factura'))
            ->with(compact('items'))
            ->with(compact('total'))
            ->with(compact('totalLetras'));
    }
}
