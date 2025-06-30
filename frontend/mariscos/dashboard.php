<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Principal</title>
    <link rel="stylesheet" href="frontend/style.css">
    <style>
        body { display: flex; }
        .sidebar {
            width: 200px;
            background: #333;
            color: white;
            height: 100vh;
            padding: 20px;
        }
        .sidebar a {
            color: white;
            display: block;
            margin: 10px 0;
            text-decoration: none;
        }
        .content {
            padding: 20px;
            flex-grow: 1;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>Panel</h3>
        <a href="index.php">Mesas</a>
        <a href="platillos.php">Platillos</a>
        <a href="corte.php">Corte de Caja</a>
        <a href="pedidos_cocina.php">pedidos pendientes para cocina</a>
        <a href="cerrar_sesion.php">Cerrar Sesión</a>
    </div>

    <div class="content">
        <h2>Bienvenido, <?php echo $_SESSION['usuario']['nombre']; ?></h2>
        <p>Seleccione una opción del panel.</p>
    </div>
</body>
</html>
