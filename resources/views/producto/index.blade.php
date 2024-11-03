@extends ('template')

@section('title', 'Listado de productos')

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        table .btn {
            background-color: #ccc;
            color: #333;
            border-color: #bbb;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }



        .custom-badge {
            font-weight: 700;
            color: green;
            border-color: #a9dfbf;
            border-radius: 0.35rem;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            display: inline-block;
            vertical-align: middle;

        }

        .custom-badge-delete {
            color: red;
            border-radius: 0.35rem;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            display: inline-block;
            vertical-align: middle;
            font-weight: 700;
        }

        table .btn-pastel-violet:hover {
            background-color: #6C63FF !important;
            color: white !important;
            border-color: #6C63FF !important;
        }

        table .btn-pastel-blue:hover {
            background-color: #6a9bdc !important;
            color: white !important;
            border-color: #6a9bdc !important;
        }

        table .btn-pastel-red:hover {
            background-color: #D93737 !important;
            color: white !important;
            border-color: #D93737 !important;
        }

        table .btn-pastel-green:hover {
            background-color: #2ecc71 !important;
            color: white !important;
            border-color: #2ecc71 !important;
        }
    </style>
@endpush

@section('content')

    @if (session('success'))
        <script>
            let message = "{{ session('success') }}";
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: message
            });
        </script>
    @endif

    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Productos</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"> <a href="{{ route('panel') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Productos</li>
        </ol>

        @can('crear-producto')
            <div class="mb-4">
                <a href="{{ route('productos.create') }}">
                    <button type="button" class="btn btn-primary"
                        style="background-color: #007BA7; font-weight: bold ;color:white;border-color:grey"> Añadir nuevo
                        producto</button>
                </a>
                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample"
                    style="background-color: #007BA7; font-weight: bold ;color:white;border-color:grey">
                    <i class="bi bi-info-circle-fill"></i>
                </button>

                <div class="collapse" id="collapseExample">
                    <div class="card card-body mt-2">
                        Trakea todos los productos de tu inventario, cuanta más información detalles mayor control tendrás sobre
                        tu stock. <br>
                        En las acciones podrás editar los productos, eliminarlos y desde la opción "ver" pordrás acceder a la
                        información detallada de cada producto.
                    </div>
                </div>
            </div>
        @endcan

        <div class="card mb-4">
            <div class="card-header" style="background-color: #007BA7; font-weight: bold ;color:white; padding: 10px">
                <i class="fas fa-table me-1"></i>
                Tabla productos
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Categoria</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td>{{ $producto->codigo }}</td>
                                <td>{{ $producto->nombre }}</td>
                                <!-- <td>{{ $producto->descripcion }}</td> -->
                                <td>{{ $producto->marca->caracteristica->nombre }}</td>
                                <td>
                                    @foreach ($producto->categorias as $category)
                                        <div class="containder">
                                            <div class="row ">
                                                <span
                                                    class=" custom-btn mx-1">{{ $category->caracteristica->nombre }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                                <td>
                                    @if ($producto->estado == 1)
                                        <span class="custom-badge">Activo</span>
                                    @else
                                        <span class="custom-badge-delete">Eliminado</span>
                                    @endif
                                </td>

                                <td>
                                    <!-- <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <form action="{{ route('productos.edit', $producto->id) }}" method="GET">
                                                    <button type="submit" class="btn btn-warning">Editar</button>
                                                </form>

                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verModal-{{ $producto->id }}" >Ver</button>

                                                @if ($producto->estado == 1)
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal-{{ $producto->id }}">Eliminar</button>
@else
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmModal-{{ $producto->id }}">Restaurar</button>
    @endif
                                            </div> -->

                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                        @can('editar-producto')
                                            <form action="{{ route('productos.edit', $producto->id) }}" method="GET">
                                                <button type="submit" class="btn btn-pastel-violet">Editar</button>
                                            </form>
                                        @endcan

                                        @can('ver-producto')
                                            <button type="button" class="btn btn-pastel-blue" data-bs-toggle="modal"
                                                data-bs-target="#verModal-{{ $producto->id }}">Ver</button>
                                        @endcan

                                        @can('eliminar-producto')
                                            @if ($producto->estado == 1)
                                                <button type="button" class="btn btn-pastel-red" data-bs-toggle="modal"
                                                    data-bs-target="#confirmModal-{{ $producto->id }}">Eliminar</button>
                                            @else
                                                <button type="button" class="btn btn-pastel-green" data-bs-toggle="modal"
                                                    data-bs-target="#confirmModal-{{ $producto->id }}">Restaurar</button>
                                            @endif
                                        @endcan
                                    </div>

                                </td>

                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="verModal-{{ $producto->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles del producto</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <label for=""><span class="fw-bolder">Descripción:</span>
                                                    {{ $producto->descripcion }}</label>
                                            </div>
                                            <div class="row mb-3">
                                                <label for=""><span class="fw-bolder">Fecha de vencimiento:</span>
                                                    {{ $producto->fecha_vencimiento == '' ? 'No registra fecha' : $producto->fecha_vencimiento }}
                                                </label>
                                            </div>
                                            <div class="row mb-3">
                                                <label for=""><span class="fw-bolder">Stock:</span>
                                                    {{ $producto->stock }}</label>

                                            </div>
                                            <div class="row mb-3">
                                                <label class="fw-bolder"><span class="fw-bolder">Imagen:</span></label>
                                                <!-- <img src="{{ asset($producto->img_path) }}" width="300px" height="300px" alt="Imagen del producto"> -->
                                                @if ($producto->img_path != null)
                                                    <img src="{{ asset('img/productos/' . $producto->img_path) }}"
                                                        alt="Imagen del producto"
                                                        class="img-fluid img-thumbnail border border-2 rounded mt-3">
                                                @else
                                                    <span> No hay imagen del producto</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal de confirmacion -->
                            <div class="modal fade" id="confirmModal-{{ $producto->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">¡Atención!</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $producto->estado == 1 ? '¿Deseas eliminar el producto?' : '¿Deseas restaurar el producto?' }}

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <Form action="{{ route('productos.destroy', ['producto' => $producto->id]) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Confirmar</button>
                                            </Form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </table>
            </div>
        </div>
    </div>


@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
@endpush
