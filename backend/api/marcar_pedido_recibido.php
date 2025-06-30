<?php
require_once '../config/conexion.php';

$data = json_decode(file_get_contents("php://input"), true);
$pedido_id = $data["pedido_id"];

$stmt = $pdo->prepare("UPDATE pedidos SET estado = 'entregado' WHERE id = ?");
$stmt->execute([$pedido_id]);

echo json_encode(["status" => "ok"]);
?>
