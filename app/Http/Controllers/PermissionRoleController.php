<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PermissionRole;

class PermissionRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAll()
    {
        $permissionrole = PermissionRole::all();
        return response()->json($permissionrole);
    }


    //metodo index que muestra solo las tuplas que tienen visibilidad true
    public function indexVisible()
    {
        $permissionrole = PermissionRole::all()->where('visible', '==', true);
        return response()->json($permissionrole);
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
        $permissionrole = new PermissionRole();
        $permissionrole->idPermission = $request->idPermission;
        $permissionrole->idRole = $request->idRole;
        $permissionrole->save();
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
        $permissionrole = PermissionRole::find($id);
        return $permissionrole;
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
        $permissionrole = PermissionRole::findOrFail($id);

        if ($request->get('idPermission') != NULL){
            $permissionrole->idPermission = $request->get('idPermission');
        }
        if ($request->get('idRole') != NULL){
            $permissionrole->idRole = $request->get('idRole');
        }

        $permissionrole->save();

        return response()->json($permissionrole);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteData($id)
    {
        $permissionrole = PermissionRole::find($id);
        $permissionrole->delete();
        return "El Permiso del Role fue eliminado";
    }

    //metodo delete que simula el borrado de una tupla mediante el cambio de visibilidad a false
    public function deleteVisibility($id)
    {
       $permissionrole = PermissionRole::find($id);
       $permissionrole->visible = false;
       $permissionrole->save();
       return "El Permiso del Role fue eliminado";
    }
}