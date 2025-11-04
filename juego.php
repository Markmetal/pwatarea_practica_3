<?php
session_start();
$min = 1;
$max = 50;
$resultado = "";

if (!isset($_SESSION['numero_secreto'])) {
    $_SESSION['numero_secreto'] = rand($min, $max);
    $_SESSION['intentos'] = 0;
    $mensaje_juego = "¡Adivina un número entre $min y $max!";
} else {
    $mensaje_juego = "Juega otra vez (Intento #" . ($_SESSION['intentos'] + 1) . ")";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adivinanza'])) {
    $adivinanza = (int)$_POST['adivinanza'];
    $_SESSION['intentos']++;

    if ($adivinanza == $_SESSION['numero_secreto']) {
        $resultado = "🎉 ¡Correcto! Adivinaste el numero $adivinanza en " . $_SESSION['intentos'] . " intentos.";
        unset($_SESSION['numero_secreto']);
        unset($_SESSION['intentos']);
    } elseif ($adivinanza < $_SESSION['numero_secreto']) {
        $resultado = "⬆️ Muy bajo. ?";
    } else {
        $resultado = "⬇️ Muy alto. ?";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego de Adivinanzas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="header-principal">
        <h1>🎲 Juego de Adivinanzas</h1>
        <p><a href="index.php">← Volver al inicio</a></p>
    </header>
    
    <main class="contenedor-principal">
        <div class="card juego-card">
            <h2><?php echo $mensaje_juego; ?></h2>

            <?php if ($resultado): ?>
                <div class="alerta <?php echo (strpos($resultado, 'Éxito') !== false) ? 'alerta-success' : 'alerta-error'; ?>">
                    <?php echo $resultado; ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['numero_secreto'])): ?>
                <form method="POST" action="juego.php" class="form-juego">
                    <label for="adivinanza">Tu Número (<?php echo $min; ?>-<?php echo $max; ?>):</label>
                    <input type="number" id="adivinanza" name="adivinanza" min="<?php echo $min; ?>" max="<?php echo $max; ?>" required>
                    <button type="submit">Adivinar</button>
                </form>
            <?php else: ?>
                <form method="POST" action="juego.php">
                    <button type="submit" class="btn-reiniciar">¡Jugar de Nuevo!</button>
                </form>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>