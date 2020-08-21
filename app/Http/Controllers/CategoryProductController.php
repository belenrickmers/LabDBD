<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryProduct;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryProduct = CategoryProduct::all();
        return $categoryProduct;
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
        $categoryProduct = new CategoryProduct();
        $categoryProduct->idCategory = $request->idCategory;
        $categoryProduct->idProduct = $request->idProduct;
        $categoryProduct->save();
        return "Se ha creado una categoryProduct";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoryProduct = CategoryProduct::find($id);
        return $categoryProduct; 
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
        $categoryProduct = CategoryProduct::findOrFail($id);

        if ($request->get('idCategory') != NULL){
            $categoryProduct->idCategory = $request->get('idCategory');
        }
        if ($request->get('idProduct') != NULL){
            $categoryProduct->idProduct = $request->get('idProduct');;
        }
        $categoryProduct->save();
    
        return response()->json($categoryProduct);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteData($id)
    {
        $categoryProduct = CategoryProduct::find($id);
        $categoryProduct->delete();
        return "Se ha eliminado la CategoryProduct";
    }
}
