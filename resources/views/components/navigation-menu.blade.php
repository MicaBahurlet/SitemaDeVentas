<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu ">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Inicio</div>
                <a class="nav-link" href="{{ route('panel') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-line"></i></i></div>
                    Panel principal
                </a>

                <div class="sb-sidenav-menu-heading">Gestión</div>
                @can('ver-categoria')
                <a class="nav-link" href="{{ route('categorias.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-tag"></i></div>
                    Categorias
                </a>
                @endcan
                @can ('ver-marca')
                <a class="nav-link" href="{{ route('marcas.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                    Marcas
                </a>
                @endcan
                @can ('ver-producto')
                <a class="nav-link" href="{{ route('productos.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                    Productos
                </a>
                @endcan
                @can ('ver-cliente')
                <a class="nav-link" href=" {{ route('clientes.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-people-group"></i></i></div>
                    Clientes
                </a>
                @endcan
                @can ('ver-proveedore')
                <a class="nav-link" href=" {{ route('proveedores.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-people-arrows"></i></i></i></div>
                    Proveedores
                </a>
                @endcan

                @can ('ver-compra')
                <!-- Compras -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-hand-holding-dollar"></i></div>
                    Compras
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('compras.index') }}">Ver compras</a>
                        <a class="nav-link" href="{{ route('compras.create') }}">Crear compra</a>
                    </nav>
                </div>
                @endcan

                @can ('ver-venta')
                <!-- Ventas -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseVentas" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill-trend-up"></i></div>
                    Ventas
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseVentas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('ventas.index') }}">Ver ventas</a>
                        <a class="nav-link" href="{{ route('ventas.create') }}">Crear venta</a>
                    </nav>
                </div>
                @endcan


                @hasrole ('admin')
                <div class="sb-sidenav-menu-heading">Otros</div>
                @endhasrole
                @can('ver-user')
                <a class="nav-link mt-4" href=" {{ route('users.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></i></i></div>
                    Usuarios
                </a>
                @endcan

                @can('ver-role')
                <a class="nav-link" href=" {{ route('roles.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-person-circle-plus"></i></i></i></div>
                    Roles
                </a>
                @endcan

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Bienvenido:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>