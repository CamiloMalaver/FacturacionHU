<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        
        <title>Facturación</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
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

            .links:hover {
              color: hotpink;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body style="background-image: url({{asset('../resources/img/bgimg.jpg')}}); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="row justify-content-center">
                    <img src="{{asset('../resources/img/logo.png')}}" width="400">
                </div>
                <br>
                <div class="row">
                    <br>
                    <div class="col links">             
                        <button type="button" class="btn btn-info btn-lg btn-block font-weight-bold">Crear</button>
                    </div>                    
                    <div class="col links">             
                        <button type="button" class="btn btn-info btn-lg btn-block font-weight-bold">Archivos</button>
                    </div>   
                    <div class="col links">             
                        <button type="button" class="btn btn-info btn-lg btn-block font-weight-bold">Clientes</button>
                    </div>                      
                    <br>              
                </div>
            </div>
        </div>
    </body>
</html>
