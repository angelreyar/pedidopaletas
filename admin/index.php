<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Paletería</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>Administración de la Paletería</h1>
        <nav>
            <ul>
                <li><a href="insert.php">Agregar Paleta</a></li>
                <li><a href="view.php">Ver Paletas</a></li>
                <li><a href="delete.php">Eliminar Paleta</a></li>
                <li><a href="update.php">Actualizar Paleta</a></li>
                <li><a href="view_orders.php">Ver Órdenes</a></li
