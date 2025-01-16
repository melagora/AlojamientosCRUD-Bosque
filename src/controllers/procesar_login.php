<?php
session_start(); // Iniciar sesión

require_once './../../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $correo = trim($_POST['correo']);
    $contrasena = trim($_POST['contrasena']);

    try {
        // Consulta SQL para obtener los datos del usuario
        $sql = "SELECT id, nombre, contrasena, estado FROM usuario WHERE correo = :correo";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Comparar las contraseñas directamente (mejorar con hash en producción)
            if ($contrasena === $usuario['contrasena']) {
                // Verificar si el estado es inactivo y actualizarlo
                if ($usuario['estado'] === 'inactivo') {
                    $updateSql = "UPDATE usuario SET estado = 'activo' WHERE id = :id";
                    $updateStmt = $pdo->prepare($updateSql);
                    $updateStmt->bindParam(':id', $usuario['id']);
                    $updateStmt->execute();
                }

                // Guardar datos en la sesión
                $_SESSION['usuario'] = [
                    'id' => $usuario['id'],
                    'nombre' => $usuario['nombre'],
                    'estado' => 'activo',
                ];

                // Redirigir al perfil del usuario
                echo "<script>
                    alert('Inicio de sesión exitoso. ¡Bienvenido, " . htmlspecialchars($usuario['nombre']) . "!');
                    window.location.href = '../../index.php';
                </script>";
            } else {
                // Contraseña incorrecta
                echo "<script>
                    alert('La contraseña es incorrecta.');
                    window.location.href = '../views/login.php';
                </script>";
            }
        } else {
            // Usuario no encontrado
            echo "<script>
                alert('Usuario no encontrado.');
                window.location.href = '../views/login.php';
            </script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
