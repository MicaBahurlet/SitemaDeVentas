<!-- @extends('template')

@section('title', 'Resultados de búsqueda')

@section('content')
    <div class="container">
        <h2>Resultados de búsqueda para: "{{ $query }}"</h2>

        @if ($results)
            {{-- Categorias --}}
            @if (isset($results['categorias']) && $results['categorias']->isNotEmpty())
                <h3>Categorias</h3>
                <ul>
                    @foreach ($results['categorias'] as $categoria)
                        <li>{{ $categoria->nombre }} - {{ $categoria->descripcion }}</li>
                    @endforeach
                </ul>
            @else
                <p>No se encontraron categorías.</p>
            @endif

            {{-- Productos --}}
            @if (isset($results['productos']) && $results['productos']->isNotEmpty())
                <h3>Productos</h3>
                <ul>
                    @foreach ($results['productos'] as $producto)
                        <li>{{ $producto->nombre }} - {{ $producto->descripcion }} - Código: {{ $producto->codigo }}</li>
                    @endforeach
                </ul>
            @else
                <p>No se encontraron productos.</p>
            @endif

            {{-- Proveedores --}}
            @if (isset($results['proveedores']) && $results['proveedores']->isNotEmpty())
                <h3>Proveedores</h3>
                <ul>
                    @foreach ($results['proveedores'] as $proveedor)
                        <li>{{ $proveedor->nombre }}</li>
                    @endforeach
                </ul>
            @else
                <p>No se encontraron proveedores.</p>
            @endif

            {{-- Marcas --}}
            @if (isset($results['marcas']) && $results['marcas']->isNotEmpty())
                <h3>Marcas</h3>
                <ul>
                    @foreach ($results['marcas'] as $marca)
                        <li>{{ $marca->nombre }}</li>
                    @endforeach
                </ul>
            @else
                <p>No se encontraron marcas.</p>
            @endif

            {{-- Clientes --}}
            @if (isset($results['clientes']) && $results['clientes']->isNotEmpty())
                <h3>Clientes</h3>
                <ul>
                    @foreach ($results['clientes'] as $cliente)
                        <li>{{ $cliente->persona->nombre }}</li>
                    @endforeach
                </ul>
            @else
                <p>No se encontraron clientes.</p>
            @endif

            {{-- Compras --}}
            @if (isset($results['compras']) && $results['compras']->isNotEmpty())
                <h3>Compras</h3>
                <ul>
                    @foreach ($results['compras'] as $compra)
                        <li>{{ $compra->numero_comprobante }} - Total: {{ $compra->total }}</li>
                    @endforeach
                </ul>
            @else
                <p>No se encontraron compras.</p>
            @endif

            {{-- Ventas --}}
            @if (isset($results['ventas']) && $results['ventas']->isNotEmpty())
                <h3>Ventas</h3>
                <ul>
                    @foreach ($results['ventas'] as $venta)
                        <li>{{ $venta->numero_comprobante }} - Total: {{ $venta->total }}</li>
                    @endforeach
                </ul>
            @else
                <p>No se encontraron ventas.</p>
            @endif

            {{-- Usuarios --}}
            @if (isset($results['users']) && $results['users']->isNotEmpty())
                <h3>Usuarios</h3>
                <ul>
                    @foreach ($results['users'] as $user)
                        <li>{{ $user->name }} - Email: {{ $user->email }}</li>
                    @endforeach
                </ul>
            @else
                <p>No se encontraron usuarios.</p>
            @endif

            {{-- Roles --}}
            @if (isset($results['roles']) && $results['roles']->isNotEmpty())
                <h3>Roles</h3>
                <ul>
                    @foreach ($results['roles'] as $role)
                        <li>{{ $role->name }}</li>
                    @endforeach
                </ul>
            @else
                <p>No se encontraron roles.</p>
            @endif

        @else
            <p>No se encontraron resultados.</p>
        @endif
    </div>
@endsection -->
