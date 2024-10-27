<?php
include ('header.php');
include ('cabecera.php');

if (isset($_GET['id'])) {
    $publicacion_id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM publicacion WHERE pu_id = :id");
$stmt->bindParam(':id', $publicacion_id, PDO::PARAM_INT);
$stmt->execute();
$publicacion = $stmt->fetch(PDO::FETCH_ASSOC);


if ($publicacion) {
    //consulta para nombreUsuario
    $stmtUsuario = $pdo->prepare("SELECT u_nombre FROM usuario WHERE u_id = :u_id");
    $stmtUsuario->bindParam(':u_id', $publicacion['pu_fk_u_id'], PDO::PARAM_INT);
    $stmtUsuario->execute();
    $usuario = $stmtUsuario->fetch(PDO::FETCH_ASSOC);

    // toma el nombre del usuario. Si no lo encuentra pone 'Desconocido'
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Postularse</button>
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
  <form action="subirPostulacion.php" method="post">
    <input type="hidden" name="idPublicacion" value="<?= $publicacionId ?>">
    <textarea class="form-control" name="comentario" rows="3"></textarea>
    <br>
    <input type="submit" class="btn btn-primary" value="Comentar">
  </form>
</div>

<!-- Modal para postularse -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Postularse a la Publicación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="subirPostulacion.php" method="post">
          <input type="hidden" name="idPublicacion" value="<?= $publicacionId ?>">
          <div class="container" align="center">
            Monto: <input type="number" name="montoPostulacion" min="0" value="1"><br>
          </div>
          <br>
          <div class="container" align="center">
            <label for="mensajePostulacion" align="center">Comentario</label><br>
            <textarea name="mensajePostulacion" rows="4" cols="60"></textarea>
          </div>
          <br>
          <div class="container" align="center">
            <input class="btn btn-primary" type="submit" value="Postularse">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="container" name="comentarios" style=" width: 650px; padding: 20px; border: 1px solid #ddd;">
      <h2 align="center">Comentarios</h2>
      <br>
            <div class="card mb-3" name="comentario">
              <div class="card-body">
                <h5 class="card-title">@usuario pregunta</h5>
                <p class="card-text">dudas, dudas dudas</p>
              </div>
              <a href="#" class="btn btn-primary" align="right">Responder</a>
            </div>
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