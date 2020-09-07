<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!--Navbar-->
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/homeNotLogged.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">


        <title>Arriendame.cl | Tu portal de arriendos</title>

        <nav class="navbar navbar-expand-lg navbar-custom fondo-nav">

            <a class="navbar-brand" href="#">Arriendame.cl</a>
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
                    <button type="button" class="btn btn-round btn-info1">Iniciar sesión</button>
                    <button type="button" class="btn btn-round btn-info">Registrarse</button>
                </div>
  
            </div>
        </nav>
    </head>

    <body>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('images/producto.png') }}" class="d-block w-100" alt="Imagen de electrodomésticos y productos de cocina">
                <div class="carousel-caption d-none d-md-block">
                  <h5>¡Arrienda los mejores electrodomésticos para tu cocina!</h5>
                  <p>Encuentra el producto que estás buscando para esa ocasión especial y no gastes dinero de más</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{ asset('images/instrum.jpg') }}" class="d-block w-100" alt="Imagen de teclado electronico, audífonos, parlantes y monitor de computador">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Arrienda productos para grabación de música</h5>
                  <p>Arma tu propio estudio en tu hogar por el tiempo que necesites</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{ asset('images/bycicles.jpg') }}" class="d-block w-100" alt="Imagen de bicicletas">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Sal a dar un paseo</h5>
                  <p>Arrienda una bicicleta por un día y disfruta del aire libre</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>