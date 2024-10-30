<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Micaela Bahurlet" />
    <title>404 Error - SB Admin</title>
    <link href="{{ asset('css/template.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="layoutError">
        <div id="layoutError_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-6">
                            <div class="text-center ">
                                <img class="mb-2 img-error" src="{{ asset('assets/img/401-error.svg') }}" />
                                <p class="lead">No autorizado</p>
                                <p>No cuenta con permisos para acceder a esta vista</p>
                                <a href="{{ route('login') }}">
                                    <i class="fas fa-arrow-left me-1"></i>
                                    Iniciar sesión
                                </a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="containe mt-5">
                        <div class="row justify-content-center">
                            <img src="{{ asset('img/STOCKMASTERlogo.png') }}" alt="" style="width: 290px">
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutError_footer">
            <x-footer />
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
