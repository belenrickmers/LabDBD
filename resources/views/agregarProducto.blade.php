<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>

    <!-- PROBANDO FORMULARIO -->
    <link href="{{ asset('css/agregarProducto.css') }}" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;700&display=swap" rel="stylesheet">
    <!------ Include the above in your HEAD tag ---------->

  </head>
  <body class="fondo-pagina">

    <!-- PROBANDO FORMULARIO -->


    <div class="container contact">
        <div class="row">
            <div class="col-md-3">
                <div class="contact-info">
                    <h2 class="col-letras fuente-texto">Publica tu producto</h2>
                    <h6 class="col-letras fuente-texto2">Ingresa los datos de tu producto para publicarlo.</h6>
                </div>
            </div>
            <div class="col-md-9">
                <div class="contact-form">
                    <div class="form-group">
                    <label class="control-label col-sm-4 fuente-texto2" for="nombre">Nombre publicación:</label>
                    <div class="col-sm-10">          
                        <input type="text" class="form-control borde-celdas" id="nombre" placeholder="Ingrese el nombre de la publicación." name="fname">
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-2 fuente-texto2" for="precio">Precio:</label>
                    <div class="col-sm-10">          
                        <input type="text" class="form-control borde-celdas" id="precio" placeholder="Ingrese el precio del producto." name="lname">
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-2 fuente-texto2" for="region">Región:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control borde-celdas" id="region" placeholder="Ingrese la región desde donde arrienda." name="email">
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-2 fuente-texto2" for="comuna">Comuna:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control borde-celdas" id="comuna" placeholder="Ingrese la comuna desde donde arrienda." name="email">
                    </div>
                    </div>
                    

                    <div class="form-group">
                    <label class="control-label col-sm-2 fuente-texto2" for="descripcion">Descripción:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control borde-celdas" rows="5" id="descripcion" placeholder="Ingrese la descripción del producto. Máximo 250 caracteres."></textarea>
                    </div>
                    </div>
                    <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default fuente-texto2">Publicar</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>