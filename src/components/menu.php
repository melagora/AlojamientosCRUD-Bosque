<?php

require_once './config.php';
$current_page = basename($_SERVER['PHP_SELF']);

?>

<section class="menu">
    <nav>
        <ul>
            <li><a href="<?= BASE_URL ?>/index.php" class="<?= $current_page == 'index.php' ? 'active' : '' ?>">Inicio</a></li>
            <li><a href="<?= BASE_URL ?>/src/views/alojamientos.php" class="<?= $current_page == 'alojamientos.php' ? 'active' : '' ?>">Alojamientos</a></li>
            <li><a href="<?= BASE_URL ?>/src/views/login.php" class="<?= $current_page == 'login.php' || $current_page == 'register.php' ? 'active' : '' ?>">
                <?= $current_page == 'register.php' ? 'Registro' : 'Iniciar Sesión' ?>
            </a></li>
        </ul>
    </nav>
</section>

