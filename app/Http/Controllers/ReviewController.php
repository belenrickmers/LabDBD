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
        $review = new Review();
        $review->comment = $request->comment;
        $review->rate = $request->rate;
        $review->visible = true;
        $review->save();
        return "Se ha creado un review";
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
        $review = Review::findOrFail($id);

        if ($request->get('comment') != NULL){
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
        $review->delete();
        return "Se ha eliminado el review";
    }

    //metodo delete que simula el borrado de una tupla mediante el cambio de visibilidad a false
    public function deleteVisibility($id)
    {
        $review = Review::find($id);
        $review->visible = false;
        $review->save();
        return "Se ha eliminado el review";
    }
}
