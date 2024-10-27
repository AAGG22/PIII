<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buscador VeryDeli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="publicacionesEstilo.css">
  </head>
  <body>
    <?php
        include 'cabecera.html';
    ?>
    <br><br>
    <!--Buscador-->
    <div class="container" align="center">
      <form action="buscador.php" method="get">
        <!-- Origen -->
        Provincia de origen: 
        <select name="origen" id="origen">
          <option value="*">Cualquiera</option>
          <?php
            include 'coneccion/conexionPDO.php';
            $sql = "SELECT * FROM argentina";
            $stmt = $pdo->query($sql);  // Ejecución de la consulta
            $resultado = $stmt->fetchAll(PDO::FETCH_NUM);  // Obtener los resultados en formato numérico

            if ($resultado) {
              foreach ($resultado as $row) {
                echo "<option value='".$row[0]."'>".$row[1]."</option>";
              }
            }
          ?>
        </select>

        <!-- Destino -->              
        Provincia de destino: 
        <select name="destino" id="destino">
          <option value="*">Cualquiera</option>
          <?php
            $sql = "SELECT * FROM argentina";
            $stmt = $pdo->query($sql);
            $resultado = $stmt->fetchAll(PDO::FETCH_NUM);

            if ($resultado) {
              foreach ($resultado as $row) {
                echo "<option value='".$row[0]."'>".$row[1]."</option>";
              }
            }
          ?>
        </select>
        <!-- Peso --> 
        Peso: 
        <select name="peso" id="peso">
          <option value="*">Todos</option>
          <option value="15">Menos de 15kg</option>
          <option value="16">Más de 15kg</option>      
        </select>
        <input class="btn btn-primary" type="submit" value="Buscar" name="buscar">
      </form>
    </div>

    <br><br>
    <!--Publicaciones-->
    <?php
      

      // Control de variables y sanitización
      $origen = isset($_GET['origen']) && $_GET['origen'] !== '*' ? $_GET['origen'] : null;
      $destino = isset($_GET['destino']) && $_GET['destino'] !== '*' ? $_GET['destino'] : null;
      $peso = isset($_GET['peso']) && $_GET['peso'] !== "*" ? (int)$_GET['peso'] : "*";

      if (!isset($_GET['buscar'])) {
        
          $sql = "SELECT * FROM publicacion";
          $stmt = $pdo->query($sql);
          $resultado = $stmt->fetchAll(PDO::FETCH_NUM);
          include 'echoPublicaciones.php';

      } else {

          // Construcción de la consulta SQL con condiciones dinámicas
          $sql = "SELECT * FROM publicacion WHERE 1=1";

          // Uso de consultas preparadas para filtrar por origen, destino y peso
          $params = [];

          if ($origen !== null) {
              $sql .= " AND pu_fk_origen_provincia = :origen";
              $params[':origen'] = $origen;
          }

          if ($destino !== null) {
              $sql .= " AND pu_fk_destino_provincia = :destino";
              $params[':destino'] = $destino;
          }

          if ($peso !== "*") {
            if ($peso == 15) {
                $sql .= " AND pu_peso <= 15";
            } elseif ($peso == 16) {
                $sql .= " AND pu_peso > 15";
            }
        }

          $stmt = $pdo->prepare($sql);  // Preparar la consulta
          $stmt->execute($params);  // Ejecutar con los parámetros

          $resultado = $stmt->fetchAll(PDO::FETCH_NUM);  // Obtener los resultados
          include 'echoPublicaciones.php';
      }

      include 'coneccion/cerrarConexionPDO.php';

      include 'pie.html';
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>