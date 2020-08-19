<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //metodo index que muestra todas las tuplas presentes, sin importar si estan visibles o no
    public function indexAll()
    {
        $permission = Permission::all();
        return response()->json($permission);
    }

    //metodo index que muestra solo las tuplas que tienen visibilidad true
    public function indexVisible()
    {
        $permission = Permission::all()->where('visible', '==', true);
        return response()->json($permission);
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
        $permission = new Permission();
        $permission->permission = $request->permission;
        $permission->permDescription = $request->permDescription;
        $permission->visible = $request->visible;
        $permission->save();
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
        $permission = Permission::find($id);
        return $permission;
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
        $permission = Payment::findOrFail($id);

        if ($request->get('var1') != NULL){
            $permission->permission = $request->get('var1');
        }

        if ($request->get('var2') != NULL){
            $permission->permDescription = $request->get('var2');
        }

        if ($request->get('var3') != NULL){
            $permission->visible = $request->get('var3');
        }

        $permission->save();

        return response()->json($permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //metodo delete que borra realmente la tupla
    public function deleteData($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return "El permiso fue eliminado";
    }

    //metodo delete que simula el borrado de una tupla mediante el cambio de visibilidad a false
    public function deleteVisibility($id)
    {
        $permission = Permission::find($id);
        $permission->visible = false;
        $permission->save();
        return "El permiso fue eliminado";
    }
}
