<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permisos = Permission::all();
        return view('role.create', compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required|array',
        ]);

        // dd($request->all());

        try {
            DB::beginTransaction();
            //Crear rol
            $rol = Role::create(['name' => $request->name]);
            // dd($rol);

            //Asignar permisos
            // dd($request->permission);
            $rol->syncPermissions(Permission::find($request->permission));
            // $rol->syncPermissions($request->permission); antes tenia esto pero no funcionaba

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        return redirect()->route('roles.index')->with('success', 'Rol creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permisos = Permission::all();
        return view('role.edit', compact('role', 'permisos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)

    {
        $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id,
            'permission' => 'required'
        ]);

        try {
            DB::beginTransaction();

            // Actualizar el nombre del rol
            Role::where('id',$role->id)
            ->update([
                'name' => $request->name
            ]);

            // Actualizar los permisos
            $role->syncPermissions(Permission::find($request->permission));

            DB::commit();
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
        }

        return redirect()->route('roles.index')->with('success', 'Rol editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::where('id', $id)->delete();
        
        return redirect()->route('roles.index')->with('success', 'Rol eliminado');
    }
}
