@extends ('template')

@section ('title', 'Editar rol')

@push ('css')
<style>
    #descripcion {
        resize: none;
    }
</style>

@endpush

@section ('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Editar Rol</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"> <a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item "><a href="{{ route('roles.index') }}">Roles </a></li>
        <li class="breadcrumb-item active">Editar rol</li>
    </ol>
</div>

<div class="container w-100 border  rounded p-4 mt-5">

    <form action="{{ route('roles.update', ['role' => $role]) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="row g-3">
            <!-- nombre del rol -->
            <div class="row mb-4">
                <label for="name" class=" col-sm2 form-label"> Nombre del rol</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name', $role->name)}}">
                </div>
                <div class="col-sm-6">
                    @error('name')
                    <span class="text-danger">{{ '*'.$message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Permisos -->
            <div class="col-12">
                <p class="text-muted">Permisos para el rol:</p>
                @foreach ($permisos as $item)
                @if ( in_array($item->id, $role->permissions->pluck('id')->toArray() ) )
                <div class="form-check mb-2">
                    <input checked type="checkbox" name="permission[]" id="{{$item->id}}" class="form-check-input" value="{{$item->id}}">
                    <label for="{{$item->id}}" class="form-check-label">{{$item->name}}</label>
                </div>
                @else
                <div class="form-check mb-2">
                    <input type="checkbox" name="permission[]" id="{{$item->id}}" class="form-check-input" value="{{$item->id}}">
                    <label for="{{$item->id}}" class="form-check-label">{{$item->name}}</label>
                </div>
                @endif
                @endforeach
            </div>
            @error('permission')
            <small class="text-danger">{{'*'.$message}}</small>
            @enderror

            <div class="col-12 ">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <button type="reset" class="btn btn-secondary">Reiniciar</button>

            </div>


        </div>

    </form>

</div>

@endsection

@push ('js')

@endpush