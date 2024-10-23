<?php
include "cabecera.php";
?>

<div class="content" style="padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                </br>
                <div class="card">
                    <div class="card-header">Iniciar sesión</div>
                    <div class="card-body">
                        <form action="loguin_logica.php" method="POST" >
                            Usuario: <input class="form-control" type="text" name="usuario" id="">
                            </br>
                            Contraseña: <input class="form-control" type="password" name="pwd" id="">
                            </br>
                            <button class="btn btn-secondary" type="submit">Iniciar sesión</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    </div>


<?php
include "pie.php";
?>