@extends('template')

@section('title', 'Panel')

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .btn-cerulean {
            background-color: #007BA7;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-cerulean:hover {
            background-color: #005F7A;
        }

        .btn-create {
            width: 130px;
            background-color: #007BA7;
            font-weight: bold;
            border-color: grey;
            color: white;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-create:hover {
            background-color: #164B83;
            color: white;
        }
    </style>
@endpush

@section('content')

    @if (session('success'))
        <script>
            let message = "{{ session('success') }}";
            Swal.fire({
                title: message,
                showClass: {
                    popup: `
                animate__animated
                animate__fadeInUp
                animate__faster
            `
                },
                hideClass: {
                    popup: `
                animate__animated
                animate__fadeOutDown
                animate__faster
            `
                },
                customClass: {
                    confirmButton: 'btn-cerulean'
                },
                buttonsStyling: false
            });
        </script>
    @endif

    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Panel Principal</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Panel Principal</li>
        </ol>
        <div class="row">
            <!-- productos card -->
            <div class="col-xl-3 col-md-6">
                <div class="card text-white mb-4" style="background-color: #3D5ccc; font-weight: bold">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <i class="fa-solid fa-cart-shopping fa-lg mr-3"></i><span class="mr-2"> Productos</span>
                            </div>
                            <div class="col-4">
                                <?php
                                use App\Models\Producto;
                                $productos = count(Producto::all());
                                ?>
                                <p class="fs-4 font-weight-bold">{{ $productos }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('productos.index') }}">Ver más</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <!-- Categorias card -->
            <div class="col-xl-3 col-md-6">
                <div class="card text-white mb-4" style="background-color: #17a2b8; font-weight: bold">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <i class="fa-solid fa-tag fa-lg mr-3"></i><span> Categorias</span>
                            </div>
                            <div class="col-4">
                                <?php
                                use App\Models\Categoria;
                                $categorias = count(Categoria::all());
                                ?>
                                <p class="fs-4 font-weight-bold">{{ $categorias }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('categorias.index') }}">Ver más</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <!-- clientes card -->
            <div class="col-xl-3 col-md-6">
                <div class="card text-white mb-4" style="background-color: #20c997; font-weight: bold">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <i class="fa-solid fa-people-group fa-lg mr-3"></i><span class="mr-2"> Clientes</span>
                            </div>
                            <div class="col-4">
                                <?php
                                use App\Models\Cliente;
                                $clientes = count(Cliente::all());
                                ?>
                                <p class="fs-4 font-weight-bold">{{ $clientes }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('clientes.index') }}">Ver más</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <!-- Ventas card -->
            <div class="col-xl-3 col-md-6">
                <div class="card text-white mb-4" style="background-color: #9B4FC3; font-weight: bold">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <i class="fa-solid fa-money-bill-trend-up fa-lg mr-3"></i><span class="mr-2">
                                    Ventas</span>
                            </div>
                            <div class="col-4">
                                <?php
                                use App\Models\Venta;
                                $ventas = count(Venta::all());
                                ?>
                                <p class="fs-4 font-weight-bold">{{ $ventas }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('ventas.index') }}">Ver más</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><i class="bi bi-info-circle-fill"></i> Primeros pasos</h5>
                        <p class="card-text">Despejá tus dudas aquí, accede al instructivo de <strong>STOCKMASTER</strong>
                        </p>
                        <a href="{{ route('instrucciones') }}" class="btn btn-create">Instructivo</a>
                    </div>
                </div>
            </div>
        </div>



        @php
            // Obtener los productos y verificar el stock
            $productosSinStock = Producto::where('stock', 0)->get();
        @endphp

        @if ($productosSinStock->isNotEmpty())
            <div class="alert alert-warning alert-dismissible mt-4 fade show" role="alert">
                <strong>Alerta de Stock!</strong> Los siguientes <b>productos</b> se han quedado <b>sin stock:</b> <br><br>
                <ul>
                    @foreach ($productosSinStock as $producto)
                        <li>{{ $producto->nombre }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif



    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/datatables-simple-demo.js') }}"></script>
@endpush
