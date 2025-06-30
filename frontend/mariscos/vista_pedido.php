<?php
session_start();
$pedido_actual = $_SESSION['pedido_actual'] ?? null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if ($pedido_actual): ?>
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Pago para la mesa <?= htmlspecialchars($pedido_actual['mesa']) ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Platillo</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pedido_actual['items'] as $item): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($item['nombre']) ?></td>
                                            <td><?= $item['cantidad'] ?></td>
                                            <td>$<?= number_format($item['precio'], 2) ?> MXN</td>
                                            <td>$<?= number_format($item['total'], 2) ?> MXN</td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <p class="text-end fs-5"><strong>Total a pagar: $<?= number_format($pedido_actual['total'], 2) ?> MXN</strong></p>

                        <div class="d-flex justify-content-between">
                            <form method="POST" action="cancelar_orden.php">
                                <button type="submit" class="btn btn-outline-danger">Cancelar orden</button>
                            </form>
                            <form method="POST" action="guardar_venta.php">
                                <button type="submit" class="btn btn-success">Pagar en efectivo y generar ticket</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-warning text-center">
                    No hay información del pedido. <a href="index.php" class="btn btn-sm btn-primary">Volver al menú</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>
