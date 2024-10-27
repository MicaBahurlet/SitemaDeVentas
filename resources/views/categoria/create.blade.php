@extends('template')

@section ('title', 'Crear categorías')

@push ('css')
<style>
    #descripcion{
        resize: none;
    }
</style>

@endpush

@section ('content')

<div class="container-fluid px-4">
    <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Crear categoría</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"> <a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item "><a href="{{ route('categorias.index') }}">Categorías </a></li>
        <li class="breadcrumb-item active">Crear categoría</li>
    </ol>

    <div class= "container w-100 border rounded p-4 mt-5">

        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                    @error('nombre')
                        <span class="text-danger">{{ '*'.$message }}</span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="descripcion" class="form-label">Descripción:</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <span class="text-danger">{{ '*'.$message }}</span>
                    @enderror
                    
                </div>

                <div class="col-12 ">
                    <button type="submit" class="btn" style="width: 130px; background-color: #007BA7; border-color: grey; color: white; display: inline-block; text-align: center; text-decoration: none; cursor: pointer">Guardar</button>
                    
                </div>


            </div>

        </form>

    </div>

</div>
@endsection

@push ('js')

@endpush