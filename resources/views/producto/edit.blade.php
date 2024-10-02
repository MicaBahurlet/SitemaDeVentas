@extends ('template')

@section ('title', 'Editar producto')

@push ('css')

<style>
    #descripcion {
        resize: none;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@endpush


@section('content')

<div class="container-fluid px-4">

    <h1 class="mt-4 text-center">Editar producto</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"> <a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item "><a href="{{ route('productos.index') }}">Productos </a></li>
        <li class="breadcrumb-item active">Editar producto</li>
    </ol>

    <div class="container w-100 border border-3 border-primary rounded p-4 mt-4">
        <form action="{{ route('productos.update', ['producto' => $producto])}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="row g-3">
                <!-- codigo -->
                <div class="col-md-6 mb-2">
                    <label for="codigo" class="form-label">Código:</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo', $producto->codigo) }}">
                    @error('codigo')
                    <small class="text-danger">{{ '*'.$message }}</small>
                    @enderror
                </div>
                <!-- nombre -->
                <div class="col-md-6 mb-2">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}">
                    @error('nombre')
                    <small class="text-danger">{{ '*'.$message }}</small>
                    @enderror
                </div>

                <!-- descripcion -->
                <div class="col--md-12">
                    <label for="nombre" class="form-label">Descripcion:</label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="6" class="form-control"> {{ old('descripcion', $producto->descripcion) }}</textarea>
                    @error('descripcion')
                    <small class="text-danger">{{ '*'.$message }}</small>
                    @enderror
                </div>

                <!-- Fecha Vencimiento -->
                <div class="col-md-6 mb-2">
                    <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento:</label>
                    <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" value="{{ old('fecha_vencimiento', $producto->fecha_vencimiento) }}">
                    @error('fecha_vencimiento')
                    <small class="text-danger">{{ '*'.$message }}</small>
                    @enderror
                </div>

                <!-- imagen -->
                <div class="col-md-6 mb-2">
                    <label for="img_path" class="form-label">Imagen:</label>
                    <input type="file" class="form-control" id="img_path" name="img_path" accept="Image/*">
                    @error('img_path')
                    <small class="text-danger">{{ '*'.$message }}</small>
                    @enderror
                </div>

                <!-- marca select -->
                <div class="col-md-6 mb-2">
                    <label for="marca_id" class="form-label">Marca:</label>
                    <select data-size="5" title="Seleccione una marca..." data-live-search="true" name="marca_id" id="marca_id" class="form-control selectpicker">
                        @foreach ($marcas as $item)
                        @if ($producto->marca_id == $item->id)
                        <option selected value="{{ $item->id }}" {{old('marca_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->nombre }}
                        </option>
                        @else
                        <option value="{{ $item->id }}" {{old('marca_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->nombre }}
                        </option>
                        @endif

                        @endforeach
                    </select>
                    @error('marca_id')
                    <small class="text-danger">{{ '*'.$message }}</small>
                    @enderror
                </div>


                <!-- categoria select -->
                <div class="col-md-6 mb-2">
                    <label for="categorias" class="form-label">Categorías:</label>
                    <select data-size="5" title="Seleccione una categoria..." data-live-search="true" name="categorias[]" id="categorias" class="form-control selectpicker" multiple>
                        @foreach ($categorias as $item)
                        @if (in_array($item->id, $producto->categorias->pluck('id')->toArray()))
                        <option selected value="{{ $item->id }}" {{ (in_array($item->id, old('categorias', [])) ? 'selected' : '')}}>
                            {{ $item->nombre }}
                        </option>
                        @else
                        <option value="{{ $item->id }}" {{ (in_array($item->id, old('categorias', [])) ? 'selected' : '')}}>
                            {{ $item->nombre }}
                        </option>
                        @endif

                        @endforeach
                    </select>
                    @error('categorias')
                    <small class="text-danger">{{ '*'.$message }}</small>
                    @enderror
                </div>

                <!-- botones -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>


            </div>
        </form>
    </div>

</div>

@endsection

@push ('js')

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
@endpush