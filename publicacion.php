<?php
include ('header.php');
include ('cabecera.php');
include('postulacion.php');

if (isset($_GET['id'])) {
    $publicacion_id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM publicacion WHERE pu_id = :id");
        $stmt->bindParam(':id', $publicacion_id, PDO::PARAM_INT);
        $stmt->execute();
        $publicacion = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($publicacion) {
            // Consulta para nombreUsuario
            $stmtUsuario = $pdo->prepare("SELECT u_nombre FROM usuario WHERE u_id = :u_id");
            $stmtUsuario->bindParam(':u_id', $publicacion['pu_fk_u_id'], PDO::PARAM_INT);
            $stmtUsuario->execute();
            $usuario = $stmtUsuario->fetch(PDO::FETCH_ASSOC);
            $nombre = $usuario ? $usuario['u_nombre'] : 'Desconocido';

            ?>
            <div class="container" align="center">
                <div class="card mb-3" style="max-width: 650px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= $publicacion['pu_foto'] ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title" id="tituloPublicacion">Publicacion #<?= $publicacion['pu_id'] ?></h5>
                                <p class="card-text"><small class="text-body-secondary">Fecha de la publicación: <?= $publicacion['pu_fecha'] ?></small></p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" align="left">
                            <blockquote class="blockquote mb-0">
                                <strong>Detalles</strong>: <?= $publicacion['pu_descripcion'] ?>
                            </blockquote>
                        </div>
                        <div class="card-body" align="left">
                            <p class="card-text"><strong>Peso</strong>: <?= $publicacion['pu_peso'] ?></p>
                            <p class="card-text"><strong>Volumen</strong>: <?= $publicacion['pu_volumen'] ?> cm³</p>
                            <p class="card-text"><strong>Origen</strong>: <?= $publicacion['pu_fk_origen'] ?></p>
                            <p class="card-text"><strong>Destino</strong>: <?= $publicacion['pu_fk_destino'] ?></p>
                            <p class="card-text"><strong>Dueño de la Publicación</strong>: @<?= $nombre ?></p>

                            
                            
                                <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" href="postulacion.php">Postularse</a>
                            

                            <a href="denunciarPublicacion.php">
                                <button type="button" class="btn btn-secondary" align="right">Denunciar publicación</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulario de comentario -->
            <div class="mb-3" style="max-width: 540px;" align="center">
                <h2 align="center">¿Tienes una duda? Deja tu comentario</h2><br>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <form action="subirPostulacion.php" method="post">
                        <input type="hidden" name="idPublicacion" value="<?= $publicacion_id ?>">
                        <textarea class="form-control" name="comentario" rows="3"></textarea>
                        <br>
                        <input type="submit" class="btn btn-primary" value="Comentar">
                    </form>
                <?php else: ?>
                    <p>Debes <a href="loguin_formulario.php">iniciar sesión</a> para comentar.</p>
                <?php endif; ?>
            </div>

            

            <?php
        } else {
            echo "No se encontró la publicación.";
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
} else {
    echo "ID de publicación no especificado.";
}

include('pie.php');
?>
