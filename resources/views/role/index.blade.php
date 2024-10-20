@extends ('template')

@section ('title', 'Roles')

@push ('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">

<style>
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
        border-color: #f9e79f;
        color: white;
    }

    .btn-pastel-blue {
        background-color: #6a9bdc; 
        color: #000;
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

@section ('content')
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
    <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Roles</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"> <a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item active">Roles</li>
    </ol>

    <div class="mb-4">
        <a href="{{ route('roles.create') }}">
            <button type="button" class="btn btn-primary" style="background-color: #007BA7; font-weight: bold ;color:white"> Añadir nuevo rol</button>
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabla roles
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped">
                <thead>
                    <tr>
                        <th>Rol</th>
                        <th>Acciones permitidas</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $item)

                    <tr>
                        <td>
                            {{ $item->name}}
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                <form action="{{ route('roles.edit', ['role'=>$item]) }}" method="GET">
                                    <button type="submit" class="btn btn-pastel-violet">Editar</button>
                                </form>

                                <button type="button" class="btn btn-pastel-red" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$item->id}}">Eliminar</button>

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
                                    ¿Seguro que quieres eliminar el rol {{ $item->name }}?

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <Form action="{{ route('roles.destroy', ['role' => $item->id]) }}" method="POST">
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

@push('js')

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
<script src="{{asset('js/datatables-simple-demo.js')}}"></script>

@endpush
