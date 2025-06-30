<?php 
$host = "127.0.0.1"; // Puedes probar con localhost también
$db = "restaurante";
$user = "root";
$pass = ""; // Asegúrate de que sea la correcta

$conn = new mysqli($host, $user, $pass, $db,3309);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
