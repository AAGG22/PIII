<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="publicacionesEstilo.css">
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
            <button class="btn btn-outline-success" type="submit" name="filtro">Buscar</button>
          </form>
      </div>
    </nav>
    <!--Buscador-->
    <br><br>
      <div class="container" align="center">
        <form action="buscador.php" method="get">
          <!--Origenr-->
          Origen: <select name="origen" id="origen">
                    <option value="*">Cualquiera</option>
                    <?php
                      include 'coneccion/conexionDB.php';

                      $sql = "SELECT * FROM argentina";
                      $resultado=mysqli_query($conn,$sql);
                      if(mysqli_num_rows($resultado)>0){
                        while($row=mysqli_fetch_row($resultado)){
                          echo "<option value='".$row[0]."'>".$row[1]."</option>";
                        }
                      }
                      
                    ?>
                  </select>
          <!--Destino-->              
          Destino: <select name="destino" id="destino">
                    <option value="*">Cualquiera</option>
                    <?php
                      $sql = "SELECT * FROM argentina";
                      $resultado=mysqli_query($conn,$sql);
                      if(mysqli_num_rows($resultado)>0){
                        while($row=mysqli_fetch_row($resultado)){
                          echo "<option value='".$row[0]."'>".$row[1]."</option>";
                        }
                      }
                      include 'coneccion/cerrarConexion.php';
                    ?>
                  </select>
          <!--Peso: <input type="number" name="peso" id="peso">-->  
          <input class="btn btn-primary" type="submit" value="Buscar" name="buscar">
        </form>
      </div>

      <br><br>
      <!--Publicaciones-->
      
      <?php
        include 'coneccion/conexionDB.php';
        extract($_GET);
        //si no se ha apretado el boton de busqueda arranca aqui y muestra todo
        if(!isset($buscar)){
        $sql="SELECT * FROM publicacion";
        //inserta echoPublicaciones que contiene las consultas SQL para imprimir las publicaciones
        include 'echoPublicaciones.php';
      }else{
        //Si se ha apretado el boton de busqueda ejecuta lo siguiente
        if($origen!="*"&&$destino=="*"){
          $sql= "SELECT * FROM publicacion WHERE pu_fk_origen=".$origen;
          include 'echoPublicaciones.php';
        }
        if($origen=="*"&&$destino!="*"){
          $sql= "SELECT * FROM publicacion WHERE pu_fk_destino=".$destino;
          include 'echoPublicaciones.php';
        }
        if($origen!="*"&&$destino!="*"){
          $sql= "SELECT * FROM publicacion WHERE pu_fk_destino=".$destino AND "pu_fk_origen=".$origen;
          include 'echoPublicaciones.php';
        }
        if($origen==="*"&&$destino==="*"){
          $sql="SELECT * FROM publicacion";
          include 'echoPublicaciones.php';
        }
      }
        include 'coneccion/cerrarConexion.php';
      ?>
      <div class="container" align="center">
        


        <!--Paginacion-->
        <ul class="pagination justify-content-end">
          <li class="page-item disabled">
            <a class="page-link">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>

      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>