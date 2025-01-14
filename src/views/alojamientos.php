<?php

require_once '../../config.php';
$current_page = basename($_SERVER['PHP_SELF']);


// alojamientos.php
include __DIR__ . '/../controllers/alojamientoController.php';

$alojamientos = obtenerAlojamientos();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/stylesMenu.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/stylesAlojamientos.css">

    <title>Alojamientos</title>
</head>

<body>
    <?php include __DIR__ . '/../components/alojamientoController.php'; // Incluir el menú ?>
    <h1>Alojamientos Disponibles</h1>
    <div class="card-container">
        <?php foreach ($alojamientos as $alojamiento): ?>
            <div class="card">
                <h2><?= htmlspecialchars($alojamiento['nombre']) ?></h2>
                <p><?= htmlspecialchars($alojamiento['descripcion']) ?></p>
                <p><strong>Ubicación:</strong> <?= htmlspecialchars($alojamiento['ubicacion']) ?></p>
                <p class="price">$<?= htmlspecialchars(number_format($alojamiento['precio'], 2)) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>