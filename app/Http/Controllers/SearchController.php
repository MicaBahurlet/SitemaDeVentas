<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Proveedore;
use App\Models\User;
use App\Models\Venta;
use Spatie\Permission\Models\Role;

class SearchController extends Controller
{

    public function search (Request $request)
    {
        $query = $request->input('query');

        $results = [];

        if ($query) {
            $results['categorias'] = Categoria::whereRaw("CONCAT_WS(' ', id, nombre, descripcion) LIKE ?", ["%$query%"])->get();


            $results['productos'] = Producto::whereRaw("CONCAT_WS(' ', id, nombre, descripcion) LIKE ?", ["%$query%"])->get();

            $results['proveedores'] = Proveedore::whereRaw("CONCAT_WS(' ', id, nombre, nit) LIKE ?", ["%$query%"])->get();

            $results['clientes'] = Cliente::whereRaw("CONCAT_WS(' ', id, persona_id) LIKE ?", ["%$query%"])->get();

            $results['users'] = User::whereRaw("CONCAT_WS(' ', id, name, email) LIKE ?", ["%$query%"])->get();


            $results['roles'] = Role::whereRaw("CONCAT_WS(' ', id, name) LIKE ?", ["%$query%"])->get();


            $results['ventas'] = Venta::whereRaw("CONCAT_WS(' ', id, numero_comprobante) LIKE ?", ["%$query%"])->get();


            $results['compras'] = Compra::whereRaw("CONCAT_WS(' ', id, numero_comprobante) LIKE ?", ["%$query%"])->get();

            $results['marcas'] = Marca::whereRaw("CONCAT_WS(' ', id, nombre) LIKE ?", ["%$query%"])->get();
        }

        return view('search_results', compact('results', 'query'));
    }
}
