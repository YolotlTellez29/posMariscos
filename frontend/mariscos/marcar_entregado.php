<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$archivo = 'data/pedidos_cocina.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticket_id = $_POST['ticket_id'];

    if (file_exists($archivo)) {
        $pedidos = json_decode(file_get_contents($archivo), true);

        foreach ($pedidos as &$pedido) {
            if ($pedido['ticket_id'] == $ticket_id && $pedido['estado'] === 'pendiente') {
                $pedido['estado'] = 'entregado';
                break;
            }
        }

        file_put_contents($archivo, json_encode($pedidos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}

header("Location: pedidos_cocina.php");
exit;
