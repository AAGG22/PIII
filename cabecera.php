<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">

    <!-- Barra Navegación -->
    <nav class="navbar navbar-expand-lg" id="navBar">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" alt="Verydeli" width="90" height="24">
        </a>

        <!-- Botón para el menú colapsable en tel -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <!-- Buscador -->
            <form class="d-flex mx-auto col-md-4" role="buscar">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-light" type="submit">Buscar</button>
            </form>
            <!-- Fin buscador -->

            <!-- opciones -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="pag3_publicacion.php">Publicar</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link active text-white" aria-current="page" href="Pag6_deposito.php">Postularse</a>
                </li>
            </ul>

            <!-- menu desplegable -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <?php
                    session_start();
                    if (isset($_SESSION['user_id'])): // si esta logeado
                    ?>
                        <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg> <!-- Ícono de usuario -->
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="mi_perfil.php">Mi perfil</a></li>
                            <li><a class="dropdown-item" href="mis_publicaciones.php">Mis publicaciones</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                        </ul>
                    <?php else: // si el usuario no esta logueado ?>
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ingresar
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="loguin_formulario.php">Loguin</a></li>
                            <li><a class="dropdown-item" href="usuario_formulario.php">Registrate</a></li>
                        </ul>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <!-- fin Enlace desplegable -->

    <!-- fin Barra Navegacion -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    