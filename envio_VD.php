<?php

session_start();

include "cabecera.php";

// Verificar que el usuario esté logueado como solicitante

/* if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
} */

if (!isset($_SESSION['user_id'])) {
    header("Location: loguin_formulario.php");
    exit;
}

// Conexión a la base de datos
/* $host = "localhost";
$dbname = "calificacion";
$username = "user_vuelos";
$password = "030817Fs"; */

$host = 'localhost';
$dbname = 'verydeli_verydeli';
$username = "user_vuelos";
$password = "030817Fs";
/* $username = 'root'; 
$password = ''; */ 

$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar que el id_publicacion esté presente en la URL
//id_publicaion=> publicacion_id y id_usuario=>user_id
if (isset($_GET['publicacion_id'])) {
    $id_publicacion = $_GET['publicacion_id'];
    $id_postulante = $_SESSION['user_id'];// Usuario logueado como postulante
    

    // Consulta para obtener detalles de la publicación
    /* $sql = "SELECT * FROM publicacion WHERE id_publicacion = ?"; */
    $sql = "SELECT * FROM publicacion WHERE pu_id = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Error en la consulta de la publicación: " . $conn->error);
    }

    $stmt->bind_param("i", $id_publicacion);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $publicacion = $result->fetch_assoc();
        echo "<h1>Detalles de la Publicación</h1>";
        echo "<p>Origen: " . htmlspecialchars($publicacion['pu_fk_origen']) . "</p>";
        echo "<p>Destino: " . htmlspecialchars($publicacion['pu_fk_destino']) . "</p>";
        echo "<p>Descripción: " . htmlspecialchars($publicacion['pu_descripcion']) . "</p>";
        echo "<p>Volumen: " . htmlspecialchars($publicacion['pu_volumen']) . "</p>";
        echo "<p>Peso: " . htmlspecialchars($publicacion['pu_peso']) . "</p>";

        // Formulario para marcar como "Retirado"
        echo '<form action="" method="post">';
        echo '<input type="hidden" name="id_publicacion" value="' . htmlspecialchars($id_publicacion) . '">';
        echo '<input type="hidden" name="accion" value="retirado">';
        echo '<input type="submit" value="Retirado">';
        echo '</form>';

        // Formulario para marcar como "Entregado"
        echo '<form action="" method="post">';
        echo '<input type="hidden" name="id_publicacion" value="' . htmlspecialchars($id_publicacion) . '">';
        echo '<input type="hidden" name="accion" value="entregado">';
        echo '<input type="submit" value="Entregado">';
        echo '</form>';
    } else {
        echo "No se encontró la publicación.";
    }

    $stmt->close();
} else {
    echo "No se seleccionó ninguna publicación.";
    exit;
}

// Manejo de acciones cuando se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_publicacion'])) {
    $id_publicacion = $_POST['id_publicacion'];
    $accion = $_POST['accion'];
    $id_postulante = $_SESSION['user_id'];

    // Obtener el id del solicitante basado en el id_publicacion
    $id_solicitante = obtenerIdSolicitante($id_publicacion, $conn);

    if ($accion === 'retirado') {
        // Guardar en la tabla envio como "pendiente"
        $sql = "INSERT INTO envio (env_id_solicitante,env_id_postulante, env_fecha_envio, env_estado, env_id_publicacion)
                VALUES (?, ?, NOW(), 'pendiente', ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Error en la preparación de la consulta de retiro: " . $conn->error);
        }

        $stmt->bind_param("iii", $id_solicitante, $id_postulante, $id_publicacion);

        if ($stmt->execute()) {
            echo "<p>El pedido ha sido marcado como retirado (pendiente).</p>";
        } else {
            echo "Error al guardar el retiro: " . $conn->error;
        }
    } elseif ($accion === 'entregado') {
        // Mostrar los valores de id_publicacion, id_postulante, y estado
        echo "Debug: id_publicacion = $id_publicacion, id_postulante = $id_postulante, estado = 'pendiente'<br>";
       
        // Cambiar estado a "entregado" en envio
        $sql = "UPDATE envio SET env_estado = 'entregado', env_fecha_envio = NOW() 
                WHERE env_id_publicacion = ? AND env_id_postulante = ? AND env_estado = 'pendiente'";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Error en la preparación de la consulta de entrega: " . $conn->error);
        }
        
        // Vincular parámetros y ejecutar el UPDATE
        $stmt->bind_param("ii", $id_publicacion, $id_postulante);

        if ($stmt->execute()) {

            // Verificar si el UPDATE afectó alguna fila
            if ($stmt->affected_rows === 0) {
                die("Error: No se pudo actualizar el estado a 'entregado'. Verifica que el registro exista y tenga estado 'pendiente'.");
            }

            // Obtener el id_envio después de marcar como entregado
            $sql_envio = "SELECT env_id_envio FROM envio 
                          WHERE env_id_publicacion = ? AND env_id_postulante = ? AND env_estado = 'entregado'
                          ORDER BY env_fecha_envio DESC LIMIT 1";
            $stmt_envio = $conn->prepare($sql_envio);

            if (!$stmt_envio) {
                die("Error en la preparación de la consulta de id_envio: " . $conn->error);
            }

            $stmt_envio->bind_param("ii", $id_publicacion, $id_postulante);
            $stmt_envio->execute();
            $result_envio = $stmt_envio->get_result();

            if ($result_envio->num_rows > 0) {
                $envio = $result_envio->fetch_assoc();
                $id_envio = $envio['env_id_envio'];

                // Redirigir a la página de calificación sin pasar id_solicitante en la URL
                
                header("Location: calificacion_asolicitante.php?id_envio=" . $id_envio);
                header("Location: calificacion_VD.php?env_id_envio=" . $id_envio);//agregue para dirigir a 2 paginas
                exit;
            } else {
                die("No se encontró el id_envio después de la actualización.");
            }
        } else {
            die("Error al actualizar la entrega: " . $stmt->error);
        }
    }

    $stmt->close();
}

// Función para obtener el id del solicitante basado en id_publicacion
function obtenerIdSolicitante($id_publicacion, $conn) {
    $sql = "SELECT pu_fk_u_id FROM publicacion WHERE pu_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_publicacion);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $publicacion = $result->fetch_assoc();
        return $publicacion['pu_fk_u_id'];
    } else {
        return null;
    }
}


        
 include('pie.php');
        


// Cerrar conexión
$conn->close();
?>

