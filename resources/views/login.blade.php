<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"-->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-------- Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">

    <title>Registro | Arriendame.cl</title>

    <!--Navbar-->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/homeNotLogged.css')}}">

  </head>

  <body>
      
        <nav class="navbar navbar-expand-lg navbar-custom fondo-nav">

        <a class="navbar-brand" href="/">Arriendame.cl</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link mx-3" href="#">Ofertas</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorías
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($category as $cat)
                        <a class="dropdown-item" href="#">{{ $cat->categoryName }}</a>
                        @endforeach
                    </div>  
                </li>
            </ul>

            <!-- Search form -->
            <div class="active-pink-3 active-pink-4 mb0.5 mx-4 col-lg-6">
                <input class="form-control" type="text" placeholder="Buscar producto" aria-label="Search">
            </div>
            
            <div class="btn-group">
                <button onclick="window.location.href='/login'" type="button" class="btn btn-round btn-info1">Iniciar sesión</button>
                <button type="button" class="btn btn-round btn-info" onclick="window.location.href='/newuser'">Registrarse</button>
            </div>

        </div>
        </nav>




    <section class="login-block">
        <div class="container">
        <div class="row">
            <div class="col-md-4 login-sec">
                <h2 class="text-center">Inicia sesión</h2>

                <form action="{{route( 'ingresoDatosLogin')}} " method="POST" class="container-sm ">
    <div class="form-group">
        <label for="exampleInputEmail1" class="text">Usuario</label>
        <input type="text" class="form-control" placeholder="Ingrese su email" name="email" id="email">
        @if($resultado == 1)
            <p class= 'p1'>Usuario incorrecto, intente de nuevo. </p>
        @endif
        
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1" class="text">Contraseña</label>
        <input type="password" class="form-control" placeholder="Ingrese su contraseña" name="password" id="password">

        @if($resultado == 2)
            <p class= 'p1'>Contraseña incorrecta, intente de nuevo</p>
        @endif
    </div>
    
        <div class="form-check">
        <label class="form-check-label">
        <input type="checkbox" class="form-check-input">
        <small>Recuérdame</small>
        </label>
        <button type="submit" class="btn btn-login float-right">Aceptar</button>
    </div>
    
    </form>
            <!------------------- PROBANDO IF -------------------->
            <!----@if( $resultado == 1)
                usuario incorrecto
            @elseif( $resultado == 2)
                contraseña incorrecta
            @endif--->


            
            <!---------------------------------------------------->
            </div>
            <div class="col-md-8 banner-sec">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    </ol>
                <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="d-block img-fluid" src="https://cdn.pixabay.com/photo/2015/11/07/17/20/amplifiers-1032315_1280.jpg" alt="Imagen de amplificadores de instrumentos.">
            <div class="carousel-caption d-none d-md-block">
                <div class="banner-text">
                    <h2>La nueva manera de arrendar productos</h2>
                    <p>Ingresa y descubre los miles de productos que nuestros usuarios tienen disponibles para ti</p>
                </div>	
            </div>
        </div>

                </div>	   
                
            </div>
        </div>
    </div>
    </section>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>