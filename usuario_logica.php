<?php
// Incluir archivo de conexión a la base de datos
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $userName = $_POST['userName'];
    $pwd = password_hash($_POST['pwd'], PASSWORD_BCRYPT); // Hashear la contraseña
    $email = $_POST['email'];
    $vehiculo = $_POST['vehiculo'];



    try {
        // Preparar la consulta SQL
        $sql = "INSERT INTO usuario (u_nombre, u_apellido, u_userName, u_pwd, u_email, u_vehiculo) 
                VALUES (:nombre, :apellido, :userName, :pwd, :email, :vehiculo)";
        
        // Preparar la declaración
        $stmt = $pdo->prepare($sql);
        
        // Bind de los parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':userName', $userName);
        $stmt->bindParam(':pwd', $pwd);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':vehiculo', $vehiculo);

        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            //echo "Usuario guardado correctamente.";
            header("Location: pag4.php");
        } else {
            echo "Error al guardar el usuario.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
