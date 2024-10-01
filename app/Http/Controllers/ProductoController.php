<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Producto;
use Exception;
use Illuminate\Support\Facades\DB;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('producto.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::join('caracteristicas', 'marcas.caracteristica_id', '=', 'caracteristicas.id')  
        ->select('marcas.id as id', 'caracteristicas.nombre as nombre' )
        ->where('caracteristicas.estado', '=', 1)
        ->get();

        $categorias = Categoria::join('caracteristicas', 'categorias.caracteristica_id', '=', 'caracteristicas.id')
        ->select('categorias.id as id', 'caracteristicas.nombre as nombre' )
        ->where('caracteristicas.estado', '=', 1)
        ->get();

        // dd($marcas);
        return view('producto.create', compact('marcas' , 'categorias')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductoRequest $request)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            //tabla producto
            $producto = new Producto();
            if ($request->hasFile('img_path')) {
                $name = $producto->handleUploadedImage($request->file('img_path'));  
            }else{
                $name = null;
            }           
            $producto->fill ([
                'codigo' => $request->codigo,
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'fecha_vencimiento' => $request->fecha_vencimiento,
                'img_path' => $name,
                'marca_id' => $request->marca_id,
            ]);
            $producto->save();

            // tabla categoria
            $categorias = $request->get('categorias');
            $producto->categorias()->attach($categorias);

            DB::commit();
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
        }
        return redirect()->route('productos.index')->with('success', 'Producto creado con exito');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
