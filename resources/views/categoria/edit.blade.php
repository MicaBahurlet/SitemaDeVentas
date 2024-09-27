@extends ('template')

@section ('title', 'Editar categoría')

@push ('css')

@endpush

@section ('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-center">Editar categoría</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"> <a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item "><a href="{{ route('categorias.index') }}">Categorías </a></li>
        <li class="breadcrumb-item active">Editar categoría</li>
    </ol>
</div>

<div class="container w-100 border border-3 border-primary rounded p-4 mt-4">

    <form action="{{ route('categorias.update', ['categoria' => $categoria]) }}" method="POST" >
        @method('PATCH')
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $categoria->caracteristica->nombre ) }}">
                @error('nombre')
                <span class="text-danger">{{ '*'.$message }}</span>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ old('descripcion', $categoria->caracteristica->descripcion) }}</textarea>
                @error('descripcion')
                <span class="text-danger">{{ '*'.$message }}</span>
                @enderror

            </div>

            <div class="col-12 ">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <button type= "reset" class="btn btn-secondary">Vaciar Categoria</button>

            </div>


        </div>

    </form>

</div>

@endsection

@push ('js')

@endpush