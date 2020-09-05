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
        if ($request->permission == NULL){
            return "Debe ingresar el nombre del permiso.";
        }
        if(strlen($request->permission) > 20){
            return "El nombre del permiso debe tener maximo 20 caracteres";
        }
        $permission->permission = $request->permission;

        if ($request->permDescription == NULL){
            return "Debe ingresar una descripcion para el permiso.";
        }
        if(strlen($request->permDescription) > 200){
            return "La descripcion del permiso no puede exceder los 200 caracteres";
        }
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

        if ($request->get('permission') != NULL){
            if(strlen($request->permission) > 20){
                return "El nombre del permiso debe tener maximo 20 caracteres";
            }
            $permission->permission = $request->get('permission');
        }

        if ($request->get('permDescription') != NULL){
            if(strlen($request->permDescription) > 200){
                return "La descripcion del permiso no puede exceder los 200 caracteres";
            }
            $permission->permDescription = $request->get('permDescription');
        }

        if ($request->get('visible') != NULL){
            $permission->visible = $request->get('visible');
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
        if($permission == NULL){
            return "No se ha encontrado el permiso.";
        }
        $permission->delete();
        return "El permiso fue eliminado";
    }

    //metodo delete que simula el borrado de una tupla mediante el cambio de visibilidad a false
    public function deleteVisibility($id)
    {
        $permission = Permission::find($id);
        if($permission == NULL){
            return "No se ha encontrado el permiso.";
        }
        $permission->visible = false;
        $permission->save();
        return "El permiso fue eliminado";
    }
}
