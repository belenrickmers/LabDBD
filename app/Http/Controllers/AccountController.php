<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAll()
    {
        $account = Account::all();
        return response()->json($account);
    }

    //metodo index que muestra solo las tuplas que tienen visibilidad true
    public function indexVisible()
    {
        $account = Account::all()->where('visible', '==', true);
        return response()->json($account);
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

        if($request->idUser == NULL or $request->cardNumber == NULL or $request->cardType == NULL or $request->bank == NULL){
            return "Los campos no pueden ser nulos. Por favor rellene todos los campos.";
        }

        elseif(strlen($request->cardNumber) != 12 ){
            return "El número de tarjeta es inválido. Por favor ingresar nuevamente.";
        }

        elseif($request->cardType != "Cuenta Corriente" and $request->cardType != "Cuenta VISA" and $request->cardType != "Cuenta RUT"){
            return "El tipo de tarjeta es inválido. Por favor ingresar nuevamente.";
        }

        $account = new Account();
        $account->idUser = $request->idUser;
        $account->cardNumber = $request->cardNumber;
        $account->cardType = $request->cardType;
        $account->bank = $request->bank;
        $account->visible = true;
        $account->save();
        return response()->json([
            "message" => "La cuenta ha sido agregada con éxito."
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
        $account = Account::find($id);
        
        if($account == NULL){
            return "No se ha encontrado la cuenta.";
        }

        return $account;
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
        $account = Account::findOrFail($id);

        if($account == NULL){
            return "No se ha encontrado la cuenta.";
        }
        
        if ($request->get('cardNumber') != NULL){
            if(strlen($request->cardNumber) != 12 ){
                return "El número de tarjeta es inválido. Por favor ingresar nuevamente.";
            }
            $account->cardNumber = $request->get('cardNumber');
        }

        if ($request->get('cardType') != NULL){
            if($request->cardType != "Cuenta Corriente" && $request->cardType != "Cuenta VISA" && $request->cardType != "Cuenta RUT"){
                return "El tipo de tarjeta es inválido. Por favor ingresar nuevamente.";
            }
            $account->cardType = $request->get('cardType');
        }

        if ($request->get('bank') != NULL){
            $account->bank = $request->get('bank');
        }
        if ($request->get('visible') != NULL){
            $account->visible = $request->get('visible');
        }

        $account->save();

        return response()->json($account);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteData($id)
    {
        $account = Account::find($id);
        if($account == NULL){
            return "No se ha encontrado la cuenta.";
        }
        $account->delete();
        return "La cuenta ha sido eliminada";
    }

    //metodo delete que simula el borrado de una tupla mediante el cambio de visibilidad a false
    public function deleteVisibility($id)
    {
       $account = Account::find($id);
       if($account == NULL){
            return "No se ha encontrado la cuenta.";
        }
       $account->visible = false;
       $account->save();
       return "La cuenta ha sido eliminada";
    } 
}
