<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Arriendame.cl | Publicar producto</title>

    <!-- PROBANDO FORMULARIO -->
    <link href="{{ asset('css/agregarProducto.css') }}" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;700&display=swap" rel="stylesheet">
    <!------ Include the above in your HEAD tag ---------->

    <!--Navbar-->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">

  </head>
  <body>
    
    
    <!--Navbar-->

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
            
            <div class="dropdown">
                <button class="btn btn-round btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                    </svg>
                    Mi cuenta
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Mis datos personales</a>
                <a class="dropdown-item" href="/misproductos">Mis productos</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- PROBANDO FORMULARIO -->

    <form action="{{route( 'addProduct')}} " method="POST" class="container-sm " enctype = "multipart/form-data">
        <div class="container contact">
            <div class="row">
                <div class="col-md-3">
                    <div class="contact-info">
                        <h1 class="col-letras fuente-texto">Publica tu producto</h1>
                        <h6 class="col-letras fuente-texto2">Ingresa los datos de tu producto para publicarlo.</h6>
                    </div>
                </div>

                
                <div class="col-md-9">
                    <div class="contact-form">
                        <div class="form-group">
                            <label class="control-label col-sm-4 fuente-texto2" for="nombre">Nombre publicación:</label>
                            <div class="col-sm-10">          
                                <input type="text" class="form-control borde-celdas" id="productName" placeholder="Ingrese el nombre de la publicación." name="productName">
                                <div>
                                    @if (\Session::has('nameFail'))
                                    <div class="p1">
                                        {{ \Session::get('nameFail') }}
                                    </div>
                                    @endif
                                    
                                    @if (\Session::has('nameLenFail'))
                                    <div class="p1">
                                        {{ \Session::get('nameLenFail') }}
                                    </div>
                                    @endif
                                                                 
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4 fuente-texto2" for="precio">Precio (CLP):</label>
                            <div class="col-sm-10">          
                                <input type="text" class="form-control borde-celdas" id="price" placeholder="Ingrese el precio del producto." name="price">
                                <div>
                                    @if (\Session::has('priceFail'))
                                    <div class="p1">
                                        {{ \Session::get('priceFail') }}
                                    </div>
                                    @endif
                                    @if (\Session::has('priceTypeFail'))
                                    <div class="p1">
                                        {{ \Session::get('priceTypeFail') }}
                                    </div>
                                    @endif
                                    @if (\Session::has('priceValueFail'))
                                    <div class="p1">
                                        {{ \Session::get('priceValueFail') }}
                                    </div>
                                    @endif
                                </div> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2 fuente-texto2" for="region">Región:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control borde-celdas" id="region" placeholder="Ingrese la región desde donde arrienda." name="region">
                                <div>
                                    @if (\Session::has('regionFail'))
                                    <div class="p1">
                                        {{ \Session::get('regionFail') }}
                                    </div>
                                    @endif
                                    @if (\Session::has('regionLenFail'))
                                    <div class="p1">
                                        {{ \Session::get('regionLenFail') }}
                                    </div>
                                    @endif
                                </div> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2 fuente-texto2" for="comuna">Comuna:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control borde-celdas" id="comuna" placeholder="Ingrese la comuna desde donde arrienda." name="comuna">
                                <div>
                                    @if (\Session::has('comunaFail'))
                                    <div class="p1">
                                        {{ \Session::get('comunaFail') }}
                                    </div>
                                    @endif
                                    @if (\Session::has('comunaLenFail'))
                                    <div class="p1">
                                        {{ \Session::get('comunaLenFail') }}
                                    </div>
                                    @endif
                                </div> 
                            </div>
                        </div>
                        
                        <!-- AQUI DEBEN IR LAS CATEGORIAS -->

                        <div class="form-group">
                            <label class="control-label col-sm-2 fuente-texto2" for="categoria">Categorías:</label>
                            <div>

                                <form>
                                    <div class="form-check">
                                            @foreach( $category as $cat)
                                            <label class="control-label col-sm-4 fuente-texto2">
                                                
                                                <input type="checkbox" unchecked id='categories[]' name='categories[]' value='{{ $cat->categoryName}}'> <span class="label-text">{{ $cat->categoryName }}</span>
                                                
                                            </label>
                                            @endforeach
                                    </div>
                                </form>
                                <div>
                                    @if (\Session::has('categoryFail'))
                                    <div class="p1">
                                        {{ \Session::get('categoryFail') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- #############################-->

                        <div class="form-group">
                            <label class="control-label col-sm-2 fuente-texto2" for="descripcion">Descripción:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control borde-celdas" rows="5" id="productDescription" placeholder="Ingrese la descripción del producto. Máximo 250 caracteres." name="productDescription"></textarea>
                                <div>
                                    @if (\Session::has('descriptionFail'))
                                    <div class="p1">
                                        {{ \Session::get('descriptionFail') }}
                                    </div>
                                    @endif
                                    @if (\Session::has('descriptionLenFail'))
                                    <div class="p1">
                                        {{ \Session::get('descriptionLenFail') }}
                                    </div>
                                    @endif
                                </div>                                
                            </div>
                        </div>

                        <!-- PARA LA IMAGEN ## INCOMPLETO -->
                        <div class="form-group">
                            <label class="control-label col-sm-2 fuente-texto2" for="imagen">Imagen:</label>
                            <div>
                                <input id="product_picture" accept="image/*" type="file" name="product_picture" class="col-sm-8" >
                            </div>
                                
                            <div>
                                @if (\Session::has('fail'))
                                <div class="alert alert-danger imageAlert">
                                    
                                        {!! \Session::get('fail') !!}
                                    
                                </div>
                                @endif
                            </div>
                            
                        </div>
                        <!-- ############################# -->

                        <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default fuente-texto2">Publicar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>