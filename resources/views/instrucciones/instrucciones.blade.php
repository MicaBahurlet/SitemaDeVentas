@extends('template')

@section('title', 'Instrucciones')

@push('css')
    <style>
        .contenedor-instrucciones {
            display: flex;
            flex-direction: column;
            margin-top: 3rem;

        }
    </style>
@endpush

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 mb-4 fw-bold" style="font-size: 3rem;">Instrucciones</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"> <a href="{{ route('panel') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Instrucciones</li>
        </ol>

        <div class="contenedor-instrucciones">
            <h3 class="fw-bold mb-4">Sobre la navegación y el sistema</h3>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Menú lateral y sus funciones
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Desde la barra lateral podrás acceder a las diferentes secciones del sistema. <b> Tené en cuenta que las vistas pueden cambiar según los permisos que tengas como usuario</b>. <br> Si hay alguna acción que consideres que debes realizar, pero no puedes acceder a ella, lo mejor será que te contactes con el administrador de tu negocio.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Barra de navegación superior
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Desde la navegación superior podrás <b>cerrar sesión</b> de tu cuenta y además acceder a la <b>configuración de tu perfil</b> para modificar los datos en caso de ser requerido. 
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Instrucciones para cargar productos
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                           <b> Antes de cargar un producto asegurate</b> de  haber creado previamente las <strong>categorías</strong> y la <strong>marca</strong> asociada al producto, esto te ayudará a mantener tu stock detallado y organizado.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Instrucciones para cargar clientes y proveedores
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                           En los apartados correspondientes podrás crear una lista con la información de cada uno de tus clientes y tus proveedores. Asegurate de que la información cargada sea correcta.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            ¿Qué datos reflejan las tablas?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                           Dentro de cada vista principal te encontrarás con <b>tablas que reflejan la información cargada por los usuarios de tu sistema</b>. <br> Cada tabla ofrece un propio <b>campo de búsqueda</b>, lo cual simplifica el encontrar lo que buscas. Además, según los permisos con los que cuente tu usuario, podrás realizar distintas acciones dentro de estas tablas. <b>Desde los botones</b> correspondientes podrás: ver, editar, eliminar y restaurar aquello que desees.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contenedor-instrucciones">
            <h3 class="fw-bold mb-4">Sobre roles y usuarios</h3>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed  fw-semibold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                            ¿Qué es un rol?
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Un rol <b>es un conjunto de permisos que se le asigna a un usuario</b>. Quien establece los permisos y crea los roles es el usuario administrador del sistema. <br> <strong>Recomendaciones:</strong> establecé <b> un solo rol para cada tipo de accion que requiera tu negocio</b>, para ello <b> es necesario que identifiques qué tareas se realizan dentro de tu negocio</b> y <b>quienes se encargan de realizarlas</b>.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            ¿Qué son los usuarios?
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Los usuarios reflejan <b>las cuentas de tu negocio</b> dentro de <strong>STOCKMASTER</strong>. <br> <b> Cada usuario tiene un rol</b> asignado, y con dicho rol cuenta con una serie de permisos que le son únicos. <br> El usuario administrador del sistema contará con todos los permisos existentes para la gestión de su negocio y es quien crea los usuarios. <br> <strong>Recomendaciones:</strong> revisar los permisos que se le asignan a cada usuario. 
                        </div>
                    </div>
                </div>

        </div>
    @endsection

    @push('js')
    @endpush
