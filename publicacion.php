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
      <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="https://cdn.pixabay.com/photo/2016/04/22/17/36/wooden-v-1346205_1280.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            VeryDeli
          </a>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Buscar publicacion" aria-label="Buscar publicacion">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
      </nav>
    <!--<h1 align="center">Publicacion de delivery</h1> Php con el nombre de la publicacion-->
    <!--Atributos publicacion: ID, Volumen, Peso, Origen, Destino, Estado, Descripcion-->
    <?php
      include 'coneccion/conexionDB.php';
      extract($_GET);
      $sql="SELECT * FROM publicacion WHERE pu_id=".$publicacion;
      $resultado=mysqli_query($conn,$sql);
      if(mysqli_num_rows($resultado)>0){
        while($row = mysqli_fetch_row($resultado)){

          $sql="SELECT * FROM usuario WHERE u_id=".$row[1];
          $resultadoNombre=mysqli_query($conn,$sql);

          if(mysqli_num_rows($resultadoNombre)>0){
            while(($rowNombre=mysqli_fetch_row($resultadoNombre))>0){
              $nombre=$rowNombre[3];
            }
          }
          echo "
                    <div class='container' align='center'>
                      <div class='card mb-3' style='max-width: 540px;'>
                        <div class='row g-0'>
                            <div class='col-md-4'>
                            <img src='depositphotos_11506024-stock-photo-package.jpg' class='img-fluid rounded-start' alt='...'>
                            </div>
                            <div class='col-md-8'>
                            <div class='card-body'>
                                <h5 class='card-title' id='tituloPublicacion'>".$row[2]."</h5>
                                <!--Descripcion-->
                                <p class='card-text'><small class='text-body-secondary'>Fecha de la publicacion : dd-mm </small></p>
                            </div>
                            </div>
                        </div>
                        <div class='card'>
                          <div class='card-header' align='left'>
                            <blockquote class='blockquote mb-0'>
                                <strong>Detalles</strong>: ".$row[7]."
                            </blockquote>
                            <blockquote class='blockquote mb-0'>
                                <strong>Comentario</strong>: ".$row[8]."
                            </blockquote>
                          </div>
                          <div class='card-body' align='left'>
                            
                                <p class='card-text'><strong>Peso</strong>: ".$row[6]."</p>
                                <p class='card-text'><strong>Volumen</strong>: ".$row[5]."cm3 </p>
                                <p class='card-text'><strong>Origen</strong>: ".$row[3]."</p>
                                <p class='card-text'><strong>Destino</strong>: ".$row[4]."</p>
                                <p class='card-text'><strong>Dueño</strong>: @$nombre</p>
                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                  Postularce
                                </button>
                                <a href='buscador.php'>
                                  <button type='button' class='btn btn-primary'>
                                    Volver al buscador
                                  </button>
                                </a>
                          </div>
                        </div>
                      </div>
                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>