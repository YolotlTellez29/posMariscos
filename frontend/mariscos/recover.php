<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="frontend/style.css">
</head>
<body>
    <h2>Recuperar Contraseña</h2>
    <form method="POST">
        <input type="email" name="correo" placeholder="Tu correo" required>
        <button type="submit">Enviar</button>
        <p><a href="login.php">Volver al login</a></p>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<p>Se ha enviado un correo para recuperar tu contraseña (simulado).</p>";
    }
    ?>
</body>
</html>
