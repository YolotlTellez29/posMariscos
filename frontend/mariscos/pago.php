<?php
session_start();
include 'data/menu.php';

$mesa = $_POST['mesa'] ?? 'Sin mesa';
$pedido = $_POST['pedido'] ?? [];

$total = 0;
$items = [];
foreach ($pedido as $id => $cantidad) {
    if ($cantidad > 0) {
        foreach ($menu as $platillo) {
            if ($platillo['id'] == $id) {
                $items[] = [
                    'nombre' => $platillo['nombre'],
                    'cantidad' => $cantidad,
                    'precio' => $platillo['precio'],
                    'total' => $platillo['precio'] * $cantidad
                ];
                $total += $platillo['precio'] * $cantidad;
                break;
            }
        }
    }
}

// Guardar en sesión para que el archivo de vista lo use
$_SESSION['pedido_actual'] = [
    'mesa' => $mesa,
    'items' => $items,
    'total' => $total
];

// Redirigir a la vista con Bootstrap
header("Location:vista_pedido.php");
exit;
