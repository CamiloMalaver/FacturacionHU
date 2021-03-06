<!--Styles-->
    <style>
        .texthu{
            font-family: Verdana;
            font-size: 16;
            color: rgb(115, 188, 167);
        }
    </style>
<div class="container">
    <!--Header-->
    <div class="row align-items-center">
        <div class="col-9">
            <img src="{{asset('../resources/img/info.png')}}" width="400">
        </div>
        <div class="col-3">
            <p style="font-family: Verdana; font-size:25; color: rgb(115, 188, 167)">{{$tipo==0?'Cotización':'Cuenta de cobro'}} N° {{$factura->idfactura}}</p>
        </div>
    </div>  
    <br>
    <!--Client info-->
    <div style="border:solid; border-width:2px; border-radius:5px; border-color:rgb(115, 188, 167);">
        <div class="row">
            <div class="col"><span class="texthu">FECHA DE EXPEDICIÓN: </span>{{$factura->created_at}}</div>
            <div class="col"><span class="texthu">FECHA DE VENCIMIENTO: </span>{{$factura->fecha_venci}}</div>
        </div>
        <div class="row">
            <div class="col"><span class="texthu">SEÑORES: </span>{{$factura->nombre}}</div>
            <div class="col"><span class="texthu">CC O NIT: </span>{{$factura->nit}}</div>
        </div>
        <div class="row">
            <div class="col"><span class="texthu">DIRECCIÓN: </span>{{$factura->direccion}}</div>
            <div class="col"><span class="texthu">TELÉFONO: </span>{{$factura->telefono}}</div>
        </div>         
    </div>
    <br>
    <!--Body-->  
    
    <table class="table table-striped">
        <thead style="background-color: rgb(115, 188, 167);">
            <tr>
            <th scope="col">CANT</th>
            <th scope="col">DESCRIPCIÓN</th>
            <th scope="col">Vr. UNITARIO</th>
            <th scope="col">Vr. TOTAL</th>
            </tr>
        </thead>
        <tbody>                             
            @foreach($items as $it)
                <tr> 
                    <td>{{$it->cantidad}}</td>
                    <td>{{$it->descripcion}}</td>
                    <td>${{number_format($it->valor_u, 0, '.','.')}}</td>
                    <td>${{number_format(($it->valor_u*$it->cantidad), 0, '.','.')}}</td>
                </tr>
            @endforeach                        
        </tbody>
    </table>
    <!--Footer-->       
    <div class="row container">
        <div class="col-8" style="background-color:rgb(115, 188, 167); border:solid; border-width:2px; border-radius:5px; border-color:rgb(115, 188, 167);">
            <span class="font-weight-bold">VALOR EN LETRAS: </span>{{$totalLetras}} COP.
        </div>
        <div class="col-3 offset-sm-1" style="border:solid; border-width:2px; border-radius:5px; border-color:rgb(115, 188, 167);">
            <span class="font-weight-bold">TOTAL A PAGAR: ${{number_format(($total), 0, '.','.')}}</span> 
        </div>
    </div>
    </p>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col" style="border:solid; border-width:2px; border-radius:5px; border-color:rgb(115, 188, 167);">
                <center>
                    <span style="color:rgb(115, 188, 167);">
                        URBANO HOME
                        <br><br>
                        NIT: 35261460-1
                    </span>
                </center>                 
            </div>
            <div class="col offset-sm-1" style="border:solid; border-width:2px; border-radius:5px; border-color:rgb(115, 188, 167);">
                <center>
                    <span style="color:rgb(115, 188, 167);">
                        RECIBÍ A CONFORMIDAD
                        <br><br>
                    </span>
                </center>        
                <span style="color:rgb(115, 188, 167);">NIT O CC:</span>         
            </div>
            <div class="col">
                <center><span class="font-weight-bold" style="color:rgb(115, 188, 167); font-size: 24;">RÉGIMEN SIMPLIFICADO</span> </center>
            </div>
        </div>
    </div>
    

<!--Scripts-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    