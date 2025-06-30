<?php
require_once '../config/conexion.php';

$stmt = $pdo->query("SELECT p.id, m.numero as mesa, p.estado, p.fecha_hora
                      FROM pedidos p JOIN mesas m ON p.mesa_id = m.id
                      WHERE p.estado = 'pendiente'");
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
?>
