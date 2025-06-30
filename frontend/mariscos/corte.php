<?php
$file = 'data/ventas.json';
$ventas = [];
if (file_exists($file)) {
    $ventas = json_decode(file_get_contents($file), true);
}

$hoy = date('Y-m-d');
$resumen = [];
$total_general = 0;
$ventas_hoy = [];

foreach ($ventas as $venta) {
    if ($venta['fecha'] === $hoy) {
        $ventas_hoy[] = $venta;
        $mesa = $venta['mesa'];
        if (!isset($resumen[$mesa])) {
            $resumen[$mesa] = 0;
        }
        $resumen[$mesa] += $venta['total'];
        $total_general += $venta['total'];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Corte de Caja - <?= $hoy ?></title>
    <link rel="stylesheet" href="frontend/corte.css" />
</head>
<body>
    <h2>Corte de Caja - <?= $hoy ?></h2>

    <ul>
        <?php foreach ($resumen as $mesa => $total): ?>
            <li>Mesa <?= htmlspecialchars($mesa) ?>: $<?= number_format($total, 2) ?> MXN</li>
        <?php endforeach; ?>
    </ul>

    <h3>Detalles:</h3>
    <ul>
        <?php foreach ($ventas_hoy as $venta): ?>
            <li><?= htmlspecialchars($venta['hora']) ?> - Mesa <?= htmlspecialchars($venta['mesa']) ?>: $<?= number_format($venta['total'], 2) ?> MXN</li>
        <?php endforeach; ?>
    </ul>

    <p><strong>Total general: $<?= number_format($total_general, 2) ?> MXN</strong></p>

    <button onclick="window.print()">Imprimir Corte</button>

    <form method="post" action="resetear_corte.php" style="margin-top:10px;">
        <button type="submit" style="background:darkred;color:white;">Resetear Corte</button>
    </form>

    <a href="index.php">Volver al inicio</a>
</body>
</html>
