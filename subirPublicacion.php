<?php

$conexion = include('conexion.php'); 

$titulo = $_POST['titulo'];
$volumen = $_POST['volumen'];
$peso = $_POST['peso'];
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$descripcion = $_POST['descripcion'];
$imagen = '';//lo dejo vacio por si no sube foto

if (isset($_FILES['imagen'])) {//tomo datos del archivo para poder hacer controles despues
    $foto = $_FILES['imagen'];
    $nombre = $foto['name'];
    $tipo = $foto['type'];
    $ruta = $foto['tmp_name'];
    $size = $foto['size'];
    $dimensiones = getimagesize($ruta);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "foto/";

    
    $allowed_types = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];//controlo que sea una imagen y no otro tipo
    if (!in_array($tipo, $allowed_types)) {
        echo "error, el archivo no es imagen";
        exit;
    } else if ($size > 3 * 1024 * 1024) {//controlo que no supere el tamaño
        echo "error: el tamaño maximo permitido es de 3MB";
        exit;
    } else {
        $src = $carpeta . $nombre;
        move_uploaded_file($ruta, $src);
        $imagen = "foto/" . $nombre;
    }
}


try {
    $stmt = $pdo->prepare("INSERT INTO `publicacion`(`volumen`, `peso`, `fk_origen`, `fk_destino`, `estado`, `descripcion`, `imagen`) VALUES (:volumen, :peso, :origen, :destino, 'activa', :descripcion, :imagen)");//preparo la consulta
    $stmt->bindParam(':volumen', $volumen);//relaciono parametros para aumentar la seguridad al ingresar datos a la BD
    $stmt->bindParam(':peso', $peso);
    $stmt->bindParam(':origen', $origen);
    $stmt->bindParam(':destino', $destino);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':imagen', $imagen);
    
    $stmt->execute();

    header('Location: index.php');//vuelvo a la pagina principal
    exit;

} catch (PDOException $e) {
    echo "Error al insertar datos: " . $e->getMessage();
}
?>
