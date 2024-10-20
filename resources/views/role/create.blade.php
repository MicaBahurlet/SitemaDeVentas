@extends('template')

@section ('title', 'Crear rol')

@push ('css')


@endpush

@section ('content')

<div class="container-fluid px-4">
    <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Crear Rol</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"> <a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item "><a href="{{ route('roles.index') }}">Roles </a></li>
        <li class="breadcrumb-item active">Crear rol</li>
    </ol>

    <div class="container w-100 border rounded p-4 mt-5">

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <!-- nombre del rol -->
                <div class="row mb-4">
                    <label for="name" class=" col-sm2 form-label"> Nombre del rol</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                    </div>
                    <div class="col-sm-6">
                        @error('name')
                        <span class="text-danger">{{ '*'.$message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Permisos -->
                <div class="col-12">
                    <label for="" class="form-label">Permisos para el rol</label>
                    @foreach ($permisos as $item)
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="permission[]" value="{{$item->id}}" id="{{$item->id}}">
                        <label class="form-check-label" for="{{$item->id}}">
                            {{$item->name}}
                        </label>

                    </div>
                    @endforeach

                </div>
                @error('permission')
                <span class="text-danger">{{ '*'.$message }}</span>
                @enderror



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