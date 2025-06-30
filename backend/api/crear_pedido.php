<?php
require_once '../config/conexion.php';

$data = json_decode(file_get_contents("php://input"), true);
$mesa_id = $data["mesa_id"];
$mesero_id = $data["mesero_id"];
$productos = $data["productos"]; // array con id y cantidad

$pdo->beginTransaction();

try {
    $stmt = $pdo->prepare("INSERT INTO pedidos (mesa_id, mesero_id, estado, fecha_hora) VALUES (?, ?, 'pendiente', NOW())");
    $stmt->execute([$mesa_id, $mesero_id]);
    $pedido_id = $pdo->lastInsertId();

    $detalle = $pdo->prepare("INSERT INTO detalle_pedido (pedido_id, producto_id, cantidad) VALUES (?, ?, ?)");

    foreach ($productos as $p) {
        $detalle->execute([$pedido_id, $p["producto_id"], $p["cantidad"]]);
    }

    $pdo->commit();
    echo json_encode(["status" => "ok", "pedido_id" => $pedido_id]);

} catch (Exception $e) {
    $pdo->rollBack();
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>
