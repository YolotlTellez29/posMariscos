<?php
require_once '../config/conexion.php';

$data = json_decode(file_get_contents("php://input"), true);
$email = $data["email"] ?? '';
$password = $data["password"] ?? '';

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user["password"])) {
    echo json_encode(["status" => "ok", "rol" => $user["rol"]]);
} else {
    http_response_code(401);
    echo json_encode(["status" => "error", "message" => "Credenciales inválidas"]);
}
?>
