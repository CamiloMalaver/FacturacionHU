<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <title>Facturación</title>

       
        <!-- Styles -->
        <style>
            html, body {
                color: #636b6f;
                font-family: verdana;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 70vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                color: #000000;
                font-size: 120px;
                font-weight: 900;
            }

            .links > a {
                color: #000000;
                padding: 0 25px;
                font-size: 25px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>

    <body style="background-image: url({{asset('../resources/img/bgimg.jpg')}}); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="row">
            <div class="col-md-3 offset-md-8">
                <!--Alerts-->
                @if(session()->has('clientSaved'))
                    <br>                    
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('clientSaved')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>  
                    </div>
                    {{session()->forget('clientSaved')}}
                @endif
            </div>
        </div>              
        <div class="container"> 
            <br>           
            <div class="row justify-content-center">
                <img src="{{asset('../resources/img/logo.png')}}" width="400">
            </div>
            <br>
            <div class="row justify-content-md-center">
                <br>
                <div class="col-md-3 col-md-offset-3" style="display: flex; justify-content: center;">           
                    <button type="button" class="btn btn-info btn-lg font-weight-bold" data-toggle="modal" data-target="#addDoc">Crear</button>
                </div>                    
                <div class="col-md-3" style="display: flex; justify-content: center;">             
                    <button id="btn-archivos" type="button" class="btn btn-info btn-lg font-weight-bold">Archivos</button>
                </div>   
                <div class="col-md-3" style="display: flex; justify-content: center;">             
                    <button id="btn-clientes" type="button" class="btn btn-info btn-lg font-weight-bold">Clientes</button>
                </div>                      
                <br>              
            </div>
        </div>
        <br>

        <div id="content" class="container"></div>

    </body>
</html>

<!--Scripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="../resources/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div class="container"><div class="row"><div class="col-sm-2"><input type="number" class="form-control border" name="field_name[]" placeholder="Cant" required></div><div class="col-lg"><input type="text" class="form-control border" name="field_name[]" placeholder="Nombre" required></div><div class="col-sm-3"><input type="number" class="form-control border" name="field_name[]" placeholder="Valor unitario" required></div><div class="col-"></div><a href="javascript:void(0);" class="remove_button" title="Eliminar campo"> <img src="{{asset('/../resources/img/minus.png')}}" height="30"></a></div></div><p>'; //New input field html 
            var x = 1; //Initial field counter is 1
            $(addButton).click(function(){ //Once add button is clicked
                if(x < maxField){ //Check maximum number of input fields
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); // Add field html
                }
            });
            $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
  </script>
<!--Ventanas modales-->

    <!-- Modal Crear-->
    <div class="modal fade" id="addDoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-center" style="background-color: rgb(164, 212, 196)">
                    <h3 class="modal-title font-weight-bold" id="exampleModalLabel" style="color: white;">Nuevo documento</h3>
                </div>
                <div class="modal-body">      

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect02">Cliente</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="cliente">
                            <option value="1">Andrea Suluaga</option>
                            <option value="2">Los Olivos</option>
                        </select>
                    </div>

                    <div class="field_wrapper rounded border container">            
                        <label class="form-group font-weight-bold">Items</label>            
                        <div class="container">
                        <div class="row">
                            <div class="col-sm-2">
                            <input type="number" class="form-control border" name="field_name[]" placeholder="Cant" required>
                            </div>
                            <div class="col-lg">
                            <input type="text" class="form-control border" name="field_name[]" placeholder="Descripción" required>
                            </div>
                            <div class="col-sm-3">
                            <input type="number" class="form-control border" name="field_name[]" placeholder="Valor unitario" required>
                            </div>
                            <div class="col-">
                            <a href="javascript:void(0);" class="add_button" title="Agregar campo"> <img src="{{asset('/../resources/img/plus.png')}}" height="30"></a>
                            </div>
                        </div>
                        </div>  
                        <p>          
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Crear</button>
                </div>
            </div>
        </div>
    </div>