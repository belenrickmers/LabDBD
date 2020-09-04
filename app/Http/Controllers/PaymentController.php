<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Metodo index que muestra todas las tuplas presentes, sin importar si estan visibles o no
    public function indexAll()
    {
        $payment = Payment::all();
        return response()->json($payment);
    }
    //Metodo index que muestra solo las tuplas que tienen visibilidad true
    public function indexVisible()
    {
        $payment = Payment::all()->where('visible', '==', true);
        return response()->json($payment);
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
        $payment = new Payment();
        if ($request->payMethod == NULL){
            return "Debe ingresar un metodo de pago.";
        }
        if(strlen($request->payMethod) > 20){
            return "El metodo de pago debe tener maximo 20 caracteres";
        }
        $payment->payMethod = $request->payMethod;
        
        $payment->paymentState = $request->paymentState;
        $payment->tsPayment = $request->tsPayment;
        $payment->visible = $request->visible;
        $payment->save();
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
        $payment = Payment::find($id);
        return $payment;
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
        $payment = Payment::findOrFail($id);

        if ($request->get('payMethod') != NULL){
            if(strlen($request->payMethod) > 20){
                return "El metodo de pago debe tener maximo 20 caracteres";
            }
            $payment->payMethod = $request->get('payMethod');
        }

        if ($request->get('paymentState') != NULL){
            $payment->paymentState = $request->get('paymentState');
        }

        if ($request->get('tsPayment') != NULL){
            $payment->tsPayment = $request->get('tsPayment');
        }

        if ($request->get('visible') != NULL){
            $payment->visible = $request->get('visible');
        }

        $payment->save();

        return response()->json($payment);
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
        $payment = Payment::find($id);
        if($payment == NULL){
            return "No se ha encontrado el pago.";
        }
        $payment->delete();
        return "El pago fue eliminado";
    }
    //Metodo delete que simula el borrado de una tupla mediante el cambio de visibilidad a false
    public function deleteVisibility($id)
    {
        $payment = Payment::find($id);
        if($payment == NULL){
            return "No se ha encontrado el pago.";
        }
        $payment->visible = false;
        $payment->save();
        return "El pago fue eliminado";
    }
}
