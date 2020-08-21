<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Metodo index que muestra todas las tuplas presentes, sin importar si estan visibles o no
    public function indexAll()
    {
        $user = User::all();
        return response()->json($user);
    }
    //Metodo index que muestra solo las tuplas que tienen visibilidad true
    public function indexVisible()
    {
        $user = User::all()->where('visible', '==', true);
        return response()->json($user);
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
        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->dateofbirth = $request->dateofbirth;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->contactNumber = $request->contactNumber;
        $user->idRole = $request->idRole;
        $user->visible = $request->visible;
        $user->save();
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
        $user = User::find($id);
        return $user;
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
        $user = User::findOrFail($id);

        if ($request->get('firstName') != NULL){
            $user->firstName = $request->get('firstName');
        }
        if ($request->get('lastName') != NULL){
            $user->lastName = $request->get('lastName');
        }
        if ($request->get('dateofbirth') != NULL){
            $user->dateofbirth = $request->get('dateofbirth');
        }
        if ($request->get('email') != NULL){
            $user->email = $request->get('email');
        }
        if ($request->get('password') != NULL){
            $user->password = $request->get('password');
        }
        if ($request->get('contactNumber') != NULL){
            $user->contactNumber = $request->get('contactNumber');
        }
        if ($request->get('visible') != NULL){
            $user->visible = $request->get('visible');
        }
        if ($request->get('idRole') != NULL){
            $user->idRole = $request->get('idRole');
        }
        
        $user->save();

        return response()->json($user);
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
        $user = User::find($id);
        $user->delete();
        return "El usuario fue eliminado.";
    }
    //Metodo delete que simula el borrado de una tupla mediante el cambio de visibilidad a false
    public function deleteVisibility($id)
    {
        $user = User::find($id);
        $user->visible = false;
        $user->save();
        return "El usuario fue eliminado.";
    }
}
