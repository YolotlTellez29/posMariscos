<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$archivo = 'data/platillos.json';

// Carga los platillos existentes
$platillos = [];
if (file_exists($archivo)) {
    $platillos = json_decode(file_get_contents($archivo), true) ?? [];
}

// Manejo de formulario para agregar platillo
$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $precio = floatval($_POST['precio'] ?? 0);
    $imagen_url = trim($_POST['imagen'] ?? '');

    if ($nombre && $precio > 0 && $imagen_url) {
        // Generar un ID simple (incremental)
        $ids = array_column($platillos, 'id');
        $nuevo_id = $ids ? max($ids) + 1 : 1;

        $nuevo_platillo = [
            'id' => $nuevo_id,
            'nombre' => $nombre,
            'precio' => $precio,
            'imagen' => $imagen_url
        ];

        $platillos[] = $nuevo_platillo;

        // Guardar en JSON
        file_put_contents($archivo, json_encode($platillos, JSON_PRETTY_PRINT));

        $mensaje = "Platillo agregado correctamente.";
    } else {
        $mensaje = "Por favor, completa todos los campos correctamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Agregar Platillos</title>
    <link rel="stylesheet" href="frontend/platillos.css" />
</head>
<body>
    <h2>Agregar Platillo</h2>

    <?php if ($mensaje): ?>
        <p class="mensaje"><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>

    <form method="POST" class="form-agregar">
        <label>Nombre del platillo:
            <input type="text" name="nombre" required />
        </label>
        <label>Precio (MXN):
            <input type="number" name="precio" step="0.01" min="0" required />
        </label>
        <label>URL de la imagen:
            <input type="url" name="imagen" placeholder="https://ejemplo.com/imagen.jpg" required />
        </label>
        <button type="submit">Agregar</button>
    </form>

    <h3>Platillos existentes</h3>
    <div class="lista-platillos">
        <?php if (count($platillos) === 0): ?>
            <p>No hay platillos agregados aún.</p>
        <?php else: ?>
            <?php foreach ($platillos as $p): ?>
                <div class="platillo-card">
                    <img src="<?= htmlspecialchars($p['imagen']) ?>" alt="<?= htmlspecialchars($p['nombre']) ?>" />
                    <div>
                        <strong><?= htmlspecialchars($p['nombre']) ?></strong><br>
                        $<?= number_format($p['precio'], 2) ?> MXN
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <a href="index.php">Volver al Panel Principal</a>
</body>
</html>
