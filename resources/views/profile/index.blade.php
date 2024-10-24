@extends ('template')

@section('title', 'Perfil')


@push ('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush


@section ('content')

@if ( session('success') )
<script>
    let message = "{{ session('success') }}";
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: "success",
        title: message
    });
</script>
@endif

<div class="container mt-5">
    <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Configurar perfil</h1>

    <div class="mt-4">

        @if ($errors->any())
        @foreach($errors->all() as $item)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{$item}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endforeach
        @endif

        <form action="{{ route('profile.update',['profile' => $user ]) }}" method="POST">

            @method('PATCH')
            @csrf

            <!-- nombre -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-square-check"></i></span>
                        <input disabled type="text" class="form-control" value="Nombres">
                    </div>
                </div>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                </div>
            </div>

            <!-- email -->
            <div class="row mt-3">
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        <input disabled type="text" class="form-control" value="Email">
                    </div>
                </div>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                </div>
            </div>

            <!-- password -->
            <div class="row mt-3">
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input disabled type="text" class="form-control" value="Contraseña">
                    </div>
                </div>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>

            <div class="col mt-4">
                <input type="submit" class="btn btn-primary mt-4" value="Guardar cambios">
            </div>

        </form>
    </div>
</div>


@endsection


@push ('js')

@endpush