<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-------- Include the above in your HEAD tag ---------->
    <!--Navbar-->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/newRegister.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">

    <title>Registro | Arriendame.cl</title>

  </head>
    
  <body>
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


      <div class="container-fluid">
            <section class="container">
              <div class="container-page">				
                <div class="col-md-6">

                  <h3 class="dark-grey">Registro Arriendame.cl</h3>
                                                                              
                  <form action="{{route( 'addUser')}} " method="POST" class="container-sm " enctype = "multipart/form-data">
                            <div class="form-group col-lg-6">
                              <label>Nombre</label>
                              <input type="text" class="form-control" id="firstName" name="firstName">
                            </div>
                            
                            <div class="form-group col-lg-6">
                              <label>Apellido</label>
                              <input type="text" class="form-control" id="lastName" name="lastName">
                            </div>
                            
                            <div class="form-group col-lg-6">
                              <label>Contraseña</label>
                              <input type="password" class="form-control" id="password" name="password">
                            </div>
                            
                            <div class="form-group col-lg-6">
                              <label>Repetir Contraseña</label>
                              <input type="password"  class="form-control" id="" name="">
                            </div>
                                    
                            <div class="form-group col-lg-6">
                              <label>Email</label>
                              <input type="email" class="form-control" id="email" name="email">
                            </div>
                            
                            <div class="form-group col-lg-6">
                              <label>Repetir Email</label>
                              <input type="email" class="form-control" id="" name="">
                            </div>			
                            
                            <div class="form-group col-lg-6">
                              <label>Número de Contacto</label>
                              <input type="phone" class="form-control" id="contactNumber" value="+569" name="contactNumber">
                            </div>
                            
                            <div class="form-group col-lg-6">
                              <label>Fecha de Nacimiento</label>
                              <input type="date" class="form-control" id="dateofbirth" name="dateofbirth">
                            </div>
                            
                            <div class="invisible">
                              <input type="text" class="hidden" id="idRole" name="idRole" value="1">
                            </div>
                            
                              <!---div class="col-sm-6">
                                <input type="checkbox" class="checkbox" />Sigh up for our newsletter
                              </div>

                              <div class="col-sm-6">
                                <input type="checkbox" class="checkbox" />Send notifications to this email
                              </div--->				
                            
                            </div>
                            
                          
                            <div class="col-md-6">
                              <div>
                                <h3 class="dark-grey">Términos y Condiciones</h3>
                              </div>
                              <div>
                                  <p>
                                    Al hacer click en el botón "Registrarme", estás aceptando todos los Términos y Condiciones de Arriendame.cl
                                  </p>
                                  <p>
                                    Para una buena convivencia en nuestra comunidad, asegurate de ser respetuoso y justo con todos los usuarios. Los calificaciones y comentarios respecto a 
                                    los distintos arriendos que lleves a cabo son para apoyar a los demás y mejorar el servicio de quien los postea.
                                  </p>
                                  <p>
                                    Asegurate de que los articulos y/o servicios que postees estén en buen estado, de lo contrario procederemos a bajar tu post, y tomar las acciones
                                    correspondientes.
                                  </p>
                                  <p>
                                    Nos reservamos el derecho de administrar y asegurar que los articulos y/o servicios posteados estén dentro del marco legal. De lo contrario,
                                    Arriendame.cl tomará todas las acciones correspondientes al caso.
                                  </p>
                              </div>
                              <div class="form-group">
                                <button type="submit" class="btn btn-secondary">Registrarme</button>
                              </div>
                  </form>
                </div>
              </div>
            </section>
      </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>