<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //metodo index que muestra todas las tuplas presentes, sin importar si estan visibles o no
    public function indexAll()
    {
        $review = Review::all();
        return response()->json($review);
    }
    //metodo index que muestra solo las tuplas que tienen visibilidad true
    public function indexVisible()
    {
        $review = Review::all()->where('visible', '==', true);
        return response()->json($review);
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
        //Solo pueden ser uno nulo o ambos no nulos
        if($request->comment == NULL and $request->rate == NULL){
            return "No se pudo crear el review. No pueden ser los dos campos nulos.";
        }else{
            if(strlen($request->comment) > 250){
                return "No se pudo crear el review. El comentario no puede tener mas de 250 caracteres.";
            }
            $review = new Review();
            $review->comment = $request->comment;
            $review->rate = $request->rate;
            $review->visible = true;
            $review->save();
            return "Se ha creado un review.";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::find($id);
        if($review == NULL){
            return "No se ha encontrado el review.";
        }
        return $review;
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
        //No se deja como findOrFail para entregar un mensaje al usuario en caso de que no exista el id
        $review = Review::find($id);
        if($review == NULL){
            return "No se ha encontrado el review.";
        }
        if ($request->get('comment') != NULL){
            if(strlen($request->get('comment')) > 250){
                return "El comentario no puede tener mas de 250 caracteres.";
            }
            $review->comment = $request->get('comment');
        }
        if ($request->get('rate') != NULL){
            $review->rate = $request->get('rate');;
        }
        if ($request->get('visible') != NULL){
            $review->visible = $request->get('visible');
        }
        $review->save();
    
        return response()->json($review);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //metodo delete que borra realmente la tupla
    public function deleteData($id)
    {
        $review = Review::find($id);
        if($review == NULL){
            return "No se ha encontrado el review.";
        }
        $review->delete();
        return "Se ha eliminado el review.";
    }

    //metodo delete que simula el borrado de una tupla mediante el cambio de visibilidad a false
    public function deleteVisibility($id)
    {
        $review = Review::find($id);
        if($review == NULL){
            return "No se ha encontrado el review.";
        }
        $review->visible = false;
        $review->save();
        return "Se ha eliminado el review.";
    }
}
