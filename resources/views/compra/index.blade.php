@extends('template')

@section('title','compras')

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
    <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Compras</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('panel')}}">Inicio</a></li>
        <li class="breadcrumb-item active">Compras</li>
    </ol>

    <div class="mb-4">
        <a href="{{ route('compras.create') }}">
            <button type="button" class="btn btn-primary"> Añadir nueva compra</button>
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabla compras
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped ">
                <thead>
                    <tr>
                        <th>Comprobante</th>
                        <th>Proveedor</th>
                        <th>Fecha y hora</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $item)
                    <tr>
                        <td>
                            <p class="fw-semibold mb-1">{{$item->comprobante->tipo_comprobante}}</p>
                            <p class="text-muted mb-0">{{$item->numero_comprobante}}</p>
                        </td>


                        <td>
                            @if ($item->proveedore && $item->proveedore->persona)
                            <p class="fw-semibold mb-1">{{ucfirst ($item->proveedore->persona->tipo_persona) }}</p>
                            <p class="text-muted mb-0">{{ $item->proveedore->persona->razon_social }}</p>
                            @else
                            <p class="text-danger">Proveedor o persona no disponible</p>
                            @endif
                        </td>


                        <td>
                            {{
                                \Carbon\Carbon::parse($item->fecha_hora)->format('d/m/Y') . ' ' .
                                \Carbon\Carbon::parse($item->fecha_hora)->format('H:i')
                            }}
                        </td>

                        <td>
                            {{$item->total}}
                        </td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-success">Ver</button>
                                <button type="button" class="btn btn-danger">Eliminar</button>
                            </div>
                        </td>
                    </tr>
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