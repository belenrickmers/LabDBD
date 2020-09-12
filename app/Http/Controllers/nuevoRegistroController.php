<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;

class nuevoRegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showCat()
   {
       $verificador = 0;
        $category = Category::all()->where('visible', '==', true);
        return View('newRegister', compact('category','verificador'));

        
   }

   public function validadorDatosRegistro(Request $request)
   {

    $category = Category::all()->where('visible', '==', true);
    
    $verificador = 0;
    
    if($request->firstName == NULL){
        $verificador = 1;
        return View('newRegister', compact('category','verificador'));
    }

    if(strlen($request->firstName) > 20){
        $verificador = 2;
        return View('newRegister', compact('category','verificador'));
    }
    
    if($request->lastName == NULL){
        $verificador = 3;
        return View('newRegister', compact('category','verificador'));
    }

    if(strlen($request->lastName) > 20){
        $verificador = 4;
        return View('newRegister', compact('category','verificador'));
    }
    
    if($request->dateofbirth == NULL){
        $verificador = 5;
        return View('newRegister', compact('category','verificador'));
    } 
    
    if($request->email == NULL){
        $verificador = 6;
        return View('newRegister', compact('category','verificador'));
    }

    $emailVer = User::all()->where('email', '==', $request->email);
    if($emailVer != '[]'){
        $verificador = 7;
        return View('newRegister', compact('category','verificador'));
    }

    if($request->password == NULL){
        $verificador = 8;
        return View('newRegister', compact('category','verificador'));
    }
    

    if($request->contactNumber == NULL){
        $verificador = 9;
        return View('newRegister', compact('category','verificador'));
    }
    if($request->password != $request->password2){
        $verificador = 10;
        return View('newRegister', compact('category','verificador'));
    }
    if($request->email != $request->email2){
        $verificador = 11;
        return View('newRegister', compact('category','verificador'));
    }

    $user = new User();

    $user->firstName = $request->firstName;
    $user->lastName = $request->lastName;
    $user->dateofbirth = $request->dateofbirth;
    $user->password = $request->password;
    $user->contactNumber = $request->contactNumber;
    $user->email = $request->email;
    $user->idRole = $request->idRole;
    $user->visible = true;
    
    $user->save();
    return View('welcomeLogged', compact('user','category','verificador'));

   }


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
