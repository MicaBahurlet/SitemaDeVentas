@extends('template')

@section ('title', 'Crear cliente')

@push ('css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style>
    #box-razon-social {
        display: none;
    }
</style>
@endpush

@section ('content')

<div class="container-fluid px-4">
    <h1 class="mt-4 text-center">Crear cliente</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"> <a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item "><a href="{{ route('clientes.index') }}">Clientes </a></li>
        <li class="breadcrumb-item active">Crear cliente</li>
    </ol>

    <div class="container w-100 border border-3 border-primary rounded p-4 mt-4">

        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            <div class="row g-3">

            <!-- select tipo cliente -->
                <div class="col-md-6">
                    <label for="tipo_persona" class="form-label"> Tipo de cliente:</label>
                    <select name="tipo_persona" id="tipo_persona" class="form-select">
                        <option value="" selected disabled>Seleccione una opción</option>
                        <option value="natural" {{ old('tipo_persona') == 'natural' ? 'selected' : ''}}>Persona particular </option>
                        <option value="juridica" {{ old('tipo_persona') == 'juridica' ? 'selected' : ''}}>Persona jurídica </option>
                    </select>
                    @error('tipo_persona')
                    <span class="text-danger">{{ '*'.$message }}</span>
                    @enderror
                </div>

                <!-- razón social -->
                <div class="col-md-6" id="box-razon-social">
                    <label id="label-natural" for="razon_social" class="form-label">Nombres y Apellidos:</label>
                    <label id="label-juridica" for="razon_social" class="form-label">Nombre de la empresa:</label>

                    <input type="text" class="form-control" id="razon_social" name="razon_social" value="{{ old('razon_social') }}">
                    @error('razon_social')
                    <span class="text-danger">{{ '*'.$message }}</span>
                    @enderror
                </div>

                <!-- direccion -->
                <div class="col-md-12 mb-2">
                    <label for="direccion" class="form-label">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}">
                    @error('direccion')
                    <small class="text-danger">{{ '*'.$message }}</small>
                    @enderror
                   
                </div>

                <!-- documento -->
                <div class="col-md-6">
                    <label for="documento_id" class="form-label"> Tipo de documento:</label>
                    <select name="documento_id" id="documento_id" class="form-select">
                        <option value="" selected disabled>Seleccione una opción</option>
                        @foreach ($documentos as $item)
                        <option value="{{ $item->id }}" {{ old('documento_id') == $item->id ? 'selected' : '' }}  >{{ $item->tipo_documento }} </option>
                        @endforeach
                        
                    </select>
                    @error('documento_id')
                    <span class="text-danger">{{ '*'.$message }}</span>
                    @enderror
                </div>

                <!-- numero de documento -->
                <div class="col-md-6 mb-2">
                    <label for="numero_documento" class="form-label">Numero de documento:</label>
                    <input type="text" class="form-control" id="numero_documento" name="numero_documento" value="{{ old('numero_documento') }}">
                    @error('numero_documento')
                    <small class="text-danger">{{ '*'.$message }}</small>
                    @enderror
                   
                </div>


                <div class="col-12 ">
                    <button type="submit" class="btn btn-primary">Guardar</button>

                </div>


            </div>

        </form>

    </div>

</div>
@endsection

@push ('js')
<script>
    $(document).ready(function() {
        $('#tipo_persona').change(function() {
            let selectValue = $(this).val();

            if (selectValue == 'natural') {
                $('#label-juridica').hide();
                $('#label-natural').show();
            } else if (selectValue == 'juridica') {
                $('#label-natural').hide();
                $('#label-juridica').show();
            }

            $('#box-razon-social').show();
        });
    })
</script>

@endpush