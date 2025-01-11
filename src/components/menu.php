<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<section class="menu">
    <nav>
        <ul>
            <li><a href="index.php" class="<?= $current_page == 'index.php' ? 'active' : '' ?>">Inicio</a></li>
            <li><a href="../src/views/alojamientos.php" class="<?= $current_page == '../src/views/alojamientos.php' ? 'active' : '' ?>">Alojamientos</a></li>
            <li><a href="../src/views/login.php" class="<?= $current_page == '../src/views/login.php' || $current_page == '../src/views/register.php' ? 'active' : '' ?>">
                <?= $current_page == '../src/views/register.php' ? 'Registro' : 'Iniciar Sesión' ?>
            </a></li>
        </ul>
    </nav>
</section>