<div class="container rounded" style="background-color: rgba(255,255,255,0.80);">
    <br>
    <div class="row justify-content-center">
    <div class="col-3">
            <button id="btn-cot" class="btn btn-secondary">Cotizaciones</button>  
        </div>
        <div class="col-3">
             <button id="btn-cuent" class="btn btn-secondary">Cuentas de cobro</button>
        </div>           
    </div>
    <br>
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
            <th class="bg-primary" colspan="4">Cotizaciones</th>
        </tr>
        <tr>
            <th scope="col">Consecutivo</th>
            <th scope="col">Fecha de creación</th>
            <th scope="col">Cliente</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach($cotizaciones as $cot)
                <tr>
                    <td>{{$cot->consecutivo}}</td>
                    <td>{{$cot->created_at}}</td>
                    <td>{{$cot->nombre}}</td>
                    <td>
                        <button title="Imprimir" class="btn btn-sm btn-info"><img src="{{asset('/../resources/img/print.png')}}" height="18"></button>
                        <button title="Generar cuenta de cobro" class="btn btn-sm btn-info"><img src="{{asset('/../resources/img/convert.png')}}" height="18"></button>    
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>

</div>

<!--Scripts-->
    <script src="../resources/js/app.js"></script>