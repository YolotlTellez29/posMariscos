<?php
session_start();
$pedido = $_SESSION['pedido_actual'] ?? null;

if ($pedido) {
    $ventas = [];
    $file = 'data/ventas.json';
    if (file_exists($file)) {
        $ventas = json_decode(file_get_contents($file), true);
    }

    $pedido['fecha'] = date('Y-m-d');
    $pedido['hora'] = date('H:i:s');
    $pedido['ticket_id'] = time(); // ID único basado en timestamp

    $ventas[] = $pedido;
    file_put_contents($file, json_encode($ventas, JSON_PRETTY_PRINT));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ticket de Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="frontend/estilos.css">
</head>
<body class="container mt-4">

<?php if ($pedido): ?>
    <div class="ticket">
        <h2 class="text-center">Ticket de Venta</h2>
        <p><strong>Ticket ID:</strong> <?= $pedido['ticket_id'] ?></p>
        <p><strong>Fecha:</strong> <?= $pedido['fecha'] ?></p>
        <p><strong>Hora:</strong> <?= $pedido['hora'] ?></p>
        <ul>
            <?php foreach ($pedido['items'] as $item): ?>
                <li><?= $item['nombre'] ?> - $<?= $item['total'] ?> MXN</li>
            <?php endforeach; ?>
        </ul>
        <p><strong>Total Pagado:</strong> $<?= $pedido['total'] ?> MXN</p>
        <p><strong>Método de Pago:</strong> Efectivo</p>

        <div class="no-print mt-4">
            <button class="btn btn-primary" onclick="window.print()">Imprimir Ticket</button>
            <a href="index.php" class="btn btn-secondary">Volver al inicio</a>
        </div>
    </div>
<?php else: ?>
    <p>No hay datos para mostrar.</p>
<?php endif; ?>

<?php unset($_SESSION['pedido_actual']); ?>

</body>
</html>
