<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Login del sistema de ventas" />
    <meta name="author" content=" Micaela Bahurlet" />
    <title>Login -STOCKMASTER</title>
    <link href="{{asset('css/template.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>


    <style>
        #layoutAuthentication_content {
            background-image: url('{{asset('img/7.jpg')}}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;

        }
        .img-nav{
            width: 250px;
        }
    </style>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>

                <div class="container mt-5" style="margin-bottom: 5rem;">
                    <div class="card" style="border-radius: 15px; width: 80%; height: 9rem; margin: auto; box-shadow: 0px 8px 16px #000000">
                        <div class="d-flex justify-content-around align-items-center">
                            {{-- <h1 style="font-size: 2rem; font-weight: 700; text-shadow: 1px 1px 1px #000000">STOCK MASTER</h1> --}}
                            <img src="{{asset('img/STOCKMASTERlogo.png')}}" alt="LogoStockMaster" class="img-nav">
                            <a href="{{ route('primerosPasos') }}" class="btn  px-3 mb-2 mb-lg-0 " style="width: 160px; background-color: #007BA7; font-weight: bold; border-color: grey; color: white; display: inline-block; text-align: center; text-decoration: none; cursor: pointer">
                                Primeros pasos
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 
                <div class="container mt-4 text-center" style=" color:white; text-shadow: 3px 3px 5px #000000">
                    <h1 style="font-size: 6rem; font-weight:extrabold">STOCK MASTER</h1>
                </div> -->
                <div class="container mt-5">
                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-5 ">
                            <div class="card border-0 rounded-lg mt-5" style="border-radius: 15px; box-shadow: 0px 8px 16px #000000">

                                <div class="card-header">
                                    <h2 class="text-center font-weight-extrabold my-4 ">Acceder al sistema</h2>
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                    @foreach($errors->all() as $item)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{$item}}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endforeach
                                    @endif
                                    <form action="/login" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Correo electrónico</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                                            <label for="inputPassword">Contraseña</label>
                                        </div>
                                        <!-- <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Recordar contraseña</label>
                                            </div> -->
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <!-- <a class="small" href="password.html">Olvidaste tu contraseña?</a> -->
                                            <button type="submit" class="btn px-3 mb-2 mb-lg-0" style="color: white; text-decoration: none; background-color: #007BA7; font-weight: bold;border-color:grey; cursor: pointer"><a>Iniciar sesión</a></button>

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
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Micaela Bahurlet 2024</div>
                        <div>
                            <a href="{{ route('privacidad') }}">Política de privacidad</href=>
                                &middot;
                                <a href="{{ route('terminos') }}">Términos &amp; Condiciones</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
</body>

</html>