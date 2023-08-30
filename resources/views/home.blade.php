<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

    <!-- Enlace a Usuarios -->
    <a class="dropdown-item" href="{{ route('users.index') }}">
        <i class="fas fa-user"></i> Usuarios
    </a>

    <!-- Enlace a Profesionales -->
    <a class="dropdown-item" href="{{ route('professions.index') }}">
        <i class="fas fa-briefcase"></i> Profesionales
    </a>

    <div class="dropdown-divider"></div> <!-- Separador visual -->

    <!-- Opción de cerrar sesión -->
    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
