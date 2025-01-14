<?php

require_once './../../config.php';

function obtenerAlojamientos() {
    global $pdo;
    $query = "SELECT nombre, descripcion, ubicacion, precio FROM alojamiento";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
