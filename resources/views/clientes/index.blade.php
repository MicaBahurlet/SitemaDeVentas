@extends ('template')

@section ('title', 'clientes')

@push('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">

<!-- <style>
    .custom-badge {
        /* background-color: #2ecc71; */
        font-weight: 700;
        color:green;
        border-radius: 0.35rem;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        display: inline-block;
        vertical-align: middle;
    }

    .custom-badge-delete {
        /* background-color: #e74c3c; */
        color: red;
        font-weight: 700;
        border-radius: 0.35rem;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        display: inline-block;
        vertical-align: middle;
    }

    .btn-pastel-yellow,
    .btn-pastel-blue,
    .btn-pastel-red,
    .btn-pastel-green,
    .btn-pastel-violet {
        border-radius: 0.35rem;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        display: inline-block;
        vertical-align: middle;
    }

    .btn-pastel-violet {
        background-color: #6C63FF;
        color: white;
    }

    .btn-pastel-blue {
        background-color: #6a9bdc;
        color: #000;
    }

    .btn-pastel-red {
        background-color: #D93737;
        color: white;
    }

    .btn-pastel-green {
        background-color: #2ecc71;
        color: white;
    }

    table .btn:hover,
    table .btn:focus {
        background-color: inherit !important;
        color: inherit !important;
        box-shadow: none !important;
        border-color: inherit !important;
    }
</style> -->

<style>
    table .btn {
        background-color: #ccc;
        /* Color gris por defecto */
        color: #333;
        /* Color de texto gris oscuro */
        border-color: #bbb;
        /* Borde gris */
        font-weight: bold;
        transition: background-color 0.3s, color 0.3s, border-color 0.3s;
    }



    .custom-badge {
        /* background-color: #28C76F; */
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
        /* background-color: #EA5455; */
        color: red;
        border-radius: 0.35rem;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        display: inline-block;
        vertical-align: middle;
        font-weight: 700;
    }

    /* Colores en hover, usando tus clases existentes */
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

@if ( session('success') )
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
    <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Clientes</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"> <a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Clientes</li>
    </ol>

    <div class="mb-4">
        <a href="{{ route('clientes.create') }}">
            <button type="button" class="btn btn-primary" style="background-color: #007BA7; font-weight: bold ;color:white;border-color:grey"> Añadir nuevo Cliente</button>
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header" style="background-color: #007BA7; font-weight: bold ;color:white; padding: 10px">
            <i class="fas fa-table me-1"></i>
            Tabla Clientes
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Documento</th>
                        <th>Tipo de cliente</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($clientes as $item)

                    <tr>
                        <td>
                            {{ $item->persona->razon_social}}
                        </td>

                        <td>
                            {{ $item->persona->direccion}}
                        </td>

                        <td>
                            <p class="fw-normal mb-1">{{ $item->persona->documento->tipo_documento}}</p>
                            <p class="text-muted mb-0">{{ $item->persona->numero_documento}}</p>
                        </td>

                        <!-- <td>
                            {{ $item->persona->tipo_persona}}
                        </td> -->
                        <td>
                            {{ $item->persona->tipo_persona === 'natural' ? 'Cliente particular' : 'Persona jurídica' }}
                        </td>

                        <td>
                            @if ($item->persona->estado == 1)
                            <span class="custom-badge">Activo</span>
                            @else
                            <span class="custom-badge-delete">Eliminado</span>
                            @endif
                        </td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                <form action="{{ route('clientes.edit', ['cliente' => $item]) }}" method="GET">
                                    <!-- @csrf -->
                                    <button type="submit" class="btn btn-pastel-violet">Editar</button>
                                </form>
                                @can ('eliminar-cliente')
                                @if( $item->persona->estado == 1)
                                <button type="button" class="btn btn-pastel-red" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$item->id}}">Eliminar</button>
                                @else
                                <button type="button" class="btn btn-pastel-green" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$item->id}}">Restaurar</button>
                                @endif
                                @endcan
                            </div>
                        <td>
                    </tr>

                    <!-- Modal de confirmacion -->
                    <div class="modal fade" id="confirmModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">¡Atención!</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ $item->persona->estado == 1 ? '¿Deseas eliminar el cliente?' : '¿Deseas restaurar el cliente?'}}

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <Form action="{{ route('clientes.destroy', ['cliente' => $item->persona->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Confirmar</button>
                                    </Form>
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

@push ('js')
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
<script src="{{asset('js/datatables-simple-demo.js')}}"></script>
@endpush