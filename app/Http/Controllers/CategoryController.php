<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAll($data)
    {   
        $category = Category::all();
        return response()->json($category);
    }

    //metodo index que muestra solo las tuplas que tienen visibilidad true
    public function indexVisible()
    {
        $category = Category::all()->where('visible', '==', true);
        return View('welcomeLogged', compact('category'));
   }

   public function home()
   {
        $category = Category::all()->where('visible', '==', true);
        return View('welcomeNotLogged', compact('category'));
   }

   public function home2()
   {
        $category = Category::all()->where('visible', '==', true);
        return View('newRegister', compact('category'));
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
        $categoryver = Category::all()->where('categoryName', '==', $request->get('categoryName'));
        
        if($categoryver != '[]' ){
            return "Ya existe una categoría con ese nombre.";
        }

        if($request->categoryName == NULL or $request->categoryDescription == NULL){
            return "La categoria y su descripción no pueden ser nulas. Inténtelo denuevo.";
        }
        
        elseif(strlen($request->categoryName) > 20){
            return "El nombre de la categoría no puede tener mas de 20 caracteres. Inténtelo denuevo.";
        }
        
        elseif(strlen($request->categoryDescription) > 200){
            return "La descripción de la categoría no puede tener mas de 200 caracteres. Inténtelo denuevo.";
        }

        $category = new Category();
        $category->categoryName = $request->categoryName;
        $category->categoryDescription = $request->categoryDescription;
        $category->visible = $request->visible;
        $category->save();
        return response()->json([
            "message" => "La categoria ha sido creada"
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
        $category = Category::find($id);
        
        if($category == NULL){
            return "No se ha encontrado la categoría.";
        }
        return $category;
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
        $category = Category::findOrFail($id);

        if($category == NULL){
            return "No se ha encontrado la categoría.";
        }

        $categoryver = Category::all()->where('categoryName', '==', $request->get('categoryName'));
        
        //echo " $categoryver ";
        if($categoryver != '[]'){
            //echo " $categoryver ";
            return "Ya existe una categoría con ese nombre.";
        }

        if ($request->get('categoryName') != NULL){
            if(strlen($request->categoryName) > 20){
                return "La categoría no puede tener mas de 20 caracteres. Inténtelo denuevo.";
            }
            $category->categoryName = $request->get('categoryName');
        }
        if ($request->get('categoryDescription') != NULL){
            if(strlen($request->categoryDescription) > 200){
                return "La descripción de la categoría no puede tener mas de 200 caracteres. Inténtelo denuevo.";
            }
            $category->categoryDescription = $request->get('categoryDescription');
        }
        if ($request->get('visible') != NULL){
            $category->visible = $request->get('visible');
        }
        
        $category->save();

        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteData($id)
    {
        $category = Category::find($id);
        if($category == NULL){
            return "No se ha encontrado la categoría.";
        }
        $category->delete();
        return "La categoría ha sido eliminada";
    }

    //metodo delete que simula el borrado de una tupla mediante el cambio de visibilidad a false
    public function deleteVisibility($id)
    {
        $category = Category::find($id);
        if($category == NULL){
            return "No se ha encontrado la categoría.";
        }
        $category->visible = false;
        $category->save();
        return "La categoría ha sido eliminada";
    }
}
