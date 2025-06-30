<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$archivo = 'data/pedidos_cocina.json';
$pedidos = [];

if (file_exists($archivo)) {
    $pedidos = json_decode(file_get_contents($archivo), true);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedidos para Cocina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { display: flex; margin: 0; }
        .sidebar {
            width: 200px;
            background: #333;
            color: white;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }
        .sidebar a {
            color: white;
            display: block;
            margin: 10px 0;
            text-decoration: none;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h3>Panel</h3>
    <a href="index.php">Mesas</a>
    <a href="platillos.php">Platillos</a>
    <a href="corte.php">Corte de Caja</a>
    <a href="pedidos_cocina.php">Pedidos Cocina</a>
    <a href="cerrar_sesion.php">Cerrar Sesión</a>
</div>

<div class="content">
    <h2 class="mb-4">Pedidos Pendientes para Cocina</h2>

    <?php if (!empty($pedidos)): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Mesa</th>
                    <th>Platillo</th>
                    <th>Cantidad</th>
                    <th>Hora</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                    <?php if ($pedido['estado'] === 'pendiente'): ?>
                        <tr>
                            <td><?= htmlspecialchars($pedido['mesa']) ?></td>
                            <td><?= htmlspecialchars($pedido['platillo']) ?></td>
                            <td><?= $pedido['cantidad'] ?></td>
                            <td><?= $pedido['hora'] ?></td>
                            <td>
                                <span class="badge bg-warning"><?= $pedido['estado'] ?></span>
                                <form method="post" action="marcar_entregado.php" style="display:inline;">
                                    <input type="hidden" name="ticket_id" value="<?= $pedido['ticket_id'] ?>">
                                    <button type="submit" class="btn btn-success btn-sm ms-2">Entregado</button>
                                </form>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">No hay pedidos en cocina.</div>
    <?php endif; ?>
</div>

</body>
</html>
