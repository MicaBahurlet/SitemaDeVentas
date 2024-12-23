<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Login del sistema de ventas" />
    <meta name="author" content=" Micaela Bahurlet" />
    <title>Login -STOCKMASTER</title>
    <link href="{{ asset('css/template.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        #layoutAuthentication_content {
            background-image: url('{{ asset('img/7.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;

        }

        .img-nav {
            width: 250px;
            filter: drop-shadow(2px 5px 5px rgba(0, 0, 0, 0.5));
        }

        .btn-firstSteps {
            width: 220px;
            background-color: white;
            font-weight: bold;
            border-color: #007BA7;
            color: #007BA7;
            display: inline-block;
            justify-content: center;
            align-items: center;
            text-align: center;
            text-decoration: none;
            cursor: pointer
        }

        .btn-firstSteps:hover {
            background-color: #164B83;
            color: white;
        }

        .btn-login {
            width: 160px;
            background-color: #007BA7;
            font-weight: bold;
            border-color: grey;
            color: white;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            cursor: pointer
        }

        .btn-login:hover {
            background-color: #164B83;
            color: white;
        }

        .eye-icon {
            color: #007BA7;
            /* Cambia el color a azul */
        }
    </style>
</head>

<body class="bg-primary">

    <div id="layoutAuthentication">

        <div id="layoutAuthentication_content">
            <main>
                <div class="container-fluid" style="margin-bottom: 5rem">
                    <div class="d-flex justify-content-around align-items-center bg-light">
                        <img src="{{ asset('img/STOCKMASTERlogo.png') }}" alt="LogoStockMaster" class="img-nav">
                        <a href="{{ route('primerosPasos') }}" class="btn btn-firstSteps">¿Qué es StockMaster?</a>
                    </div>
                </div>

                <div class="container mt-5 box-login">
                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-5 ">
                            <div class="card border-0 rounded-lg mt-5"
                                style="border-radius: 15px; box-shadow: 0px 8px 16px #000000">

                                <div class="card-header">
                                    <h2 class="text-center font-weight-extrabold my-4 ">Iniciar sesión</h2>
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $item)
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>{{ $item }}</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endforeach
                                    @endif
                                    <form action="/login" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="email" id="inputEmail" type="email"
                                                placeholder="name@example.com" />
                                            <label for="inputEmail">Correo electrónico</label>
                                        </div>
                                        {{-- <div class="form-floating mb-3">
                                            <input class="form-control" name="password" id="inputPassword"
                                                type="password" placeholder="Password" />
                                            <label for="inputPassword">Contraseña</label>
                                        </div> --}}
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" id="inputPassword"
                                                type="password" placeholder="Contraseña" />
                                            <button type="button"
                                                class="btn btn-link position-absolute end-0 top-50 translate-middle"
                                                id="show-password">
                                                <i class="fas fa-eye-slash eye-icon" id="eye-icon"></i>
                                            </button>
                                            <label for="inputPassword">Contraseña</label>
                                        </div>
                                        <!-- <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Recordar contraseña</label>
                                            </div> -->
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                            <button type="submit" class="btn px-3 mb-2 mb-lg-0 btn-login"><a>Iniciar
                                                    sesión</a></button>
                                            <a class="small" href="password.html">¿Olvidaste tu contraseña?</a>

                                        </div>
                                    </form>
                                </div>
                                <!-- <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <x-footer />
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script>
        document.getElementById('show-password').addEventListener('click', function() {
            var input = document.getElementById('inputPassword');
            var eyeIcon = document.getElementById('eye-icon');
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
</body>

</html>
