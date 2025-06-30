<?php
// recuperar_password.php

$mensaje = "";

if (isset($_POST['recuperar'])) {
    $correo = $_POST['correo'];

    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "productos_db");
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Buscar el correo en la base de datos
    $sql = "SELECT * FROM usuarios WHERE correo='$correo'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        // Simulamos un correo enviado con un nuevo password temporal
        $nuevo_password = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 8);
        $sql_update = "UPDATE usuarios SET password='$nuevo_password' WHERE correo='$correo'";
        $conn->query($sql_update);

        // En la realidad se enviaría un email, pero aquí solo mostramos el mensaje
        $mensaje = "Tu nueva contraseña temporal es: <strong>$nuevo_password</strong>. Cambia tu contraseña al iniciar sesión.";
    } else {
        $mensaje = "Correo no encontrado.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recuperar Contraseña</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .form-box {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      width: 400px;
    }
    .form-box h2 {
      margin-bottom: 20px;
    }
    .form-box input[type="email"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .form-box button {
      background-color: #4b5e3d;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }
    .mensaje {
      margin-top: 20px;
      color: green;
    }
  </style>
</head>
<body>
  <div class="form-box">
    <h2>Recuperar Contraseña</h2>
    <form method="POST">
      <label>Correo Electrónico</label>
      <input type="email" name="correo" required>
      <button type="submit" name="recuperar">Recuperar</button>
    </form>
    <div class="mensaje"> <?php echo $mensaje; ?> </div>
  </div>
</body>
</html>