<!DOCTYPE html>
<html lang="en">

<body>
    <!-- Contenido de todo el index-->
<div class="container-fluid" id="contenido">


<?php
include ('cabecera.php');
include('header.php');
include ('postulacion.php');
?>

<div class="row d-flex justify-content-center align-items-center my-3">
  <div class="col-auto">
  <a class="btn-publicar" href="crearPublicacion.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
        </svg>
        Publicar
    </a>
    
  </div>

  <div class="col-12 col-sm-8 col-md-6 d-none d-sm-flex justify-content-center">
    <select class="form-select me-2" id="origen" name="origen">
      <option value="*"> Origen</option>
      <option value="1">Origen 1</option>
      <option value="2">Origen 2</option>
    </select>

    <select class="form-select me-2" id="destino" name="destino">
      <option value="*"> Destino</option>
      <option value="1">Destino 1</option>
      <option value="2">Destino 2</option>
    </select>

    <input type="text" class="form-control me-2" id="peso" name="peso" placeholder="Ingrese peso">
    
    <button type="button" class="btn btnConfirmar">Filtrar</button>
  </div>

  <div class="col-12 d-sm-none">
    <button class="btn btn-toggle w-100" data-bs-toggle="collapse" data-bs-target="#filterMenu" aria-expanded="false" aria-controls="filterMenu">
      Filtros
    </button>
    <div class="collapse" id="filterMenu">
      <select class="form-select my-2" id="origen-mobile" name="origen">
        <option value="*"> Origen</option>
        <option value="1">Origen 1</option>
        <option value="2">Origen 2</option>
      </select>

      <select class="form-select my-2" id="destino-mobile" name="destino">
        <option value="*"> Destino</option>
        <option value="1">Destino 1</option>
        <option value="2">Destino 2</option>
      </select>

      <input type="text" class="form-control my-2" id="peso-mobile" name="peso" placeholder="Ingrese peso">
      
      <button type="button" class="btn btnConfirmar w-100">Filtrar</button>
    </div>
  </div>
</div>


  
    <!-- publicacionesDestacadas(3 de usuarios mejores puntuados)-->

    <div class="row d-flex justify-content-center align-items-center">
    <?php
require 'conexion.php'; 

try {
    $query = "SELECT *
              FROM publicacion
              ORDER BY pu_id DESC
              LIMIT 4";
    
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    $publicaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if ($publicaciones) {
        foreach ($publicaciones as $publicacion) {
            //nombres de origen y destino 
            $stmt_origen = $pdo->prepare("SELECT provincia FROM argentina WHERE arg_id = :origen_id");
            $stmt_destino = $pdo->prepare("SELECT provincia FROM argentina WHERE arg_id = :destino_id");
            
            // nombre de origen
            $stmt_origen->bindParam(':origen_id', $publicacion['pu_fk_origen'], PDO::PARAM_INT);
            $stmt_origen->execute();
            $origen = $stmt_origen->fetchColumn();

            // nombre del destino
            $stmt_destino->bindParam(':destino_id', $publicacion['pu_fk_destino'], PDO::PARAM_INT);
            $stmt_destino->execute();
            $destino = $stmt_destino->fetchColumn();

            ?>
            <div class="col-12 col-md-6 col-lg-3 mb-1 d-flex justify-content-center">
                <div class="card" style="width: 100%;"> 
                    <img src="<?php echo $publicacion['pu_foto']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Publicación #<?php echo $publicacion['pu_id']; ?></h5>
                        <p class="card-text text-center" style="font-size:12px">Origen: <?php echo $origen ? $origen : 'Desconocido'; ?> - Destino: <?php echo $destino ? $destino : 'Desconocido'; ?></p>
                        <div class="d-flex justify-content-between"> 
                        <a href="publicacion.php?id=<?php echo $publicacion['pu_id']; ?>" class="btn btn-outline-primary">Ver Más</a>

                        
                                <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" href="postulacion.php">Postularse</a>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "No se encontraron publicaciones.";
    }
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}
// el pdo se cierra automáticamente al final del script.

?>


<!--Fin pubDestacadas-->



    <!-- publicacionesRecientes(ultimas 5)-->
<div id="pubRecientes" class="row d-flex justify-content-center align-items-center">


<div class="card d-flex flex-row " style="height: 100%;">
  <img src="https://cdn.pixabay.com/photo/2015/12/22/04/00/photo-1103595_1280.png" alt="" class="card-img-left" style="width: 200px; height: auto; object-fit: cover;"> 
  <div class="card-body d-flex flex-column">
    <div class="flex-grow-1">
      <h5 class="card-title">Titulo</h5>
      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore culpa alias dolores expedita quo consequatur pariatur facere dignissimos cupiditate, autem placeat temporibus enim quasi nulla modi amet quas sapiente nemo!</p>
    </div>
    <div class="ms-auto"> 
      <a href="#" class="btn btn-outline-info">Postularme</a> 
    </div>
  </div>
</div>

<div class="card d-flex flex-row " style="height: 100%;">
  <img src="https://cdn.pixabay.com/photo/2015/12/22/04/00/photo-1103595_1280.png" alt="" class="card-img-left" style="width: 200px; height: auto; object-fit: cover;"> 
  <div class="card-body d-flex flex-column">
    <div class="flex-grow-1">
      <h5 class="card-title">Titulo</h5>
      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore culpa alias dolores expedita quo consequatur pariatur facere dignissimos cupiditate, autem placeat temporibus enim quasi nulla modi amet quas sapiente nemo!</p>
    </div>
    <div class="ms-auto"> 
      <a href="#" class="btn btn-outline-info">Postularme</a> 
    </div>
  </div>
</div>
<div class="card d-flex flex-row " style="height: 100%;">
  <img src="https://cdn.pixabay.com/photo/2015/12/22/04/00/photo-1103595_1280.png" alt="" class="card-img-left" style="width: 200px; height: auto; object-fit: cover;"> 
  <div class="card-body d-flex flex-column">
    <div class="flex-grow-1">
      <h5 class="card-title">Titulo</h5>
      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore culpa alias dolores expedita quo consequatur pariatur facere dignissimos cupiditate, autem placeat temporibus enim quasi nulla modi amet quas sapiente nemo!</p>
    </div>
    <div class="ms-auto"> 
      <a href="#" class="btn btn-outline-info">Postularme</a> 
    </div>
  </div>
</div>
<div class="card d-flex flex-row " style="height: 100%;">
  <img src="https://cdn.pixabay.com/photo/2015/12/22/04/00/photo-1103595_1280.png" alt="" class="card-img-left" style="width: 200px; height: auto; object-fit: cover;"> 
  <div class="card-body d-flex flex-column">
    <div class="flex-grow-1">
      <h5 class="card-title">Titulo</h5>
      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore culpa alias dolores expedita quo consequatur pariatur facere dignissimos cupiditate, autem placeat temporibus enim quasi nulla modi amet quas sapiente nemo!</p>
    </div>
    <div class="ms-auto"> 
      <a href="#" class="btn btn-outline-info">Postularme</a> 
    </div>
  </div>
</div>
<div class="card d-flex flex-row " style="height: 50%;">
  <img src="https://cdn.pixabay.com/photo/2015/12/22/04/00/photo-1103595_1280.png" alt="" class="card-img-left" style="width: 200px; height: auto; object-fit: cover;"> 
  <div class="card-body d-flex flex-column">
    <div class="flex-grow-1">
      <h5 class="card-title">Titulo</h5>
      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore culpa alias dolores expedita quo consequatur pariatur facere dignissimos cupiditate, autem placeat temporibus enim quasi nulla modi amet quas sapiente nemo!</p>
    </div>
    <div class="ms-auto"> 
      <a href="#" class="btn btn-outline-info">Postularme</a> 
    </div>
  </div>
</div>



</div>

<?php
include('pie.php');
?>

</div>



</div>



</body>
</html>