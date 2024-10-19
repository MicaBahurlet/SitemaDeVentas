@extends ('template')

@section ('title' , 'Ventas')

@push ('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">

<style>

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
        background-color: #4169E1;
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
        border-color: #a9dfbf;
        color: #000;
    }

    /* .table {
        border-collapse: collapse;
        
    }

    .table th,
    .table td {
        border: none;
        
    } */

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
        timer: 3000,
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
    <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Ventas</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('panel')}}">Inicio</a></li>
        <li class="breadcrumb-item active">Ventas</li>
    </ol>

    <div class="mb-4">
        <a href="{{ route('ventas.create') }}">
            <button type="button" class="btn btn-primary" style="background-color: #007BA7; font-weight: bold ;color:white"> Añadir nueva venta</button>
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabla ventas
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped ">
                <thead>
                    <tr>
                        <th>Comprobante</th>
                        <th>Cliente</th>
                        <th>Fecha y hora</th>
                        <th>Usuario</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $item)
                    <tr>
                        <td>
                            <p class="fw-semibold mb-1">{{$item->comprobante->tipo_comprobante}}</p>
                            <p class="text-muted mb-0">{{$item->numero_comprobante}}</p>
                        </td>


                        <td>
                            @if ($item->cliente && $item->cliente->persona)
                            <p class="fw-semibold mb-1">
                                {{ $item->cliente->persona->tipo_persona === 'natural' ? 'Cliente particular' : 'Persona jurídica' }}
                            </p>
                            <p class="text-muted mb-0">{{ $item->cliente->persona->razon_social }}</p>
                            @else
                            <p class="text-danger">Cliente no disponible</p>
                            @endif
                        </td>



                        <td>
                            {{
                                \Carbon\Carbon::parse($item->fecha_hora)->format('d/m/Y') . ' ' .
                                \Carbon\Carbon::parse($item->fecha_hora)->format('H:i')
                            }}
                        </td>

                        <td>
                            {{$item->user->name}}
                        </td>

                        <td>
                            {{$item->total}}
                        </td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <form action="{{ route('ventas.show', ['venta' => $item]) }}" method="GET">
                                    <button type="submit" class="btn btn-pastel-blue">
                                        Ver
                                    </button>
                                </form>
                                <button type="button" class="btn btn-pastel-red" data-bs-toggle="modal" data-bs-target="#confirmModal-{{ $item->id }}" >Eliminar</button>
                            </div>
                        </td>
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
                                    ¿Seguro que quieres eliminar el registro de venta? <br>
                                    Estacción es irreversible
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <Form action="{{ route('ventas.destroy', ['venta' => $item->id]) }}" method="POST">
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