@extends('template')

@section('title','Crear marca')

@push('css')
<style>
    #descripcion {
        resize: none;
    }

    .btn-create{
            width: 130px; 
            background-color: #007BA7; 
            font-weight: bold; 
            border-color: grey; 
            color: white; 
            display: inline-block; 
            text-align: center; 
            text-decoration: none; 
            cursor: pointer
        }
        .btn-create:hover{
            background-color: #164B83;
            color: white;
        }
</style>
@endpush

@section('content')
<div class="container-fluid px-4">
    <h1  class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Crear Marca</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('marcas.index')}}">Marcas</a></li>
        <li class="breadcrumb-item active">Crear marca</li>
    </ol>

    <div class="container w-100 border  rounded p-4 mt-5">
        <form action="{{ route('marcas.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}">
                    @error('nombre')
                    <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" rows="3" class="form-control">{{old('descripcion')}}</textarea>
                    @error('descripcion')
                    <small class="text-danger">{{'*'.$message}}</small>
                    @enderror
                </div>

                <div class="col-12 ">
                    <button type="submit" class="btn btn-create">Guardar</button>
                </div>
            </div>


        </form>
    </div>
</div>

@endsection

@push('js')

@endpush