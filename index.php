<?php
$mensaje_envio = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_type']) && $_POST['form_type'] == 'contacto') {

    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    if (!empty($nombre) && !empty($email) && !empty($mensaje)) {
        $mensaje_envio = "✅ ¡Gracias, $nombre! Mensaje enviado exitosamente.";
    } else {
        $mensaje_envio = "❌ Error: Todos los campos son requeridos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>twatarea_practica_3</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="header-principal">
        <h1>🚀 DIGITAL SERVICES CON "IA"</h1>
        <p><h3>La "IA" al alcanse de tus manos</h3></p>
    </header>
    
    <nav class="dropdown-menu">
        <ul>
            <li><a href="index.php">🏠 Inicio</a></li>
            <li class="menu-item-desplegable">
                <a href="#">📋 Ejercicios</a>
                <ul class="submenu">
                    <li><a href="usuarios.php">Contacto</a></li>
                    <li><a href="juego.php">Adivinanzas</a></li>
                    <li><a href="galeria.php">Galería</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </li>
            <li><a href="#contacto">📧 Contacto</a></li>
            <li><a href="#visitas">📊 Visitas</a></li>
        </ul>
    </nav>
    
    <main class="contenedor-principal">
        
        <section class="seccion" id="contacto">
            <h2>📧 Formulario de Contacto</h2>
            <div class="card">
                <p>Formulario de contacto</p>
                
                <?php if (!empty($mensaje_envio)): ?>
                    <div class="alerta <?php echo (strpos($mensaje_envio, '✅') !== false) ? 'alerta-success' : 'alerta-error'; ?>">
                        <?php echo $mensaje_envio; ?>
                    </div>
                <?php endif; ?>

                <form id="contactForm" action="index.php" method="POST">
                    <input type="hidden" name="form_type" value="contacto">

                    <label for="nombre">Nombre y Apellido:</label>
                    <input type="text" id="nombre" name="nombre" required>

                    <label for="email">email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="mensaje">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" required></textarea>

                    <button type="submit" id="submitBtn">Enviar</button>
                    <div id="validationMessage" class="mensaje-validacion"></div>
                </form>
            </div>
        </section>

        <hr>

        <section class="seccion" id="visitas">
            <h2>📊 Numero de Visitas</h2>
            <div class="card contador-card">
                <?php include 'contador.php'; 
                ?>
                <p><h2>Has visitado esta página:</h2></p>
                <div class="contador-display">
                    <?php echo $visitas; ?>
                </div>
                <p><h2>veces.</h2></p>
            </div>
        </section>

    </main>

    <script src="script.js"></script>
</body>
</html>