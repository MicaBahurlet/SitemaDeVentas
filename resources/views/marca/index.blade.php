@extends('template')

@section('title', 'marcas')

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
        <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Marcas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('panel') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Marcas</li>
        </ol>
        @can('crear-marca')
            <div class="mb-4">
                <a href="{{ route('marcas.create') }}">
                    <button type="button" class="btn btn-primary"
                        style="background-color: #007BA7; font-weight: bold ;color:white;border-color:grey"> Añadir nueva
                        marca</button>
                </a>

                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample"
                    style="background-color: #007BA7; font-weight: bold ;color:white;border-color:grey">
                    <i class="bi bi-info-circle-fill"></i>
                </button>

                <div class="collapse" id="collapseExample">
                    <div class="card card-body mt-2">
                       Establecer marcas te ayudará a organizar tus productos, cuanto más específico seas, mayor organización en tu stock. <br> Desde las acciones podrás luego editarlas o eliminar las que no necesites.
                    </div>
                </div>

            </div>
        @endcan

        <div class="card mb-4">
            <div class="card-header" style="background-color: #007BA7; font-weight: bold ;color:white; padding: 10px">
                <i class="fas fa-table me-1"></i>
                Tabla Marcas
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Nombre de la marca</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($marcas as $item)
                            <tr>
                                <td>{{ $item->caracteristica->nombre }}</td>
                                <td>{{ $item->caracteristica->descripcion }}</td>
                                <td>
                                    @if ($item->caracteristica->estado == 1)
                                        <span class="custom-badge">Activa</span>
                                    @else
                                        <span class="custom-badge-delete">Eliminada</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                        @can('editar-marca')
                                            <form action="{{ route('marcas.edit', $item->id) }}" method="GET">
                                                <button type="submit" class="btn btn-pastel-violet">Editar</button>
                                            </form>
                                        @endcan

                                        @can('eliminar-marca')
                                            @if ($item->caracteristica->estado == 1)
                                                <button type="button" class="btn btn-pastel-red" data-bs-toggle="modal"
                                                    data-bs-target="#confirmModal-{{ $item->id }}">Eliminar</button>
                                            @else
                                                <button type="button" class="btn btn-pastel-green" data-bs-toggle="modal"
                                                    data-bs-target="#confirmModal-{{ $item->id }}">Restaurar</button>
                                            @endif
                                        @endcan
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="confirmModal-{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje de confirmación</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $item->caracteristica->estado == 1 ? '¿Seguro que quieres eliminar la marca?' : '¿Seguro que quieres restaurar la marca?' }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <form action="{{ route('marcas.destroy', ['marca' => $item->id]) }}"
                                                method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Confirmar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
@endpush
