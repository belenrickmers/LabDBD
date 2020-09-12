<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\UserProduct;
use App\User;


class ownProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showData(Request $request)
   {
        $category = Category::all()->where('visible', '==', true);

        $user = User::all()->where('id', '==', $request->id);
        $user = $user->first();

        $idProductsUser = UserProduct::all()->where('idUser', '==', $request->id);
        $products = array();
        foreach($idProductsUser as $prodUs){
            array_push($products, $prodUs->idProduct);
        }
        $userProducts = '';
        foreach($products as $prod){
            $iterador = '';
            if($userProducts == '' ){
                if($prod == 1){
                    $userProducts = '{"1":';
                    $iterador = Product::all()->where('id', '==', $prod);
                    $iterador = substr($iterador, 1);
                    $iterador = substr_replace($iterador,"", -1);
                    $userProducts = $userProducts . "" . $iterador;
                }
                else{
                    $userProducts = $userProducts . "" . Product::all()->where('id', '==', $prod);
                    $userProducts = substr_replace($userProducts ,"",-1);
                }
            }
            else{
                if($prod == 1){
                        $userProducts = $userProducts . ',"1":';
                        $iterador = Product::all()->where('id', '==', $prod);
                        $iterador = substr($iterador, 1);
                        $iterador = substr_replace($iterador,"", -1);
                        $userProducts = $userProducts . "" . $iterador;
                }

            
                else{
                    $iterador = Product::all()->where('id', '==', $prod);
                    $iterador = substr($iterador, 1);
                    $iterador = substr_replace($iterador,"", -1);
                    $userProducts = $userProducts . "," . $iterador;
                }
            }
        }
        $userProducts = $userProducts . "}";
        $userPros = json_decode($userProducts);

        return View('ownProducts', compact('category','userPros','user'));
   }

    public function goHome(Request $request){
        $category = Category::all()->where('visible', '==', true);
        $user = User::all()->where('id', '==', $request->id);
        $user = $user->first();
        return View('welcomeLogged', compact('category','user'));
    }

    public function addProduct(Request $request){
        $category = Category::all()->where('visible', '==', true);
        $user = User::all()->where('id', '==', $request->id);
        $user = $user->first();
        return View('agregarProducto', compact('category','user'));
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
