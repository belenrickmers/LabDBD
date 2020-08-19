<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserProduct;

class UserProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userproduct = UserProduct::all();
        return $userproduct;
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
        $userproduct = new UserProduct();
        $userproduct->idUser = $request->idUser;
        $userproduct->idProduct = $request->idProduct;
        $userproduct->save();
        return "Se ha creado un UserProduct";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userproduct = UserProduct::find($id);
        return $userproduct; 
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
        $userproduct = UserProduct::findOrFail($id);

        if ($request->get('idUser') != NULL){
            $userproduct->idUser = $request->get('idUser');
        }
        if ($request->get('idProduct') != NULL){
            $userproduct->idProduct = $request->get('idProduct');;
        }
        $userproduct->save();
    
        return response()->json($userproduct);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteData($id)
    {
        $userproduct = UserProduct::find($id);
        $userproduct->delete();
        return "Se ha eliminado el UserProduct";
    }
}
