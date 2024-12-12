@extends('template')

@section('title', 'Crear usuario')

@push('css')
    <style>
        .btn-create {
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

        .btn-create:hover {
            background-color: #164B83;
            color: white;
        }

        .eye-icon {
            color: #007BA7;
        }

    </style>
@endpush

@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Crear usuario</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"> <a href="{{ route('panel') }}">Inicio</a></li>
            <li class="breadcrumb-item "><a href="{{ route('users.index') }}">Usuarios </a></li>
            <li class="breadcrumb-item active">Crear usuario</li>
        </ol>

        <div class="container w-100 border rounded p-4 mt-5">

            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <!-- nombre del rol -->
                    <div class="row mb-3 mt-4">
                        <label for="name" class=" col-sm2 form-label"> Nombre del usuario:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="col-sm-4">
                            <div class="from-text">
                                Escriba un solo nombre por favor
                            </div>
                        </div>
                        <div class="col-sm-2">
                            @error('name')
                                <span class="text-danger">{{ '*' . $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- email -->
                    <div class="row mb-3">
                        <label for="email" class=" col-sm2 form-label"> Email:</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="col-sm-4">
                            <div class="from-text">
                                Dirección de correo electrónico
                            </div>
                        </div>
                        <div class="col-sm-2">
                            @error('email')
                                <span class="text-danger">{{ '*' . $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- password -->
                    {{-- <div class="row mb-3">
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
                                <span class="text-danger">{{ '*' . $message }}</span>
                            @enderror
                        </div>
                    </div> --}}

                    <!-- password confirm -->
                    {{-- <div class="row mb-3">
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
                                <span class="text-danger">{{ '*' . $message }}</span>
                            @enderror
                        </div>
                    </div> --}}

                    <!-- password -->
                    <div class="row mb-3">
                        <label for="password" class=" col-sm2 form-label"> Contraseña:</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password">
                                <button type="button" class="btn btn-link position-absolute end-0 top-50 translate-middle"
                                    id="show-password">
                                    <i class="fas fa-eye-slash eye-icon" id="eye-icon-password"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="from-text">
                                Escriba una contraseña segura, debe incluir números
                            </div>
                        </div>
                        <div class="col-sm-2">
                            @error('password')
                                <span class="text-danger">{{ '*' . $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- password confirm -->
                    <div class="row mb-3">
                        <label for="password_confirm" class=" col-sm2 form-label"> Confirmar contraseña:</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                                <button type="button" class="btn btn-link position-absolute end-0 top-50 translate-middle"
                                    id="show-password-confirm">
                                    <i class="fas fa-eye-slash eye-icon" id="eye-icon-password-confirm"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="from-text">
                                Repita su contraseña
                            </div>
                        </div>
                        <div class="col-sm-2">
                            @error('password_confirm')
                                <span class="text-danger">{{ '*' . $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Añadir rol -->
                    <div class="row mb-3">
                        <label for="role" class=" col-sm2 form-label"> Seleccionar rol:</label>
                        <div class="col-sm-4">
                            <select name="role" id=" role" class="form-select">
                                <option value="" selected disabled>Seleccione...</option>
                                @foreach ($roles as $item)
                                    <option value="{{ $item->name }}" @selected(old('role') == $item->name)> {{ $item->name }}
                                    </option>
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
                                <span class="text-danger">{{ '*' . $message }}</span>
                            @enderror
                        </div>
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
    <script>
        document.getElementById('show-password').addEventListener('click', function() {
            var input = document.getElementById('password');
            var eyeIcon = document.getElementById('eye-icon-password');
            if (input.type === 'password') {
                input.type = 'text';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                input.type = 'password';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        });

        document.getElementById('show-password-confirm').addEventListener('click', function() {
            var input = document.getElementById('password_confirm');
            var eyeIcon = document.getElementById('eye-icon-password-confirm');
            if (input.type === 'password') {
                input.type = 'text';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            } else {
                input.type = 'password';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            }
        });
    </script>
@endpush