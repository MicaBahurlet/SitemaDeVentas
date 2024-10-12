@extends('template')

@section ('title', 'Editar cliente')

@push ('css')

@endpush

@section ('content')

<div class="container-fluid px-4">
    <h1 class="mt-4 text-center">Editar cliente</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"> <a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item "><a href="{{ route('clientes.index') }}">Clientes </a></li>
        <li class="breadcrumb-item active">Editar cliente</li>
    </ol>

    <div class="container w-100 border border-3 border-primary rounded p-4 mt-4">

        <form action="{{ route('clientes.update', ['cliente' => $cliente] ) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row g-3">

            <!-- select tipo cliente -->
                <div class="col-md-6">
                    <label for="tipo_persona" class="form-label"> Tipo de cliente: <span class="fw-bold">{{strtoupper   ($cliente ->persona-> tipo_persona) }}</span></label>
                </div>

                <!-- razón social -->
                <div class="col-md-12" id="box-razon-social">
                    @if($cliente->persona->tipo_persona == 'natural')
                    <label id="label-natural" for="razon_social" class="form-label">Nombres y Apellidos:</label>
                    @else
                    <label id="label-juridica" for="razon_social" class="form-label">Nombre de la empresa:</label>
                    @endif

                    <input type="text" class="form-control" id="razon_social" name="razon_social" value="{{ old('razon_social', $cliente->persona->razon_social) }}">
                    @error('razon_social')
                    <span class="text-danger">{{ '*'.$message }}</span>
                    @enderror
                </div>

                <!-- direccion -->
                <div class="col-md-12 mb-2">
                    <label for="direccion" class="form-label">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $cliente->persona->direccion) }}">
                    @error('direccion')
                    <small class="text-danger">{{ '*'.$message }}</small>
                    @enderror
                   
                </div>

                <!-- documento -->
                <div class="col-md-6">
                    <label for="documento_id" class="form-label"> Tipo de documento:</label>
                    <select name="documento_id" id="documento_id" class="form-select">
                        @foreach ($documentos as $item)
                        @if ($cliente->persona->documento_id == $item->id)
                        <option selected value="{{ $item->id }}" {{ old('documento_id') == $item->id ? 'selected' : '' }}  >{{ $item->tipo_documento }} </option>
                        @else
                        <option value="{{ $item->id }}" {{ old('documento_id') == $item->id ? 'selected' : '' }}  >{{ $item->tipo_documento }} </option>
                        @endif
                        @endforeach                       
                    </select>
                    @error('documento_id')
                    <span class="text-danger">{{ '*'.$message }}</span>
                    @enderror
                </div>

                <!-- numero de documento -->
                <div class="col-md-6 mb-2">
                    <label for="numero_documento" class="form-label">Numero de documento:</label>
                    <input type="text" class="form-control" id="numero_documento" name="numero_documento" value="{{ old('numero_documento', $cliente->persona->numero_documento)}}">
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

@endpush