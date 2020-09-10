<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;

class LoginController extends Controller
{
    
    public function loginHome(){
        $category = Category::all()->where('visible', '==', true);
        return View('login', compact('category'));
    }


    public function ingresoDatoslogin(Request $request){
        //$user = new User();
        $user = User::all()->where('email', '==', $request->email);
        $resultado = 0; //resultado = 1 -> usuario mal, resultado = 2 -> password mal
        $validacionUsuario = false;
        $validacionPassword = false;
        if($user != '[]'){
            $validacionUsuario = true;
            if($user->first()->password == $request->password){
                $validacionPassword = true;
            }
        }

        $category = Category::all()->where('visible', '==', true);

        if($validacionUsuario and $validacionPassword){
            return View('welcomeLogged', compact('user', 'category'));
        }
        else if($validacionUsuario == false){
            $resultado = 1;
            return View('login', compact('resultado', 'category'));
        }else if($validacionPassword == false){
            $resultado = 2;
            return View('login', compact('resultado', 'category'));
        }
    }

    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
