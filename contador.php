<?php
$archivo_contador = 'contador.txt';

if (file_exists($archivo_contador)) {

    $contenido = @file_get_contents($archivo_contador);
    $visitas = (int)$contenido;
} else {
    $visitas = 0;
}

$visitas++;

@file_put_contents($archivo_contador, $visitas);
?>