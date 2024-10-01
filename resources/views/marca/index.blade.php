@extends('template')

@section('title','marcas')


@push('css')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
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
    <h1 class="mt-4 text-center">Marcas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Marcas</li>
    </ol>

    <div class="mb-4">
        <a href="{{ route('marcas.create') }}">
            <button type="button" class="btn btn-primary"> Añadir nueva marca</button>
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabla Marcas
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped ">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marcas as $item)
                    <tr>
                        <td>
                            {{$item->caracteristica->nombre}}
                        </td>
                        <td>
                            {{$item->caracteristica->descripcion}}
                        </td>
                        <td>
                            @if ($item->caracteristica->estado == 1)
                            <span class="fw-bolder rounded bg-success text-white px-2 py-2">Activa</span>
                            @else
                            <span class="fw-bolder rounded bg-danger text-white px-2 py-2">Eliminada</span>
                            @endif
                        </td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                <form action="{{ route('categorias.edit', $item->id) }}" method="GET">
                                    <!-- @csrf -->
                                    <button type="submit" class="btn btn-warning">Editar</button>
                                </form>
                                @if( $item->caracteristica->estado == 1)
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal-{{ $item->id }}">Eliminar</button>
                                @else
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmModal-{{ $item->id }}">Restaurar</button>
                                @endif




                            </div>
        </div>
        </td>
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="confirmModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Mensaje de confirmación</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ $item->caracteristica->estado == 1 ? '¿Seguro que quieres eliminar la marca?' : '¿Seguro que quieres restaurar la marca?' }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <form action="{{ route('marcas.destroy',['marca'=>$item->id]) }}" method="post">
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
<script src="{{asset('js/datatables-simple-demo.js')}}"></script>
@endpush