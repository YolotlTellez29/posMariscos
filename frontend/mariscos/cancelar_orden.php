<?php
session_start();
unset($_SESSION['pedido_actual']);
header("Location: index.php");
exit;