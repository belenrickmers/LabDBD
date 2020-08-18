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
    public function index()
    {
        $payment = Payment::all();
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

        if ($request->get('var1') != NULL){
            $payment->payMethod = $request->get('var1');
        }

        if ($request->get('var2') != NULL){
            $payment->paymentState = $request->get('var2');
        }

        if ($request->get('var3') != NULL){
            $payment->tsPayment = $request->get('var3');
        }

        if ($request->get('var4') != NULL){
            $payment->visible = $request->get('var4');
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
    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return "El metodo de pago fue eliminado";
    }

}
