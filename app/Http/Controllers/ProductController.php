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
    public function index()
    {
        $product = Product::all();
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

        if ($request->get('var1') != NULL){
            $product->productName = $request->get('var1');
        }

        if ($request->get('var2') != NULL){
            $product->price = $request->get('var2');
        }

        if ($request->get('var3') != NULL){
            $product->productDescription = $request->get('var3');
        }

        if ($request->get('var4') != NULL){
            $product->region = $request->get('var4');
        }

        if ($request->get('var5') != NULL){
            $product->comuna = $request->get('var5');
        }

        if ($request->get('var6') != NULL){
            $product->availability = $request->get('var6');
        }

        if ($request->get('var7') != NULL){
            $product->reviewAverage = $request->get('var7');
        }

        if ($request->get('var8') != NULL){
            $product->visible = $request->get('var7');
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
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return "El metodo de pago fue eliminado";
    }
}
