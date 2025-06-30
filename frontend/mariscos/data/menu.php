<?php
$archivo = 'data/platillos.json';
$menu = [];

if (file_exists($archivo)) {
    $contenido = file_get_contents($archivo);
    $menu = json_decode($contenido, true) ?? [];
}
?>
