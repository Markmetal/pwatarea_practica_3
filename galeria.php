<?php
$directorio_imagenes = 'imagenes/';

$imagenes = glob($directorio_imagenes . '*.{jpg,png,jpeg,gif,web}', GLOB_BRACE);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Galería</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="header-principal">
        <h1>🖼️Galería</h1>
        <p><a href="index.php">← Volver al inicio</a></p>
        
    </header>
    
    <main class="contenedor-principal">
        <p>Galeria de imagenes.</p>

        <div class="galeria">
            <?php
            if (count($imagenes) > 0) {
                foreach ($imagenes as $imagenes) {
                    $nombre_archivo = basename($imagenes);
                    echo "<div class='imagen-item card'>";
                    echo "<img src='$imagenes' alt='Imagen de la Galería'>";
                    echo "<span>$nombre_archivo</span>";
                    echo "</div>";
                }
            } else {
                echo "<p class='alerta alerta-error'>❌ No se encontraron imágenes en el directorio **$directorio_imagenes**.</p>";
            }
            ?>
        </div>
    </main>
</body>
</html>