<?php
file_put_contents('data/ventas.json', json_encode([]));
header('Location: corte.php');
exit;