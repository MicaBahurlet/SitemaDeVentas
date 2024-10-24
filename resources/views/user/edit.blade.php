@extends('template')

@section ('title', 'Editar usuario')

@push ('css')


@endpush

@section ('content')

<div class="container-fluid px-4">
    <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Editar usuario</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"> <a href="{{ route('panel') }}">Inicio</a></li>
        <li class="breadcrumb-item "><a href="{{ route('users.index') }}">Usuarios</a></li>
        <li class="breadcrumb-item active">Editar usuario</li>
    </ol>

    <div class="container w-100 border rounded p-4 mt-5">

        <form action="{{ route('users.update', ['user' => $user]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row g-3">
                <!-- nombre del rol -->
                <div class="row mb-3 mt-4">
                    <label for="name" class=" col-sm2 form-label"> Nombre del usuario:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name', $user->name)}}">
                    </div>
                    <div class="col-sm-4">
                        <div class="from-text">
                            Escriba un solo nombre por favor
                        </div>
                    </div>
                    <div class="col-sm-2">
                        @error('name')
                        <span class="text-danger">{{ '*'.$message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- email -->
                 <div class="row mb-3">
                    <label for="email" class=" col-sm2 form-label"> Email:</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email', $user->email)}}">
                    </div>
                    <div class="col-sm-4">
                        <div class="from-text">
                            Dirección de correo electrónico
                        </div>
                    </div>
                    <div class="col-sm-2">
                        @error('email')
                        <span class="text-danger">{{ '*'.$message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- password -->
                <div class="row mb-3">
                    <label for="password" class=" col-sm2 form-label"> Contraseña:</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="col-sm-4">
                        <div class="from-text">
                            Escriba una contraseña segura, debe incluir números
                        </div>
                    </div>
                    <div class="col-sm-2">
                        @error('password')
                        <span class="text-danger">{{ '*'.$message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- password confirm -->
                <div class="row mb-3">
                    <label for="password_confirm" class=" col-sm2 form-label"> Confirmar contraseña:</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                    </div>
                    <div class="col-sm-4">
                        <div class="from-text">
                            Repita su contraseña
                        </div>
                    </div>
                    <div class="col-sm-2">
                        @error('password_confirm')
                        <span class="text-danger">{{ '*'.$message }}</span>
                        @enderror
                    </div>
                </div>

                 <!-- Añadir rol -->
                 <div class="row mb-3">
                    <label for="role" class=" col-sm2 form-label"> Seleccionar rol:</label>
                    <div class="col-sm-4">
                        <select name="role" id=" role" class="form-select">
                            @foreach ($roles as $item)
                            @if ( in_array($item->name,$user->roles->pluck('name')->toArray()) )
                                <option selected value="{{$item->name}}" @selected( old('role') == $item->name)> {{$item->name}} </option>
                            @else
                                <option value="{{$item->name}}" @selected( old('role') == $item->name)> {{$item->name}} </option>
                            @endif
                            
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <div class="from-text">
                            Seleccione un rol para el usuario que intenta crear
                        </div>
                    </div>
                    <div class="col-sm-2">
                        @error('role')
                        <span class="text-danger">{{ '*'.$message }}</span>
                        @enderror
                    </div>
                </div>
                




                <div class="col-12 ">
                    <button type="submit" class="btn btn-primary">Actualizar</button>

                </div>


            </div>

        </form>

    </div>

</div>
@endsection

@push ('js')

@endpush