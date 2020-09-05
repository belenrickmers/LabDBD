<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        if ($request->productName == NULL){
            return "Debe ingresar un nombre para el producto.";
        }
        if(strlen($request->productName) > 30){
            return "El nombre del producto debe tener maximo 30 caracteres";
        }
        $product->productName = $request->productName;

        if ($request->productDescription == NULL){
            return "Debe ingresar una descripcion para el producto.";
        }
        if(strlen($request->productDescription) > 250){
            return "La descripcion del producto no puede exceder los 250 caracteres";
        }
        $product->productDescription = $request->productDescription;

        if ($request->region == NULL){
            return "Debe ingresar una region para el producto.";
        }
        if(strlen($request->region) > 40){
            return "La region del producto debe tener maximo 40 caracteres";
        }
        $product->region = $request->region;

        if ($request->comuna == NULL){
            return "Debe ingresar una comuna para el producto.";
        }
        if(strlen($request->comuna) > 40){
            return "La comuna del producto debe tener maximo 40 caracteres";
        }
        $product->comuna = $request->comuna;
        
        if ($request->price == NULL){
            return "Debe ingresar un precio para el producto.";
        }
        if(strlen($request->price) < 0){
            return "El precio del producto no puede ser negativo.";
        }
        $product->price = $request->price;
        //Duda si tengo que comprobar estos parametros
        $product->availability = $request->availability;
        $product->reviewAverage = $request->reviewAverage;
        
        $product->visible = $request->visible;
        $product->save();
        return response()->json([
            "message" => "record created"
        ], 201);
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
        $review = Review::find($id);

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
}
