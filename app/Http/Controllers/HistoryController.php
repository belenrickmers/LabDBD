<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAll()
    {
        $history = History::all();
        return response()->json($history);
    }

    //metodo index que muestra solo las tuplas que tienen visibilidad true
    public function indexVisible()
    {
        $history = History::all()->where('visible', '==', true);
        return response()->json($history);
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
        $history = new History();
        $history->idUser = $request->idUser;
        $history->directAction = $request->directAction;
        $history->visible = $request->visible;
        $history->save();
        return response()->json([
            "message" => "Historial Creado"
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
        $history = History::find($id);
        if($history == NULL){
            return "No se ha encontrado el historial.";
        }
        return $history;
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
        $history = History::findOrFail($id);
        
        if($history == NULL){
            return "No se ha encontrado el historial.";
        }

        if ($request->get('directAction') != NULL){
            $history->directAction = $request->get('directAction');
        }
        if ($request->get('visible') != NULL){
            $history->visible = $request->get('visible');
        }
        
        $history->save();

        return response()->json($history);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteData($id)
    {
        $history = History::find($id);
        if($history == NULL){
            return "No se ha encontrado el historial.";
        }
        $history->delete();
        return "El historial ha sido eliminado";
    }

    //metodo delete que simula el borrado de una tupla mediante el cambio de visibilidad a false
    public function deleteVisibility($id)
    {
        $history = History::find($id);
        if($history == NULL){
            return "No se ha encontrado el historial.";
        }
        $history->visible = false;
        $history->save();
        return "El historial ha sido eliminado";
    }
}
