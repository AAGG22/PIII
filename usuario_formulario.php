<?php
include "cabecera.php";
?>

<div class="container" style="padding: 15px;">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            </br>
            <div class="card">
                <div class="card-header text-center">Registrar Usuario</div>
                <div class="card-body">

                    <form action="usuario_logica.php" method="POST" style="font-size: 12px;" >
                        <label for="nombre">Nombre:</label><br>
                        <input class="form-control" type="text" id="nombre" name="nombre" required>

                        <label for="apellido">Apellido:</label><br>
                        <input class="form-control" type="text" id="apellido" name="apellido" required>

                        <label for="userName">Nombre de Usuario:</label><br>
                        <input class="form-control" type="text" id="userName" name="userName" required>

                        <label for="pwd">Contraseña:</label><br>
                        <input class="form-control" type="password" id="pwd" name="pwd" required>

                        <label for="email">Email:</label><br>
                        <input class="form-control" type="email" id="email" name="email" required>

                        <label for="vehiculo">Vehículo:</label><br>
                        <input class="form-control" type="text" id="vehiculo" name="vehiculo" required><br>

                        <input class="btn btn-secondary" type="submit" value="Guardar Usuario">
                    </form>

                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>






<?php
include "pie.php";
?>