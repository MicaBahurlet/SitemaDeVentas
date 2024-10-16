<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompraRequest;
use App\Models\Compra;
use App\Models\Comprobante;
use App\Models\Producto;
use App\Models\Proveedore;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class compraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('compra.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedores = Proveedore::whereHas('persona', function ($query) {
            $query->where('estado', 1); //aqui el estado se encuentra dentro del modelo persona, por eso esto.
            
        })->get();
        $comprobantes = Comprobante::all();
        $productos = Producto::where('estado', 1)->get(); //esto es porque el estado está dentro del propio modelo
        return view('compra.create', compact('proveedores', 'comprobantes', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompraRequest $request)
    {
        try {
            DB::beginTransaction();
            $compra = Compra::create($request->validated());

            //recuperar los arrays
            $arrayProducto_id = $request->get('arrayidproducto');
            $arrayCantidad = $request->get('arraycantidad');
            $arrayPrecioCompra = $request->get('arraypreciocompra');
            $arrayPrecioVenta = $request->get('arrayprecioventa');

            //2.Realizar el llenado
            $siseArray = count($arrayProducto_id);
            $cont = 0;
            while($cont < $siseArray){
                $compra->productos()->syncWithoutDetaching([
                    $arrayProducto_id[$cont] => [
                        'cantidad' => $arrayCantidad[$cont],
                        'precio_compra' => $arrayPrecioCompra[$cont],
                        'precio_venta' => $arrayPrecioVenta[$cont]
                    ]
                ]);

                //3.Actualizar el stock
                $producto = Producto::find($arrayProducto_id[$cont]);
                $stockActual = $producto->stock;
                $stockNuevo = intval($arrayCantidad[$cont]);

                DB::table('productos')
                ->where('id',$producto->id)
                ->update([
                    'stock' => $stockActual + $stockNuevo
                ]);
                $cont++;
            }

            DB::commit();

        }catch (\Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('compras.index')->with('success', 'Compra registrada correctamente');

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
