<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Metodo index que muestra todas las tuplas presentes, sin importar si estan visibles o no
    public function indexAll()
    {
        $transaction = Transaction::all();
        return response()->json($transaction);
    }
    //Metodo index que muestra solo las tuplas que tienen visibilidad true
    public function indexVisible()
    {
        $transaction = Transaction::all()->where('visible', '==', true);
        return response()->json($transaction);
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
        if($transaction->rentTime == NULL){
            return "Por favor seleccione el tiempo de arriendo del producto.";}
        
        //elseif($request->tsTransaction == NULL){ DUDAAAAAAa
            //return "El campo nombre no puede ser nulo. Por favor rellene ambos campos.";}

        $transaction = new Transaction();
        $transaction->rentTime = $request->rentTime;
        $transaction->tsTransaction = timestamp();
        $transaction->visible == True;
        $transaction->idUser = $request->idUser;
        $transaction->idProduct = $request->idProduct;
        $transaction->idReview = $request->idReview;
        $transaction->idPayment = $request->idPayment;
        $transaction->save();
        return response()->json([
            "message" => "Se ha realizado una transaccion"
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
        $transaction = Transaction::find($id);
        if($transaction == NULL){ //response????
            return "No se ha encontrado la transaccion";
        }
        return $transaction;
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
        $transaction = Transaction::findOrFail($id);

        if ($request->get('rentTime') != NULL){
            //disponibilidad????
            $transaction->rentTime = $request->get('rentTime');
        }
        if ($request->get('tsTransaction') != NULL){
            $transaction->tsTransaction = $request->get('tsTransaction');
        }
        if ($request->get('visible') != NULL){
            $transaction->visible = $request->get('visible');
        }
        if ($request->get('idUser') != NULL){
            $transaction->idUser = $request->get('idUser');
        }
        if ($request->get('idProduct') != NULL){
            $transaction->idProduct = $request->get('idProduct');
        }
        if ($request->get('idReview') != NULL){
            $transaction->idReview = $request->get('idReview');
        }
        if ($request->get('idPayment') != NULL){
            $transaction->idPayment = $request->get('idPayment');
        }
        
        $transaction->save();

        return response()->json($transaction);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Metodo delete que borra realmente la tupla
    public function deleteData($id)
    {
        $transaction = Transaction::find($id);
        if($transaction == NULL){
            return "Transaccion no encontrada";
        }
        $transaction->delete();
        return "La transacción fue eliminado.";
    }
    //Metodo delete que simula el borrado de una tupla mediante el cambio de visibilidad a false
    public function deleteVisibility($id)
    {
        $transaction = Transaction::find($id);
        if($transaction == NULL){
            return "Transaccion no encontrada";
        }
        $transaction->visible = false;
        $transaction->save();
        return "La transacción fue eliminado.";
    }
}
