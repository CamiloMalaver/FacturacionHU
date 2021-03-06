<div class="container rounded" style="background-color: rgba(255,255,255,0.80);">
    <br>
    <div class="row justify-content-center">
        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#addClient">Agregar nuevo</button>
    </div>    
    <p>
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach($clientes as $client)
                <tr>
                    <td>{{$client->nombre}}</td>
                    <td>{{$client->telefono}}</td>
                    <td>
                        <button class="btn btn-sm btn-warning">Actualizar</button>
                    </td>
                    
                </tr> 
            @endforeach                       
        </tbody>
    </table>
</div>
 <!--Scripts-->
     <script src="../resources/js/app.js"></script>   
<!--Ventanas modales-->

    <!-- Modal Crear Cliente-->
    <div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-center" style="background-color: rgb(164, 212, 196)">
                    <h3 class="modal-title font-weight-bold" id="exampleModalLabel" style="color: white;">Nuevo cliente</h3>
                </div>
                <form method="POST" action="{{route('postAddClient')}}" autocomplete="off">
                    @csrf
                    <div class="modal-body">   
                        <div class="field_wrapper rounded border container">            
                            <label class="form-group font-weight-bold">Datos</label>    
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control border" name="nombreCliente" placeholder="Nombre del cliente" maxlength="50" required>
                                </div>                            
                            </div>
                            <p>
                            <div class="row">
                                <div class="col">
                                    <input type="number" class="form-control border" name="idCliente" placeholder="Cédula o Nit" maxlength="30" required>
                                </div>                            
                            </div>
                            <p>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control border" name="direccionCliente" placeholder="Dirección" maxlength="300" required>
                                </div>                            
                            </div>
                            <p>
                            <div class="row">
                                <div class="col">
                                    <input type="number" class="form-control border" name="telefonoCliente" placeholder="Teléfono" maxlength="10" required>
                                </div>                            
                            </div>                     
                            <p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    