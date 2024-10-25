
    <!-- Barra Navegación -->
    <nav class="navbar navbar-expand-lg" id="navBar" >
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" alt="Verydeli" width="90" height="24">
            </a>

            <!-- Botón para el menú colapsable en dispositivos móviles -->
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


                <!-- Publicacion - Postulacion -->
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="pag3_publicacion.php">Publicar</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active  text-white" aria-current="page" href="Pag6_deposito.php">Postularse</a>
                    </li>

                </ul>




                <!-- Enlace desplegable -->
                <ul class="navbar-nav ms-auto">



                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ingresar
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="loguin_formulario.php">Loguin</a></li>
                            <li><a class="dropdown-item" href="usuario_formulario.php">Registrate</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Cerrar Sesion</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- fin Enlace desplegable -->

    <!-- fin Barra Navegacion -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>