<?php
session_start();
include 'usuarios.php'; 

$error_msg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($usuarios_validos[$username]) && $usuarios_validos[$username] === $password) {
        $_SESSION['autenticado'] = true;
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit();
    } else {
        $error_msg = '❌Incorrecto. Intente de nuevo.';
    }
}
if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {
    header('Location: dashborad.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login del Sistema</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="body-login">
    <div class="login-container card">
        <h2>🔐 Iniciar Sesión</h2>
        <p><a href="index.php">← Volver al inicio</a></p>

        <?php if ($error_msg): ?>
            <div class="alerta alerta-error"><?php echo $error_msg; ?></div>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Acceder</button>
        </form>
        <p class="nota-login">usuario: admin     /     contraseña: 1234</p>
    </div>
</body>
</html>