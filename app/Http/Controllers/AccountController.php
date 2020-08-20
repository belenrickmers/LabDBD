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
        $account = new Account();
        $account->idUser = $request->idUser;
        $account->cardNumber = $request->cardNumber;
        $account->cardType = $request->cardType;
        $account->bank = $request->bank;
        $account->visible = $request->visible;
        $account->save();
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
        $account = Account::find($id);
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

        if ($request->get('cardNumber') != NULL){
            $account->cardNumber = $request->get('cardNumber');
        }
        if ($request->get('cardType') != NULL){
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
        $account->delete();
        return "La cuenta ha sido eliminada";
    }

    //metodo delete que simula el borrado de una tupla mediante el cambio de visibilidad a false
    public function deleteVisibility($id)
    {
       $account = Account::find($id);
       $account->visible = false;
       $account->save();
       return "La cuenta ha sido eliminada";
    } 
}
