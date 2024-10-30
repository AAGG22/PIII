<?php
    include 'coneccion/conexionPDO.php';
    //Control de que los datos estan ingresados
    try {

        if(isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_POST['peso']) && isset($_POST['volumen']) && isset($_POST['contactoDestino'])
        && isset($_POST['provinciaOrigen']) && isset($_POST['ciudadOrigen']) && isset($_POST['direccionOrigen'])
        && isset($_POST['provinciaDestino']) && isset($_POST['ciudadDestino']) && isset($_POST['direccionDestino'])) {

            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $peso = $_POST['peso'];
            $volumen = $_POST['volumen'];
            $contacto = $_POST['contactoDestino'];
            $provinciaOrigen = $_POST['provinciaOrigen'];
            $ciudadOrigen = $_POST['ciudadOrigen'];
            $direccionOrigen = $_POST['direccionOrigen'];
            $provinciaDestino = $_POST['provinciaDestino'];
            $ciudadDestino = $_POST['ciudadDestino'];
            $direccionDestino = $_POST['direccionDestino'];
            $fechaActual = new DateTime();
            $fechaFormateada = $fechaActual->format('Y-m-d H:i:s');
            $imagen = '';
            $idUsuario = 14;

            if(isset($_FILES['imagenPaquete'])){
                //tomo datos del archivo para poder hacer controles despues
                $foto = $_FILES['imagenPaquete'];
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
        
    
            $sql = "INSERT INTO publicacion
            (pu_fk_u_id, pu_titulo, pu_fk_origen_provincia, pu_fk_origen_ciudad, pu_fk_origen_direccion,
            pu_fk_destino_provincia, pu_fk_destino_ciudad, pu_fk_destino_direccion, pu_volumen, pu_peso,
            pu_descripcion, pu_fecha, pu_imagen)
            VALUES (:pu_fk_u_id, :pu_titulo, :pu_fk_origen_provincia, :pu_fk_origen_ciudad, :pu_fk_origen_direccion,
            :pu_fk_destino_provincia, :pu_fk_destino_ciudad, :pu_fk_destino_direccion, :pu_volumen, :pu_peso,
            :pu_descripcion, :pu_fecha, :pu_imagen)";
    
            $stmt = $pdo->prepare($sql);
    
            $stmt->bindParam(':pu_fk_u_id', $idUsuario);
            $stmt->bindParam(':pu_titulo', $titulo);
            $stmt->bindParam(':pu_descripcion', $descripcion);
            $stmt->bindParam(':pu_peso', $peso);
            $stmt->bindParam(':pu_volumen', $volumen);
            $stmt->bindParam(':pu_fk_origen_provincia', $provinciaOrigen);
            $stmt->bindParam(':pu_fk_origen_ciudad', $ciudadOrigen);
            $stmt->bindParam(':pu_fk_origen_direccion', $direccionOrigen);
            $stmt->bindParam(':pu_fk_destino_provincia', $provinciaDestino);
            $stmt->bindParam(':pu_fk_destino_ciudad', $ciudadDestino);
            $stmt->bindParam(':pu_fk_destino_direccion', $direccionDestino);
            $stmt->bindParam(':pu_fecha', $fechaFormateada);
            $stmt->bindParam(':pu_imagen', $imagen);
    
            if ($stmt->execute()) {
                echo "Archivo y datos guardados en la base de datos exitosamente.";
                include 'coneccion/cerrarConexionPDO.php';
                header('location: buscador.php');
                die();
            } else {
                echo "Hubo un problema al subir el archivo y los datos.";
                include 'coneccion/cerrarConexionPDO.php';
                header('location: buscador.php');
                die();
            }
        } else {
            echo "Faltan archivos para la publicacion";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>