@extends('template')

@section('title','proveedores')
<!-- 
@push('css-datatable')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush -->

@push('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">

<style>
    .custom-badge {
        background-color: #2ecc71;
        border-color: #a9dfbf;
        color: #000;
        border-radius: 0.35rem;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        display: inline-block;
        vertical-align: middle;
    }

    .custom-badge-delete {
        background-color: #e74c3c;
        border-color: #f5b7b1;
        color: #000;
        border-radius: 0.35rem;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        display: inline-block;
        vertical-align: middle;
    }

    .btn-pastel-yellow,
    .btn-pastel-blue,
    .btn-pastel-red,
    .btn-pastel-green {
        border-radius: 0.35rem;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        display: inline-block;
        vertical-align: middle;
    }

    .btn-pastel-yellow {
        background-color: #f1c40f;
        border-color: #f9e79f;
        color: #000;
    }

    .btn-pastel-blue {
        background-color: #6a9bdc;
        border-color: #85c1ae;
        color: #000;
    }

    .btn-pastel-red {
        background-color: #e74c3c;
        border-color: #f5b7b1;
        color: #000;
    }

    .btn-pastel-green {
        background-color: #2ecc71;
        border-color: #a9dfbf;
        color: #000;
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
    <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Proveedores</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Proveedores</li>
    </ol>


    <div class="mb-4">
        <a href="{{route('proveedores.create')}}">
            <button type="button" class="btn btn-primary">Añadir nuevo proveedor</button>
        </a>
    </div>


    <div class="card mb-4"">
        <div class=" card-header">
        <i class="fas fa-table me-1"></i>
        Tabla proveedores
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Documento</th>
                    <th>Tipo de persona</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $item)
                <tr>
                    <td>
                        {{$item->persona->razon_social}}
                    </td>
                    <td>
                        {{$item->persona->direccion}}
                    </td>
                    <td>
                        <p class="fw-semibold mb-1">{{$item->persona->documento->tipo_documento}}</p>
                        <p class="text-muted mb-0">{{$item->persona->numero_documento}}</p>
                    </td>
                    <!-- <td>
                        {{$item->persona->tipo_persona}}
                    </td> -->
                    <td>
                        {{ $item->persona->tipo_persona === 'natural' ? 'Cliente particular' : 'Persona jurídica' }}
                    </td>
                    <td>
                        @if ($item->persona->estado == 1)
                        <span class="custom-badge">activo</span>
                        @else
                        <span class="custom-badge-delete">eliminado</span>
                        @endif
                    </td>
 
                    <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                <form action="{{ route('proveedores.edit', ['proveedore' => $item]) }}" method="GET">
                                    <!-- @csrf -->
                                    <button type="submit" class="btn btn-pastel-yellow">Editar</button>
                                </form>
                                @if( $item->persona->estado == 1)
                                <button type="button" class="btn btn-pastel-red" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$item->id}}">Eliminar</button>
                                @else
                                <button type="button" class="btn btn-pastel-green" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$item->id}}">Restaurar</button>
                                @endif
                            </div>
                        <td>



                </tr>

                <!-- Modal de confirmación-->
                <div class="modal fade" id="confirmModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje de confirmación</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{ $item->persona->estado == 1 ? '¿Seguro que quieres eliminar el proveedor?' : '¿Seguro que quieres restaurar el proveedor?' }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <form action="{{ route('proveedores.destroy',['proveedore'=>$item->persona->id]) }}" method="post">
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