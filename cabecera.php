<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Verydeli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        /* El contenido ocupará todo el espacio, empujando el footer hacia abajo */
        .content {
            flex: 1;
        }

        /* Asegura que el footer cubra todo el ancho de la página */
        footer {
            background: linear-gradient(to bottom, dimgray, #333);
            color: white;
            padding-top: 10px;
            padding-bottom: 10px;
            width: 100%;
        }
    </style>


</head>

<body>
    <!-- Barra Navegación -->
    <nav class="navbar navbar-expand-lg" style="background-color:dimgray;">
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

    <div class="content d-flex justify-content-center align-items-center" style="background: linear-gradient(to bottom, #e7fffb,#dddddd,#cac9c9); ">