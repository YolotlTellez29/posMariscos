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
    <title>Mesas - Restaurante</title>
    <link rel="stylesheet" href="frontend/style.css">
    <style>
        body { display: flex; margin: 0; font-family: Arial, sans-serif; }
        .sidebar {
            width: 200px;
            background: #333;
            color: white;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }
        .sidebar h3 {
            margin-top: 0;
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
            padding: 20px;
            flex-grow: 1;
        }
        .mesas {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .mesa {
            display: inline-block;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            width: 60px;
        }
        .mesa:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>Panel</h3>
        <a href="index.php">Mesas</a>
        <a href="platillos.php">Platillos</a>
        <a href="corte.php">Corte de Caja</a>
        <a href="cerrar_sesion.php">Cerrar Sesión</a>
    </div>

    <div class="content">
        <h2>Seleccione una Mesa</h2>
        <div class="mesas">
            <?php
            $mesas = ['T1', 'T2', 'T3', 'T4', 'T5', 'T6','T7', 'T8', 'T9','T10'];
            foreach ($mesas as $mesa) {
                echo "<a class='mesa' href='menu.php?mesa={$mesa}'>{$mesa}</a>";
            }
            ?>
        </div>
    </div>
</body>
</html>
