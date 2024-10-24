<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('profile.index' , compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $profile)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$profile->id,
            'password' => 'nullable',
        ]);

        //comprobar si el password ha sido modificado
        if (empty($request->password)) {
            //si el password es vacio que quite el password de mi request
            $request = Arr::except($request, array('password'));
        } else {
            //de lo contrario que hashee el password y lo mande
            $fieldHash = Hash::make($request->password);
            $request->merge(['password' => $fieldHash]);
        }
        //actualizar el usuario 

        $profile->update($request->all());

        return redirect()->route('profile.index')->with('success', 'Usuario actualizado');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
