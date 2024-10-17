@extends ('template')

@section ('title', 'Ver compra')

@push ('css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@endpush

@section ('content')

<div class="container-fluid px-4">
    <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Ver compra</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('compras.index') }}">Compras</a></li>
        <li class="breadcrumb-item active">Ver compra</li>
    </ol>
</div>

<div class="container w-100 border border-3 rounded p-4 mt-3">
    <div class="row g-3">
        <!-- Tipo de comprobante -->
        <div class="col-12 d-flex align-items-center mb-2">
            <span class="input-group-text w-25"><i class="fa-solid fa-file me-2"></i> Tipo de comprobante:</span>
            <input disabled type="text" class="form-control ms-2" value="{{ $compra->comprobante->tipo_comprobante }}">
        </div>

        <!-- Número de comprobante -->
        <div class="col-12 d-flex align-items-center mb-2">
            <span class="input-group-text w-25"><i class="fa-solid fa-hashtag me-2"></i> Número de comprobante:</span>
            <input disabled type="text" class="form-control ms-2" value="{{ $compra->numero_comprobante }}">
        </div>

        <!-- Proveedor -->
        <div class="col-12 d-flex align-items-center mb-2">
            <span class="input-group-text w-25"><i class="fa-solid fa-user-tie me-2"></i> Proveedor:</span>
            <input disabled type="text" class="form-control ms-2" value="{{ $compra->proveedore->persona->razon_social }}">
        </div>

        <!-- Fecha -->
        <div class="col-12 d-flex align-items-center mb-2">
            <span class="input-group-text w-25"><i class="fa-solid fa-calendar-days me-2"></i> Fecha:</span>
            <input disabled type="text" class="form-control ms-2"
                value="{{ \Carbon\Carbon::parse($compra->fecha_hora)->format('d-m-Y') }}">
        </div>

        <!-- Hora -->
        <div class="col-12 d-flex align-items-center mb-2">
            <span class="input-group-text w-25"><i class="fa-solid fa-clock me-2"></i> Hora:</span>
            <input disabled type="text" class="form-control ms-2"
                value="{{ \Carbon\Carbon::parse($compra->fecha_hora)->format('H:i') }}">
        </div>

        <!-- Impuesto -->
        <div class="col-12 d-flex align-items-center mb-2">
            <span class="input-group-text w-25"><i class="fa-solid fa-percent me-2"></i> Impuesto:</span>
            <input id="input-impuesto" disabled type="text" class="form-control ms-2" value="{{ $compra->impuesto }}">
        </div>

        <!-- Tabla -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tabla de detalle de la compra
            </div>

            <div class="card-body table-responsive ">
                <table class="table table-striped w-100">
                    <thead class="table-dark text-wite ">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($compra->productos as $item)

                        <tr>
                            <td>{{$item->nombre }}</td>
                            <td>{{$item->pivot->cantidad }}</td>
                            <td>{{$item->pivot->precio_compra }}</td>
                            <td>{{$item->pivot->precio_venta }}</td>
                            <td class="td-subtotal">{{($item->pivot->cantidad) *  ($item->pivot->precio_compra)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5"></th>
                        </tr>

                        <tr>
                            <th colspan="4">Subtotal:</th>
                            <th id="th-subTotal"></th>
                        </tr>

                        <tr>
                            <th colspan="4">Iva:</th>
                            <th id="th-iva"></th>
                        </tr>

                        <tr>
                            <th colspan="4">Total:</th>
                            <th id="th-total"></th>
                        </tr>
                    </tfoot>

                </table>

            </div>

        </div>
    </div>
</div>

@endsection

@push ('js')

<script>
    //variables 
    let filasSubtotal = document.getElementsByClassName("td-subtotal");
    let cont = 0;
    let impuesto = $('#input-impuesto').val();

    $(document).ready(function() {
        calcularValores();
    });

    function calcularValores() {
        for (let i = 0; i < filasSubtotal.length; i++) {
            cont += parseFloat(filasSubtotal[i].innerHTML);
        }

        $('#th-subTotal').html(cont);
        $('#th-iva').html(impuesto);
        $('#th-total').html(cont + parseFloat(impuesto));
    }
</script>

@endpush