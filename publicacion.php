<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Publicacion VeryDeli</title><!--Php con el nombre de la publicacion-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="publicacionEstilo.css">
  </head>
  <body>
      <?php
          include 'cabecera.html';
      ?>
      <br>
    <!--<h1 align="center">Publicacion de delivery</h1> Php con el nombre de la publicacion-->
    <!--Atributos publicacion: ID, Volumen, Peso, Origen, Destino, Estado, Descripcion-->
    <?php
      include 'coneccion/conexionDB.php';
      extract($_GET);
      $sql="SELECT * FROM publicacion WHERE pu_id=".$publicacion;
      $resultado=mysqli_query($conn,$sql);
      $sqlUbicacion = "SELECT * FROM argentina";
      $resultadoUbicaciones = mysqli_query($conn, $sqlUbicacion);
      $ubicacionExiste = 0;

          
      if(mysqli_num_rows($resultado)>0){
        while($row = mysqli_fetch_row($resultado)){
          $sql="SELECT * FROM usuario WHERE u_id=".$row[1];
          $resultadoNombre=mysqli_query($conn,$sql);

          if(mysqli_num_rows($resultadoNombre)>0){
            while(($rowNombre=mysqli_fetch_row($resultadoNombre))>0){
              $nombre=$rowNombre[3];
            }
          }
          if (mysqli_num_rows($resultadoUbicaciones) > 0) {
            // Bucle que recorre las ubicaciones
            while ($rowUbicacion = mysqli_fetch_row($resultadoUbicaciones)) {
                
                if ($row[3] == $rowUbicacion[0]) {
                    $origen = $rowUbicacion[1];
                    $ubicacionExiste++;
                }
                if ($row[6] == $rowUbicacion[0]) {
                    $destino = $rowUbicacion[1];
                    $ubicacionExiste++;
                }
                // controlamos origen y destino para salir
                if ($ubicacionExiste == 2) {
                    $ubicacionExiste = 0;
                    break;
                }
            }
        }
          echo "
                    <div class='container' align='center'>
                      <div class='card mb-3' style='max-width: 650px;'>
                        <div class='row g-0'>
                            <div class='col-md-4'>";
                            //IMG de la publicacion es el $row[14] para cuando este listo
                            echo"
                            <img src='depositphotos_11506024-stock-photo-package.jpg' class='img-fluid rounded-start' alt='...'>
                            </div>
                            <div class='col-md-8'>
                            <div class='card-body'>
                                <h5 class='card-title' id='tituloPublicacion'>".$row[2]."</h5>
                                <!--Descripcion-->
                                <p class='card-text'><small class='text-body-secondary'>Fecha de la publicacion: ".$row[13]."</small></p>
                            </div>
                            </div>
                        </div>
                        <div class='card'>
                          <div class='card-header' align='left'>
                            <blockquote class='blockquote mb-0'>
                                <strong>Detalles</strong>: ".$row[11]."
                            </blockquote>

                          </div>
                          <div class='card-body' align='left'>
                            
                                <p class='card-text'><strong>Peso</strong>: ".$row[10]."</p>
                                <p class='card-text'><strong>Volumen</strong>: ".$row[9]."cm3 </p>
                                <p class='card-text'><strong>Provincia de Origen</strong>: ".$origen."</p>
                                <p class='card-text'><strong>Ciudad de origen</strong>: ".$row[4]."</p>
                                <p class='card-text'><strong>Direccion</strong>: ".$row[5]."</p>
                                <p class='card-text'><strong>Provincia de Destino</strong>: ".$destino."</p>
                                <p class='card-text'><strong>Ciudad del destino</strong>: ".$row[7]."</p>
                                <p class='card-text'><strong>Direccion del destino</strong>: ".$row[8]."</p>
                                <p class='card-text'><strong>Dueño de la publicacion</strong>: @$nombre</p>
                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                  Postularce
                                </button>
                                <a href='denunciarPublicacion.php'>
                                  <button type='button' class='btn btn-secondary' align='right'>
                                    Denunciar publicacion
                                  </button>
                                </a>
                          </div>
                        </div>
                      </div>
                      ";

                    //text area para dejar comentario (Hacer control para que solo salga si el usuario esta postulado)
                      echo  
                      "<div class='mb-3' style='max-width: 540px;' align='center'>
                        <h2 align='center'>¿Tienes una duda? Deja tu comentario</h2><br>
                        <form action='subirPostulacion.php' method='post'>
                          <input type='hidden' id='idPublicacion' name='idPublicacion' value='$publicacion'>
                          <textarea class='form-control' id='comentario' name='comentario' rows='3'></textarea>
                          <br>
                          <input type=submit class='btn btn-primary' value='Comentar'>
                        </form>

                      </div>";

                    echo"</div>
                    ";

                    //arranca modal aqui

                    echo"
                    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                      <div class='modal-dialog'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Postularce a la publicacion</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                          </div>
                          <div class='modal-body'>
                            <form action='subirPostulacion.php' method='post'>
                              <input type='hidden' id='idPublicacion' name='idPublicacion' value='$publicacion'>
                              <div class='container' align='center'>
                                Monto:   <input type='number' id='montoPostulacion' name='montoPostulacion' min='0' value='1'><br>
                              </div>
                              <br>
                              <div class='container' align='center'>
                                <label for='mensajePostulacion' align='center'>Comentario</label><br>
                                <textarea name='mensajePostulacion' id='mensajePostulacion' rows='4' cols='60'>
                                </textarea>
                              </div>
                              <br>
                              <div class='container' align='center'>
                                <input class='btn btn-primary' type='submit' value='Postularce'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                              </div>  
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>";
        }
      }
      include 'coneccion/cerrarConexion.php';
    ?>

    <div class="container" name="comentarios" style=" width: 650px; padding: 20px; border: 1px solid #ddd;" >
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
      include 'pie.html';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>