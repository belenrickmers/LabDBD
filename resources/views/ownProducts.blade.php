<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-------- Include the above in your HEAD tag ---------->
    

    <title>Tus Productos | Arriendame.cl</title>

    <!--Navbar-->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ownProducts.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">

  </head>

  <body>

  <nav class="navbar navbar-expand-lg navbar-custom fondo-nav">

    <form action="{{route( 'goHomeLogged')}} " method="POST">
    <input type="hidden" id="id" name="id" value= "{{$user->id}}">
    <a>
    <input value="Arriendame.cl" type="submit" class="formularioinvisible navbar-brand">
    </a>
    </form>

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
    
    <div class="dropdown">
        <button class="btn btn-round btn-secondary dropdown-toggle boton-cuenta" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
            </svg>
            {{ $user->firstName . " " .  $user->lastName}}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <form action="{{route( 'misDatos')}} " method="POST"> 
                    <button class="dropdown-item" type="submit" href="/misDatos">
                        Mis datos personales<input class="invisible" id="id" name="id" value= "{{$user->id}}" >
                    </button>  
                    </form>

                    <form action="{{route( 'misProductos')}} " method="POST">
                    <button class="dropdown-item" type="submit" href="/misProductos">
                        Mis productos<input class="invisible" id="id" name="id" value= "{{$user->id}}" >
                    </button>
                    </form>

                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" onclick="window.location.href='/'">Cerrar sesión</a>
        </div>
    </div>
</div>
</nav>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<div class="card">
            <div class="content">
		<div id="jquery-accordion-menu" class="jquery-accordion-menu">
			<div class="jquery-accordion-menu-header"> {{$user->firstName . " " .  $user->lastName}} </div>
			<ul>
                <li class="btn-group dropright" > 
                    <a class="dropdown-toggle" href="/cuenta" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-bounding-box" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    Mi Perfil
                    </a></li>
                    <li class="btn-group dropright active">
                        <a class="dropdown-toggle" href="#"><i class="fa fa-glass"></i>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-handbag" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M8 1a2 2 0 0 0-2 2v2h4V3a2 2 0 0 0-2-2zm3 4V3a3 3 0 1 0-6 0v2H3.361a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.356a2.5 2.5 0 0 0 2.472-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11zm-1 1v1.5a.5.5 0 0 0 1 0V6h1.639a.5.5 0 0 1 .494.426l1.028 6.851A1.5 1.5 0 0 1 12.678 15H3.322a1.5 1.5 0 0 1-1.483-1.723l1.028-6.851A.5.5 0 0 1 3.36 6H5v1.5a.5.5 0 0 0 1 0V6h4z"/>
                          </svg>
                        Mis productos
                    </a></li>  
                    <li class="btn-group dropright">
                        <a class="dropdown-toggle" href="#"><i class="fa fa-glass"></i>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-truck" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg>
                        Mis Pedidos
                    </a></li>  
                    <li class="btn-group dropright">
                        <a class="dropdown-toggle" href="#"><i class="fa fa-glass"></i>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-credit-card-2-back" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14 3H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zM1 9h14v2H1V9z"/>
                            </svg>
                        Mis Tarjetas guardadas 
                    </a></li>  
                    <li class="btn-group dropright">
                        <a class="dropdown-toggle" href="#"><i class="fa fa-glass"></i>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg> Mis Reseñas
                    </a></li>  
                    <li class="btn-group dropright">
                        <a class="dropdown-toggle" href="#"><i class="fa fa-glass"></i>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                        </svg> Mis Valoraciones 
                    </a></li> 
				</ul>
			</div>
        </div>
    <div class="container">
        
        <form action="{{route( 'newProduct')}} " method="post">
        <input type="hidden" id="id" name="id" value= "{{$user->id}}">
        <a>
            <input value="Registrar Producto" type="submit" class="botonnuevoproducto btn"></button>
        </a>
        </form>
       
            
        <div style="padding-left:250px">
                        @if($userPros == '')

                        <h3>No tienes Productos posteados aún, ¡Agrega alguno ahora!.</h3>
                      
                        @endif
                        
                        @if($userPros != '') 
                        

                        <table class="table table-hover shopping-cart-wrap" style="width:100%">
                            <thead class="text-muted">
                                <tr>
                                    <th scope="col" width="120">Producto</th>
                                    <th scope="col" width="80">Estado</th>
                                    <th scope="col" width="80">Precio</th>
                                    <th scope="col" width="80">Region</th>
                                    <th scope="col" width="80">Comuna</th>
                                    <th scope="col" width="100" class="center">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                
                                @foreach($userPros  as $prod)
                                <tr>
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap"><img src="{{ asset( $prod->product_picture) }}" class="img-thumbnail img-sm"></div>
                                            <figcaption class="media-body">   
                                            </figcaption>
                                        </figure>
                                        <h6 class="title text-truncate">{{ $prod->productName}} </h6>
                                                <dl class="param param-inline small">
                                                    <dt>Descripción: </dt>
                                                <dd>{{ $prod->productDescription}}</dd>
                                                </dl>
                                                <dl class="param param-inline small">
                                                    <dt>Valoración: </dt>
                                                    <dd>{{ $prod->reviewAverage}}</dd>
                                                </dl> 
                                    </td>
                                    <td> 
                                        @if($prod->availability == true)
                                        <label>Disponible</label>
                                        @endif
                                        @if($prod->availability == false)
                                        <label>No Disponible</label>
                                        @endif
                                    </td>
                                    <td> 
                                        <div class="price-wrap"> 
                                            <var class="precio"> CL ${{ $prod->price}}</var> 
                                            <small class="text-muted"></small> 
                                        </div> 
                                    </td>
                                    
                                    <td> 
                                        <label>{{ $prod->region}}</label>
                                    </td>
                                    <td> 
                                        <label>{{ $prod->comuna}}</label>
                                    </td>
                                    <td class="center">  
                                        <a href="" class="btn botonborrar " type=""> × Eliminar</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>  
                        </table>
                                <hr>
                                @endif
                            
                </div>
            </div>
        
    </div> 



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>