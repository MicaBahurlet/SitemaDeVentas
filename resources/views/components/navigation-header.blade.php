<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route('panel') }}" style="font-weight: bold; font-size: 1.6rem;">STOCK MASTER</a>
    
    <!-- Navbar Search -->
    <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" name="query" type="text" placeholder="Buscar..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn" id="btnNavbarSearch" type="submit" style="background-color: #007BA7"><i class="fas fa-search"></i></button>
        </div>
    </form> -->
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-3 me-lg-4">
            <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('profile.index') }}">Configuración de perfil</a></li>
                {{-- <li><a class="dropdown-item" href="#!">Registro de Actividad</a></li> --}}
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Cerrar Sesión</a></li>
            </ul>
        </li>
    </ul>
</nav>
