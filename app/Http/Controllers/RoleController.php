<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //metodo index que muestra todas las tuplas presentes, sin importar si estan visibles o no
    public function indexAll()
    {
        $role = Role::all();
        return response()->json($role);
    }

    //metodo index que muestra solo las tuplas que tienen visibilidad true
    public function indexVisible()
    {
        $role = Role::all()->where('visible', '==', true);
        return response()->json($role);
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
        if($request->roleName == NULL and $request->roleDescription == NULL){
            return "Los campos no pueden ser nulos. Por favor rellene los dos campos.";
        }elseif($request->roleName == NULL){
            return "El campo nombre no puede ser nulo. Por favor rellene ambos campos.";
        }elseif($request->roleDescription == NULL){
            return "El campo descripcion no puede ser nulo. Por favor rellene ambos campos.";
        }elseif(strlen($request->roleName) > 20){
            return "La cantidad de caracteres del campo nombre excede el maximo de 20 caracteres.";
        }elseif(strlen($request->roleDescription) > 200){
            return "La cantidad de caracteres del campo descripcion excede el maximo de 200 caracteres.";
        }
        $role = new Role();
        $role->roleName = $request->roleName;
        $role->roleDescription = $request->roleDescription;
        $role->visible = true;
        $role->save();
        return "Se ha creado un rol.";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        if($role == NULL){
            return "No se ha encontrado el rol.";
        }
        return $role;
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
        //No se deja como findOrFail para entregar un mensaje al usuario en caso de que no exista el id
        $role = Role::find($id);
        if($role == NULL){
            return "No se ha encontrado el rol.";
        }
        if ($request->get('roleName') != NULL){
            if(strlen($request->get('roleName')) >  20){
                return "La cantidad de caracteres del campo nombre excede el maximo de 20 caracteres.";
            }
            $role->roleName = $request->get('roleName');
        }
        if ($request->get('roleDescription') != NULL){
            if(strlen($request->get('roleDescription')) > 200){
                return "La cantidad de caracteres del campo descripcion excede el maximo de 200 caracteres.";
            }
            $role->roleDescription = $request->get('roleDescription');;
        }
        if ($request->get('visible') != NULL){
            $role->visible = $request->get('visible');
        }
        $role->save();
    
        return response()->json($role);
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
        $role = Role::find($id);
        if($role == NULL){
            return "No se ha encontrado el rol.";
        }
        $role->delete();
        return "Se ha eliminado el rol.";
    }

    //metodo delete que simula el borrado de una tupla mediante el cambio de visibilidad a false
    public function deleteVisibility($id)
    {
        $role = Role::find($id);
        if($role == NULL){
            return "No se ha encontrado el rol.";
        }
        $role->visible = false;
        $role->save();
        return "Se ha eliminado el rol.";
    }

    
}
