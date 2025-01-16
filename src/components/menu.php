<?php
session_start();
require_once './config.php';
$current_page = basename($_SERVER['PHP_SELF']);
$usuario = $_SESSION['usuario'] ?? null; // Verifica si el usuario está en sesión
?>

<section class="menu">
    <nav>
        <ul>
            <li><a href="<?= BASE_URL ?>/index.php"
                    class="<?= $current_page == 'index.php' ? 'active' : '' ?>">Inicio</a></li>
            <li><a href="<?= BASE_URL ?>/src/views/alojamientos.php"
                    class="<?= $current_page == 'alojamientos.php' ? 'active' : '' ?>">Alojamientos</a></li>

            <?php if ($usuario && $usuario['estado'] === 'activo'): ?>
                <!-- Usuario activo -->
                <li><a href="<?= BASE_URL ?>/src/views/user.php"
                        class="<?= $current_page == 'user.php' ? 'active' : '' ?>">Perfil</a></li>
                <li><a href="<?= BASE_URL ?>/src/controllers/logout.php">Cerrar Sesión</a></li>
            <?php else: ?>
                <!-- Usuario inactivo o no iniciado -->
                <li><a href="<?= BASE_URL ?>/src/views/login.php"
                        class="<?= $current_page == 'login.php' || $current_page == 'register.php' ? 'active' : '' ?>">
                        <?= $current_page == 'register.php' ? 'Registro' : 'Iniciar Sesión' ?>
                    </a></li>
            <?php endif; ?>
        </ul>
    </nav>
</section>