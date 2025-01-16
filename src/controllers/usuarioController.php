<?php

session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['estado'] !== 'activo') {
    header('Location: ../views/login.php');
    exit;
}
?>