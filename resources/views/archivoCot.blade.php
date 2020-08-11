<div class="container rounded" style="background-color: rgba(255,255,255,0.80);">
    <br>
    <table class="table table-striped">
      <thead class="thead-dark">
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
                        <button title="Generar Cotizacion" class="btn btn-sm btn-info" onclick="printCot({{$cot->id}})"><img src="{{asset('/../resources/img/print.png')}}" height="18"></button>
                        <button title="Generar cuenta de cobro" class="btn btn-sm btn-info" onclick="printCob({{$cot->id}})"><img src="{{asset('/../resources/img/convert.png')}}" height="18"></button>
                        <button title="Editar" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editDoc" onclick="edit({{$cot->id}})"><img src="{{asset('/../resources/img/pencil.png')}}" height="18"></button>    
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>

</div>

<!--Scripts-->
    <script type="text/javascript">
            var maxField = 20; //Input fields increment limitation
            var addButton2 = $('.add_button2'); //Add button selector
            var wrapper2 = $('.field_wrapper2'); //Input field wrapper
            var fieldHTML2 = '<div class="container"><div class="row align-items-center"><div class="col-sm-2"><input type="number" class="form-control border" name="field_name[]" placeholder="Cant" required></div><div class="col-lg"><textarea type="text" class="form-control border" rows="2" name="field_name[]" placeholder="Descripción" required></textarea></div><div class="col-sm-3"><input type="number" class="form-control border" name="field_name[]" placeholder="Valor unitario" required></div><div class="col-"></div><a href="javascript:void(0);" class="remove_button2" title="Eliminar campo"> <img src="{{asset('/../resources/img/minus.png')}}" height="30"></a></div></div><p>'; //New input field html 
            var x = 1; //Initial field counter is 1
        $(document).ready(function(){
           
            $("#editDoc").on('hidden.bs.modal', function () {
                $(wrapper2).html(
                    '<p>'+      
                    '<div class="row justify-content-center">'+
                        '<div class="col col-md-1"><label class="form-group font-weight-bold">Items</label></div>'+
                        '<div class="col col-sm- offset-md-10"><a href="javascript:void(0);" class="add_button2" title="Agregar campo"><img src="{{asset('/../resources/img/plus.png')}}" height="30"></a></div>'+
                    '</div>'
                );
            });

            $(addButton2).click(function(){ //Once add button is clicked
                if(x < maxField){ //Check maximum number of input fields
                    x++; //Increment field counter
                    $(wrapper2).append(fieldHTML2); // Add field html
                }
            });
            $(wrapper2).on('click', '.remove_button2', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });        

        function printCot(id){  
            var url = "print/"+id+"/"+0; 
            window.open(url, "Imprimir");      
        };

        function printCob(id){  
            var url = "print/"+id+"/"+1; 
            window.open(url, "Imprimir");      
        };

        function edit(identificador){  
            $.ajax({
                url : "details/"+identificador,
                success : function(data){
                    $('#editClientName').val(data[0].id_cliente);
                    $('#editCreatedAt').val(data[0].created_at);
                    $('#editFVenc').val(data[0].fecha_venci);
                    
                    data[1].forEach(element => {
                        $(wrapper2).append(
                            '<div class="container">'+
                                '<div class="row align-items-center">'+
                                    '<div class="col-sm-2">'+
                                        '<input type="number" class="form-control border" name="field_name[]" placeholder="Cant" value="'+element.cantidad+'" required>'+
                                    '</div>'+
                                    '<div class="col-lg">'+
                                        '<textarea type="text" class="form-control border" rows="2" name="field_name[]" placeholder="Descripción" required>'+element.descripcion+'</textarea>'+
                                    '</div>'+
                                    '<div class="col-sm-3">'+
                                        '<input type="number" class="form-control border" name="field_name[]" placeholder="Valor unitario" value="'+element.valor_u+'" required>'+
                                    '</div>'+
                                    '<a href="javascript:void(0);" class="remove_button2" title="Agregar campo"> <img src="{{asset('/../resources/img/minus.png')}}" height="30"></a>'+
                                '</div>'+
                            '</div><p>'
                        );
                        x++;
                    });
                }
            });     
        };
  </script>
<!--Ventanas modales-->

    <!-- Modal Crear-->
    <div class="modal fade" id="editDoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center" style="background-color: rgb(164, 212, 196)">
                    <h3 class="modal-title font-weight-bold" id="exampleModalLabel" style="color: white;">Editor de factura</h3>
                </div>
                <form method="POST" action="{{route('postAddDoc')}}" autocomplete="off">
                    @csrf
                    <div class="modal-body">      

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect02">Cliente</label>
                            </div>
                            <select class="custom-select" id="editClientName" name="cliente">
                                @foreach($clientes as $client)
                                    <option value="{{$client->id}}">{{$client->nombre}}</option>
                                @endforeach                            
                            </select>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="rounded border container">            
                                    <label class="form-group font-weight-bold">Fecha de creación</label> 
                                    <input type="date" id="editCreatedAt" name="fcreacion" value="" required> 
                                    </p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="rounded border container">            
                                    <label class="form-group font-weight-bold">Fecha de vencimiento</label>            
                                    <input type="date" id="editFVenc" name="fvencimiento" value="" required>
                                    </p>
                                </div>
                            </div>                        
                        </div>
                        <p>

                        <div class="field_wrapper2 rounded border container">      
                            <p>      
                            <div class="row justify-content-center">
                                <div class="col col-md-1"><label class="form-group font-weight-bold">Items</label></div>
                                <div class="col col-sm- offset-md-10"><a href="javascript:void(0);" class="add_button2" title="Agregar campo"><img src="{{asset('/../resources/img/plus.png')}}" height="30"></a></div>
                            </div>            
                            
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Crear</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>