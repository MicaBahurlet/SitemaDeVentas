@extends ('template')

@section ('title', 'categorías')

@push('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">

<style>
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
        border-color: #85c1ae;
        color: white;
    }

    .btn-pastel-red {
        background-color: #D93737;
        border-color: #f5b7b1;
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
    <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Categorías</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"> <a href="{{ route('panel')}}">Inicio</a></li>
        <li class="breadcrumb-item active">Categorías</li>
    </ol>

    <div class="mb-4">
        <a href="{{ route('categorias.create') }}">
            <button type="button" class="btn btn-primary" style="background-color: #007BA7; font-weight: bold ;color:white"> Añadir nueva categoría</button>
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabla Categorias
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre de la categoria</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                    <tr>
                        <td>
                            {{ $categoria->caracteristica->nombre }}
                        </td>
                        <td>
                            {{ $categoria->caracteristica->descripcion }}
                        </td>
                        <td>
                            @if ($categoria->caracteristica ->estado == 1)
                            <span class="custom-badge">Activa</span>
                            @else
                            <span class="custom-badge-delete">Eliminada</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                <form action="{{ route('categorias.edit', $categoria->id) }}" method="GET">
                                    <!-- @csrf -->
                                    <button type="submit" class="btn btn-pastel-violet">Editar</button>

                                </form>
                                @if( $categoria->caracteristica->estado == 1)
                                <button type="button" class="btn btn-pastel-red" data-bs-toggle="modal" data-bs-target="#confirmModal-{{ $categoria->id }}">Eliminar</button>
                                @else
                                <button type="button" class="btn btn-pastel-green" data-bs-toggle="modal" data-bs-target="#confirmModal-{{ $categoria->id }}">Restaurar</button>
                                @endif
                            </div>
                        <td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="confirmModal-{{ $categoria->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">¡Atención!</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ $categoria->caracteristica->estado === 1 ? '¿Deseas eliminar la categoria ' . $categoria->caracteristica->nombre . '?' : '¿Deseas restaurar la categoria ' . $categoria->caracteristica->nombre . '?' }}

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <Form action="{{ route('categorias.destroy', ['categoria' => $categoria->id]) }}" method="POST">
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