@extends ('template')

@section ('title' , 'Crear venta')

@push ('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

<div class="container-fluid px-4 ms-lg-5">
    <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Cargar una venta</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"> <a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item "><a href="{{ route('ventas.index') }}">Ventas</a></li>
        <li class="breadcrumb-item active">Cargar una Venta</li>
    </ol>
</div>

<form action="{{ route('ventas.store')}}" method="POST">
    @csrf

    <div class="container mt-4">
        <div class="row gy-4">

            <!-- venta producto -->
            <div class="col-md-8">
                <div class="text-white p-3 mt-2" style="font-size: large; font-weight: bold; background-color: #212529">
                    Cargar una la venta
                </div>

                <div class="p-3 border border-3 border-black ">
                    <div class="row">

                        <!-- producto -->
                        <div class="col-md-12 mb-2">
                            <select name="producto_id" id="producto_id" class="form-control selectpicker show-tick border border-3 border-black" data-live-search="true" title="Busque el producto vendido..." data-size="5">
                                @foreach ($productos as $item)
                                <option value="{{$item->id}}-{{$item->stock}}-{{$item->precio_venta}}">{{$item->codigo.' '.$item->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- stock -->
                        <div class="col-md-12 mb-2">
                            <label for="stock" class="form-label">En stock:</label>
                            <input disabled readonly type="text" name="stock" id="stock" class="form-control" value="{{old('stock')}}">

                        </div>

                        <!-- cantidad -->
                        <div class="col-md-4 mb-2">
                            <label for="cantidad" class="form-label">Cantidad comprada:</label>
                            <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{old('cantidad')}}">
                        </div>

                        <!-- precio de venta -->
                        <div class="col-md-4 mb-2">
                            <label for="precio_venta" class="form-label">Precio de venta:</label>
                            <input disabled type="number" name="precio_venta" id="precio_venta" class="form-control" step="0.1" value="{{old('precio_venta')}}">
                        </div>

                        <!-- descuento -->
                        <div class="col-md-4 mb-2">
                            <label for="descuento" class="form-label">Descuento:</label>
                            <input type="number" name="descuento" id="descuento" class="form-control" value="{{old('descuento')}}">
                        </div>

                        <!-- Boton para agregar -->
                        <div class="col-md-4 mb-2">
                            <button id="btn_agregar" type="button" class="btn btn-primary mt-2 mb-2" style="background-color: #007BA7; font-weight: bold ;color:white">Agregar</button>
                        </div>

                        <!-- tabla para detalle de venta-->
                        <div class="col-md-12 ">
                            <div class="table-responsive">
                                <table id="tabla_detalle" class="table table-hover">
                                    <thead class="p-3" style="background-color: #343A41">
                                        <tr>
                                            <th style="color: white; font-weight: bold;">#</th>
                                            <th style="color: white; font-weight: bold;">Producto</th>
                                            <th style="color: white; font-weight: bold;">Cantidad</th>
                                            <th style="color: white; font-weight: bold;">Precio venta</th>
                                            <th  style="color: white; font-weight: bold;">Descuento</th>
                                            <th style="color: white; font-weight: bold;">Subtotal</th>
                                            <th style="color: white; font-weight: bold;"></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <th> </th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th colspan="4">Subtotal </th>
                                            <th colspan="2"><span id="sumas">0</span></th>
                                        </tr>

                                        <tr>
                                            <th></th>
                                            <th colspan="4">IVA % </th>
                                            <th colspan="2"><span id="iva">0</span></th>
                                        </tr>

                                        <tr>
                                            <th></th>
                                            <th colspan="4">Total </th>
                                            <th colspan="2"> <input type="hidden" name="total" value="0" id="inputTotal"><span id="total">0</span></th>
                                        </tr>
                                    </tfoot>

                                </table>

                            </div>
                        </div>

                        <!-- //boton para cancelar venta -->
                        <div class="col-md-12 mb-2">
                            <button id="cancelar" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            style="font-weight: bold ;color:white">
                                Cancelar venta
                            </button>
                        </div>

                    </div>

                </div>
            </div>

            <!-- venta -->
            <div class="col-md-4">
                <div class="text-white p-3 mt-2" style="font-size: large; font-weight: bold; background-color: #212529">
                    Datos del comprador/a
                </div>

                <div class="p-3 border border-3 border-black">
                    <div class="row">
                        <!-- cliente -->
                        <div class="col-md-12 mb-2">
                            <label for="cliente_id" class="form-label">Cliente:</label>
                            <select name="cliente_id" id="cliente_id" class="form-control selectpicker show-tick border border-3 border-black" data-live-search="true" title="Seleccione un proveedor..." data-size="3">
                                @foreach ($clientes as $item)
                                <option value="{{ $item->id }}">{{ $item->persona->razon_social }}</option>
                                @endforeach
                            </select>
                            @error('cliente_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Tipo de comprobante -->
                        <div class="col-md-12 mb-2">
                            <label for="comprobante_id" class="form-label">Tipo de Comprobante:</label>
                            <select name="comprobante_id" id="comprobante_id" class="form-control selectpicker show-tick border border-3 border-black" title="Seleccione tipo de comprobante...">
                                @foreach ($comprobantes as $item)
                                <option value="{{ $item->id }}">{{ $item->tipo_comprobante }}</option>
                                @endforeach
                            </select>
                            @error('comprobante_id')
                            <small class="text-danger">{{'*'.$message }}</small>
                            @enderror
                        </div>

                        <!-- Numero de comprobante -->
                        <div class="col-md-12 mb-2">
                            <label for="numero_comprobante" class="form-label">Número de Comprobante:</label>
                            <input type="text" name="numero_comprobante" id="numero_comprobante" class="form-control" value="{{old('numero_comprobante')}}">
                            @error('numero_comprobante')
                            <small class="text-danger">{{'*'.$message }}</small>
                            @enderror
                        </div>

                        <!-- Impuesto -->
                        <div class="col-md-6 mb-2">
                            <label for="impuesto" class="form-label">Impuesto (IVA):</label>
                            <input readonly type="text" name="impuesto" id="impuesto" class="form-control" value="{{old('impuesto')}}">
                            @error('impuesto')
                            <small class="text-danger">{{'*'.$message }}</small>
                            @enderror
                        </div>

                        <!-- Fecha -->
                        <div class="col-md-6 mb-2">
                            <label for="fecha" class="form-label">Fecha:</label>
                            <input readonly type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha', date('Y-m-d')) }}">
                            <?php

                            use Carbon\Carbon;

                            $fecha_hora = Carbon::now('America/Argentina/Buenos_Aires')->toDateTimeString();
                            ?>
                            <input type="hidden" name="fecha_hora" id="fecha_hora" value="{{ $fecha_hora }}">
                        </div>

                        <!-- user -->
                        <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">


                        <div class="col-md-12 mb-2">
                            <button type="submit" id="guardar" class="btn btn-primary mt-2 mb-2" style="background-color: #007BA7; font-weight: bold ;color:white">Guardar</button>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Modal para cancelar la venta -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Atención!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Seguro que quieres cancelar la venta?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button id="btnCancelarVenta" type="button" class="btn btn-danger" data-bs-dismiss="modal">Confirmar</button>
                </div>
            </div>
        </div>
    </div>



</form>

@endsection

@push ('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

<script>
    $(document).ready(function() {

        $('#producto_id').change(mostrarValores);


        $('#btn_agregar').click(function() {
            agregarProducto();
        });

        $('#btnCancelarVenta').click(function() {
            cancelarVenta();
        });

        disableButtons();

        $('#impuesto').val(impuesto + '%');
    });

    // variables

    let cont = 0;
    let subtotal = [];
    let sumas = 0;
    let iva = 0;
    let total = 0;

    // constantes
    const impuesto = 21;


    function mostrarValores() {
        let dataProducto = document.getElementById('producto_id').value.split('-');
        $('#stock').val(dataProducto[1]);
        $('#precio_venta').val(dataProducto[2]);


    }

    function agregarProducto() {
        let dataProducto = document.getElementById('producto_id').value.split('-');
        //Obtener valores de los campos
        let idProducto = dataProducto[0];
        let nameProducto = $('#producto_id option:selected').text();
        let cantidad = $('#cantidad').val();
        let precioVenta = $('#precio_venta').val();
        let descuento = $('#descuento').val();
        let stock = $('#stock').val();

        if (descuento == '') {
            descuento = 0;
        }

        //Validaciones 
        //1.Para que los campos no esten vacíos
        if (idProducto != '' && cantidad != '') {

            //2. Para que los valores ingresados sean los correctos
            if (parseInt(cantidad) > 0 && (cantidad % 1 == 0) && parseFloat(descuento) >= 0) {

                //3. Para que la cantidad no supere el stock
                if (parseInt(cantidad) <= parseInt(stock)) {
                    //Calcular valores
                    subtotal[cont] = round(cantidad * precioVenta - descuento);
                    sumas += subtotal[cont];
                    iva = round(sumas / 100 * impuesto);
                    total = round(sumas + iva);

                    //Crear la fila
                    let fila = '<tr id="fila' + cont + '">' +
                        '<th>' + (cont + 1) + '</th>' +
                        '<td><input type="hidden" name="arrayidproducto[]" value="' + idProducto + '">' + nameProducto + '</td>' +
                        '<td><input type="hidden" name="arraycantidad[]" value="' + cantidad + '">' + cantidad + '</td>' +
                        '<td><input type="hidden" name="arrayprecioventa[]" value="' + precioVenta + '">' + precioVenta + '</td>' +
                        '<td><input type="hidden" name="arraydescuento[]" value="' + descuento + '">' + descuento + '</td>' +
                        '<td>' + subtotal[cont] + '</td>' +
                        '<td><button class="btn btn-danger" type="button" onClick="eliminarProducto(' + cont + ')"><i class="fa-solid fa-trash"></i></button></td>' +
                        '</tr>';

                    //Acciones después de añadir la fila
                    $('#tabla_detalle').append(fila);
                    limpiarCampos();
                    cont++;
                    disableButtons();

                    //Mostrar los campos calculados
                    $('#sumas').html(sumas);
                    $('#iva').html(iva);
                    $('#total').html(total);
                    $('#impuesto').val(iva);
                    $('#inputTotal').val(total);
                } else {
                    showModal('La cantidad supera el stock existente');
                }

            } else {
                showModal('Valores incorrectos');
            }

        } else {
            showModal('Le faltan campos por llenar');
        }

    }

    function eliminarProducto(indice) {
        //calcular valores
        sumas -= round(subtotal[indice]);
        iva = round(sumas / 100 * impuesto);
        total = round(sumas + iva);

        //mostrar los calculos 
        $('#sumas').html(sumas);
        $('#iva').html(iva);
        $('#total').html(total);
        $('#impuesto').val(iva);
        $('#inputTotal').val(total);

        //Eliminar fila
        $('#fila' + indice).remove();

        disableButtons();

    }

    function cancelarVenta() {
        //Elimar el tbody de la tabla
        $('#tabla_detalle > tbody').empty();

        //Añadir una nueva fila a la tabla
        let fila = '<tr>' +
            '<th></th>' +
            '<td></td>' +
            '<td></td>' +
            '<td></td>' +
            '<td></td>' +
            '<td></td>' +
            '<td></td>' +
            '</tr>';
        $('#tabla_detalle').append(fila);

        //Reiniciar valores de las variables
        cont = 0;
        subtotal = [];
        sumas = 0;
        iva = 0;
        total = 0;

        //Mostrar los campos calculados
        $('#sumas').html(sumas);
        $('#iva').html(iva);
        $('#total').html(total);
        $('#impuesto').val(impuesto + '%');
        $('#inputTotal').val(total);

        limpiarCampos();
        disableButtons();
    }

    function disableButtons() {
        if (total == 0) {
            $('#guardar').hide();
            $('#cancelar').hide();
        } else {
            $('#guardar').show();
            $('#cancelar').show();
        }
    }

    function limpiarCampos() {
        let select = $('#producto_id');
        select.selectpicker('val', '');
        $('#cantidad').val('');
        $('#precio_venta').val('');
        $('#descuento').val('');
        $('#stock').val('');
    }

    function round(num, decimales = 2) {
        var signo = (num >= 0 ? 1 : -1);
        num = num * signo;
        if (decimales === 0) //con 0 decimales
            return signo * Math.round(num);
        // round(x * 10 ^ decimales)
        num = num.toString().split('e');
        num = Math.round(+(num[0] + 'e' + (num[1] ? (+num[1] + decimales) : decimales)));
        // x * 10 ^ (-decimales)
        num = num.toString().split('e');
        return signo * (num[0] + 'e' + (num[1] ? (+num[1] - decimales) : -decimales));
    }

    function showModal(message, icon = 'error') {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: icon,
            title: message
        })
    }

    
</script>

@endpush