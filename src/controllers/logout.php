<?php
// Iniciar la sesión
session_start();

// Incluir la configuración para la conexión a la base de datos
require_once './../../config.php';

// Verificar si hay una sesión activa con un usuario logueado
if (isset($_SESSION['usuario']['id'])) {
    $usuario_id = $_SESSION['usuario']['id'];

    try {
        // Cambiar el estado del usuario a "inactivo" en la base de datos
        $sql = "UPDATE usuario SET estado = 'inactivo' WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $usuario_id);
        $stmt->execute();
    } catch (PDOException $e) {
        // Manejar errores de la base de datos (opcional)
        error_log("Error al actualizar el estado del usuario: " . $e->getMessage());
    }
}

// Eliminar las variables de sesión y destruir la sesión
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión

// Redirigir al usuario a la página principal o inicio de sesión
header("Location: ../../index.php");
exit();
