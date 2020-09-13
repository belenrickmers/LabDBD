<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;


use App\Category;
use App\CategoryProduct;
use App\User;
use App\UserProduct;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAll()
    {
        $product = Product::all();
        return response()->json($product);
    }


    //metodo index que muestra solo las tuplas que tienen visibilidad true
    public function indexVisible()
    {
        $product = Product::all()->where('visible', '==', true);
        return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function validarImagen(Request $request){
        if($this->validate($request, ['product_picture' => 'required|image|mimes:jpeg,png,jpg|max:1']) == false){
            return "no se que";
        }
        //return back()->with('succes', 'porqueeeeeeee');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $resultado = 0;
        $user = User::all()->where('id', '==', $request->id);
        $user = $user->first();
        $category = Category::all()->where('visible', '==', true);
        if ($request->productName == NULL){
            $resultado = 1;
            //return "Debe ingresar un nombre para el producto.";
            //return back()->with('nameFail', 'Debe ingresar un nombre para el producto.');
            return View('agregarProducto', compact('user', 'category', 'resultado'));
        }
        if(strlen($request->productName) > 30){
            $resultado = 2;
            //return "El nombre del producto debe tener maximo 30 caracteres";
            //return back()->with('nameLenFail', 'El nombre del producto debe tener maximo 30 caracteres.');
            return View('agregarProducto', compact('user', 'category', 'resultado'));
        }
        $product->productName = $request->productName;

        if ($request->productDescription == NULL){
            $resultado = 3;
            //return "Debe ingresar una descripcion para el producto.";
            //return back()->with('descriptionFail', 'Debe ingresar una descripcion para el producto.');
            return View('agregarProducto', compact('user', 'category', 'resultado'));
        }
        if(strlen($request->productDescription) > 250){
            $resultado = 4;
            //return "La descripcion del producto no puede exceder los 250 caracteres";
            //return back()->with('descriptionLenFail', 'La descripcion del producto no puede exceder los 250 caracteres.');
            return View('agregarProducto', compact('user', 'category', 'resultado'));
        }
        $product->productDescription = $request->productDescription;

        if ($request->region == NULL){
            $resultado = 5;
            //return "Debe ingresar una region para el producto.";
            //return back()->with('regionFail', 'Debe ingresar una region para el producto.');
            return View('agregarProducto', compact('user', 'category', 'resultado'));
        }
        if(strlen($request->region) > 40){
            $resultado = 6;
            //return "La region del producto debe tener maximo 40 caracteres";
            //return back()->with('regionLenFail', 'La region del producto debe tener maximo 40 caracteres.');
            return View('agregarProducto', compact('user', 'category', 'resultado'));
        }
        $product->region = $request->region;

        if ($request->comuna == NULL){
            $resultado = 7;
            //return "Debe ingresar una comuna para el producto.";
            //return back()->with('comunaFail', 'Debe ingresar una comuna para el producto.');
            return View('agregarProducto', compact('user', 'category', 'resultado'));
        }
        if(strlen($request->comuna) > 40){
            $resultado = 8;
            //return "La comuna del producto debe tener maximo 40 caracteres";
            //return back()->with('comunaLenFail', 'La comuna del producto debe tener maximo 40 caracteres.');
            return View('agregarProducto', compact('user', 'category', 'resultado'));
        }
        $product->comuna = $request->comuna;
        
        //VALIDAR SI EL PRECIO ES UN NUMERO
        $validatePrice = Validator::make($request->all(), ['price' => 'numeric',]);
        if($validatePrice->fails()){
            $resultado = 9;
            //return back()->with('priceTypeFail', 'El precio debe ser un número');
            return View('agregarProducto', compact('user', 'category', 'resultado'));
        }

        if ($request->price == NULL){
            $resultado = 10;
            //return "Debe ingresar un precio para el producto.";
            //return back()->with('priceFail', 'Debe ingresar un precio para el producto.');
            return View('agregarProducto', compact('user', 'category', 'resultado'));
        }
        if($request->price < 0){
            $resultado = 11;
            //return "El precio del producto no puede ser negativo.";
            //return back()->with('priceValueFail', 'El precio del producto no puede ser negativo.');
            return View('agregarProducto', compact('user', 'category', 'resultado'));
        }
        if($request->price > 2000000000){
            $resultado = 14;
            //return "El precio del producto no puede ser negativo.";
            //return back()->with('priceValueFail', 'El precio del producto no puede ser negativo.');
            return View('agregarProducto', compact('user', 'category', 'resultado'));
        }
        $product->price = $request->price;
        //Duda si tengo que comprobar estos parametros
        //$product->availability = $request->availability;
        //$product->reviewAverage = $request->reviewAverage;
        
        //$product->visible = $request->visible;

        //Deje esto asi para poder agregar un producto desde la vista
        $product->availability = true;
        $product->reviewAverage = 0;
        $product->visible = true;

        $request->all();
        if($request->hasFile('product_picture')){
            $destination_path = 'images/products';
            $product_picture = $request->file('product_picture');
            
            $validate = Validator::make($request->all(), ['product_picture' => 'image|mimes:jpeg,png,jpg|max:2048',]);
            if($validate->fails()){
                $resultado = 12;
                
                //return back()->with('fail', 'Imagen invalida.');
                return View('agregarProducto', compact('user', 'category', 'resultado'));
            }

            $image_name = $product_picture->getClientOriginalName();
            $path = $request->file('product_picture')->storeAs($destination_path, $image_name);
            $product->save();
            $product->product_picture = 'images/products/' . $product->id . $image_name;
        }

        $product->save();
        $categories = $request->categories;
        
        if(empty($categories)){
            $resultado = 13;
            //return "Debe seleccionar al menos una categoría para el producto.";
            //return back()->with('categoryFail', 'Debe seleccionar al menos una categoría para el producto.');
            return View('agregarProducto', compact('user', 'category', 'resultado'));
        }

        //CODIGO PARA INSERTAR TUPLA EN USERPRODUCT
        $usProd = new userProduct();
        $usProd->idUser = $request->id;
        $usProd->idProduct = $product->id;
        $usProd->save();
        
        //PARA COMBINAR LAS VISTAS

        $category = Category::all()->where('visible', '==', true);
        $user = User::all()->where('id', '==', $request->id);
        $user = $user->first();

        $idProductsUser = UserProduct::all()->where('idUser', '==', $request->id);
        $products = array();
        foreach($idProductsUser as $prodUs){
            array_push($products, $prodUs->idProduct);
        }
        $userProducts = '';
        foreach($products as $prod){
            $iterador = '';
            if($userProducts == '' ){
                if($prod == 1){
                    $userProducts = '{"1":';
                    $iterador = Product::all()->where('id', '==', $prod);
                    $iterador = substr($iterador, 1);
                    $iterador = substr_replace($iterador,"", -1);
                    $userProducts = $userProducts . "" . $iterador;
                }
                else{
                    $userProducts = $userProducts . "" . Product::all()->where('id', '==', $prod);
                    $userProducts = substr_replace($userProducts ,"",-1);
                }
            }
            else{
                if($prod == 1){
                        $userProducts = $userProducts . ',"1":';
                        $iterador = Product::all()->where('id', '==', $prod);
                        $iterador = substr($iterador, 1);
                        $iterador = substr_replace($iterador,"", -1);
                        $userProducts = $userProducts . "" . $iterador;
                }

            
                else{
                    $iterador = Product::all()->where('id', '==', $prod);
                    $iterador = substr($iterador, 1);
                    $iterador = substr_replace($iterador,"", -1);
                    $userProducts = $userProducts . "," . $iterador;
                }
            }
        }
        $userProducts = $userProducts . "}";
        $userPros = json_decode($userProducts);

        //ACA TERMINA LOL
        
        foreach($categories as $cat){
            $idCategory = Category::all()->where('categoryName', '==', $cat);
            $catProd = new CategoryProduct();
            $catProd->idCategory = $idCategory->first()->id;
            $catProd->idProduct = $product->id;
            $catProd->save();
        }


        return View('ownProducts', compact('userPros','category','user'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $review = Review::find($id);///??????

        if ($request->get('productName') != NULL){
            if(strlen($request->productName) > 30){
                return "El nombre del producto debe tener maximo 30 caracteres";
            }
            $product->productName = $request->get('productName');
        }

        if ($request->get('price') != NULL){
            if(strlen($request->price) < 0){
                return "El precio del producto no puede ser negativo.";
            }
            $product->price = $request->get('price');
        }
        
        if ($request->get('productDescription') != NULL){
            if(strlen($request->productDescription) > 250){
                return "La descripcion del producto no puede exceder los 250 caracteres";
            }
            $product->productDescription = $request->get('productDescription');
        }

        if ($request->get('region') != NULL){
            if(strlen($request->region) > 40){
                return "La region del producto debe tener maximo 40 caracteres";
            }
            $product->region = $request->get('region');
        }

        if ($request->get('comuna') != NULL){
            if(strlen($request->comuna) > 40){
                return "La comuna del producto debe tener maximo 40 caracteres";
            }
            $product->comuna = $request->get('comuna');
        }

        if ($request->get('availability') != NULL){
            $product->availability = $request->get('availability');
        }

        if ($request->get('reviewAverage') != NULL){
            $product->reviewAverage = $request->get('reviewAverage');
        }

        if ($request->get('visible') != NULL){
            $product->visible = $request->get('visible');
        }

        $product->save();

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteData($id)
    {
        $product = Product::find($id);
        if($product == NULL){
            return "No se ha encontrado el producto.";
        }
        $product->delete();
        return "El producto ha sido eliminado";
    }

    //metodo delete que simula el borrado de una tupla mediante el cambio de visibilidad a false
    public function deleteVisibility($id)
    {
       $product = Product::find($id);
       if($product == NULL){
        return "No se ha encontrado el producto.";
    }
       $product->visible = false;
       $product->save();
       return "El producto ha sido eliminado";
    }

    ///////////   ///////////////
    public function publicarProducto(Request $request){
        $category = Category::all()->where('visible', '==', true);
        $user = User::all()->where('id', '==', $request->id);
        $user = $user->first();
        $resultado = 0;
        return View('agregarProducto', compact('category','user', 'resultado'));
    }
}
