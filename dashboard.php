<?php
session_start();
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header('Location: login.php');
    exit();
}
$usuarios= $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
   <margin 50px; style="background-color: #5b17d0ff;">

    <div class="dashboard-container card">
        <h1>👋 Bienvenido, <?php echo htmlspecialchars($usuario); ?>!</h1>
        <p><h2>Has accedido correctamente al área de prueva de Marco Vinicio Chochos Astudillo</h2></p>
        <p><h3>en este campo solo encontraras contenido de estudio</h3></p>
        <a href="logout.php" class="btn-logout">Cerrar Sesión</a>
    </div>
</body>
</html>