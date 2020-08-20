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
        $product->productName = $request->productName;
        $product->price = $request->price;
        $product->productDescription = $request->productDescription;
        $product->region = $request->region;
        $product->comuna = $request->comuna;
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
        $product = Product::findOrFail($id);

        if ($request->get('productName') != NULL){
            $product->productName = $request->get('productName');
        }

        if ($request->get('price') != NULL){
            $product->price = $request->get('price');
        }

        if ($request->get('productDescription') != NULL){
            $product->productDescription = $request->get('productDescription');
        }

        if ($request->get('region') != NULL){
            $product->region = $request->get('region');
        }

        if ($request->get('comuna') != NULL){
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
        $product->delete();
        return "El método de pago ha sido eliminado";
    }

    //metodo delete que simula el borrado de una tupla mediante el cambio de visibilidad a false
    public function deleteVisibility($id)
    {
       $product = Product::find($id);
       $product->visible = false;
       $product->save();
       return "El método de pago ha sido eliminado";
    } 
}
