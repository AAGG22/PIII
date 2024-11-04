
<body>
   
   <br><br>
   
   

   <br><br>
   <!--Publicaciones-->
   <?php
     

     // Control de variables y sanitización
     $origen = isset($_POST['origen']) && $_POST['origen'] !== '*' ? $_POST['origen'] : null;
     $destino = isset($_POST['destino']) && $_POST['destino'] !== '*' ? $_POST['destino'] : null;
     $peso = isset($_POST['peso']) && $_POST['peso'] !== "*" ? (int)$_POST['peso'] : "*";

     if (!isset($_POST['buscar'])) {
       
         $sql = "SELECT * FROM publicacion";
         $stmt = $pdo->query($sql);
         $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
         include 'echoPublicaciones.php';

     } else {

         // Construcción de la consulta SQL con condiciones dinámicas
         $sql = "SELECT * FROM publicacion WHERE 1=1";

         // Uso de consultas preparadas para filtrar por origen, destino y peso
         $params = [];

         if ($origen !== null) {
             $sql .= " AND pu_fk_origen = :origen";
             $params[':origen'] = $origen;
         }

         if ($destino !== null) {
             $sql .= " AND pu_fk_destino= :destino";
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

         $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Obtener los resultados
         include 'echoPublicaciones.php';
     }

     

   ?>
   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 </body>
</html>