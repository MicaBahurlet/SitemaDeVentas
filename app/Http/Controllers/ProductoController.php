<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Producto;
use Exception;
use Illuminate\Support\Facades\DB;


class ProductoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-producto|crear-producto|editar-producto|eliminar-producto', ['only' => ['index']]);
        $this->middleware('permission:crear-producto', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-producto', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-producto', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with(['categorias.caracteristica','marca.caracteristica']) -> latest()->get();
        return view('producto.index', compact('productos'));
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
    public function edit(Producto $producto)
    {
        $marcas = Marca::join('caracteristicas', 'marcas.caracteristica_id', '=', 'caracteristicas.id')  
        ->select('marcas.id as id', 'caracteristicas.nombre as nombre' )
        ->where('caracteristicas.estado', '=', 1)
        ->get();

        $categorias = Categoria::join('caracteristicas', 'categorias.caracteristica_id', '=', 'caracteristicas.id')
        ->select('categorias.id as id', 'caracteristicas.nombre as nombre' )
        ->where('caracteristicas.estado', '=', 1)
        ->get();

        return view('producto.edit', compact('producto', 'marcas' , 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        try{
            DB::beginTransaction();

            //tabla producto
            if ($request->hasFile('img_path')) {
                $name = $producto->handleUploadedImage($request->file('img_path'));  

                //eliminar si es que existe una img
                if ($producto->img_path != null) {
                    $producto->handleRemoveImage($producto->img_path);
                }
            }else{
                $name = $producto->img_path;
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
            $producto->categorias()->sync($categorias);


            DB::commit();

        } catch(Exception $e){

            DB::rollBack();
        }

        return redirect()->route('productos.index')->with('success', 'Producto actualizado con exito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = '';
        $producto = Producto::find($id);
        if ($producto->estado == 1) {
            Producto::where('id', $producto->id)
                ->update([
                    'estado' => 0
                ]);
            $message = 'Producto eliminado';
        } else {
            Producto::where('id', $producto->id)
                ->update([
                    'estado' => 1
                ]);
            $message = 'Producto restaurado';
        }

        return redirect()->route('productos.index')->with('success', $message);
    }
}
