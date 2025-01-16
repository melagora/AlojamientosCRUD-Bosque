<?php
// Incluir el archivo de configuración para la conexión a la base de datos
require_once './../../config.php';

// Iniciar la sesión
session_start();

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos enviados desde el formulario
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $contrasena = trim($_POST['password']); // Contraseña del formulario tal cual

    // Otros datos a insertar en la base de datos
    $tipo = 'usuario';
    $fecha_registro = date('Y-m-d H:i:s');
    $estado = 'activo';

    try {
        // Insertar datos en la base de datos
        $sql = "INSERT INTO usuario (nombre, correo, contrasena, tipo, telefono, fecha_registro, estado)
                VALUES (:nombre, :correo, :contrasena, :tipo, :telefono, :fecha_registro, :estado)";
        
        $stmt = $pdo->prepare($sql);

        // Vincular parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contrasena', $contrasena); // Guardar contraseña sin hash
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        $stmt->bindParam(':estado', $estado);

        // Ejecutar y comprobar si se insertó correctamente
        if ($stmt->execute()) {
            // Guardar información del usuario en la sesión
            $_SESSION['usuario'] = [
                'id' => $pdo->lastInsertId(),
                'nombre' => $nombre,
                'correo' => $correo,
                'tipo' => $tipo,
                'estado' => $estado,
            ];

            // Redirigir al perfil del usuario con un mensaje de éxito
            echo "<script>
                    alert('Registro exitoso. ¡Bienvenido, " . htmlspecialchars($nombre) . "!');
                    window.location.href = '../../index.php';
                  </script>";
            exit;
        } else {
            echo "<script>
                    alert('Ocurrió un error al registrar tu cuenta. Inténtalo de nuevo.');
                    window.location.href = '../views/register.php';
                  </script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
