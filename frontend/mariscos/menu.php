<?php
$mesa = $_GET['mesa'] ?? 'Sin selección';
include 'data/menu.php'; // esto define $menu
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú - Mesa <?= htmlspecialchars($mesa) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="frontend/menu.css">
</head>
<body class="container py-4">
    <h2 class="mb-4">Menú para la mesa <?= htmlspecialchars($mesa) ?></h2>
    <form method="POST" action="procesar_pedido.php">
        <input type="hidden" name="mesa" value="<?= htmlspecialchars($mesa) ?>">
        <div class="row row-cols-1 row-cols-md-2 g-4 menu">
            <?php foreach ($menu as $platillo): ?>
            <div class="col">
                <div class="card h-100 platillo">
                    <img src="<?= htmlspecialchars($platillo['imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($platillo['nombre']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($platillo['nombre']) ?></h5>
                        <p class="card-text">$<?= htmlspecialchars($platillo['precio']) ?> MXN</p>
                        <input class="form-control" type="number" name="pedido[<?= $platillo['id'] ?>]" value="0" min="0">
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Enviar Pedido</button>
        </div>
    </form>
</body>
</html>
