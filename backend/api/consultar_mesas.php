<?php
require_once '../config/conexion.php';

$stmt = $pdo->query("SELECT * FROM mesas");
$mesas = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($mesas);
?>
