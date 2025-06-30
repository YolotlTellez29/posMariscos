
<?php
$fecha_inicio = isset($_GET['desde']) ? $_GET['desde'] : date('Y-m-d');
$fecha_fin = isset($_GET['hasta']) ? $_GET['hasta'] : date('Y-m-d');

$ventas = [
  ['poliza' => 'PZ001', 'producto' => 'Venta desayuno', 'cantidad' => 2, 'total' => 120.00],
  ['poliza' => 'PZ002', 'producto' => 'Venta comida corrida', 'cantidad' => 3, 'total' => 180.00],
  ['poliza' => 'PZ003', 'producto' => 'Venta cena', 'cantidad' => 1, 'total' => 150.00]
];

$total = 0;
foreach ($ventas as $v) {
  $total += $v['total'];
}

$total_pagos = isset($_GET['pagos']) ? floatval($_GET['pagos']) : 0;
$retiros_caja = isset($_GET['retiros']) ? floatval($_GET['retiros']) : 0;
$deposito_caja = isset($_GET['deposito']) ? floatval($_GET['deposito']) : 0;
$descuentos = isset($_GET['descuentos']) ? floatval($_GET['descuentos']) : 0;

$subtotal = $total;
$total_final = $subtotal - ($total_pagos + $retiros_caja + $descuentos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Corte de Caja</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos-corte-caja.css">
  <script>
    function imprimirCorte() {
      const contenido = document.getElementById('area-corte').innerHTML;
      const ventana = window.open('', '', 'width=800,height=600');
      ventana.document.write('<html><head><title>Imprimir Corte de Caja</title>');
      ventana.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">');
      ventana.document.write('<link rel="stylesheet" href="css/estilos-corte-caja.css">');
      ventana.document.write('<style>body { padding: 2rem; }</style>');
      ventana.document.write('</head><body>');
      ventana.document.write(contenido);
      ventana.document.write('</body></html>');
      ventana.document.close();
      ventana.print();
    }
  </script>
</head>
<body>
  <div class="container py-4">
    <h2 class="mb-4 text-center">Corte de Caja</h2>
    <form method="GET" class="row g-3 mb-4">
      <div class="col-md-3">
        <label for="desde" class="form-label">Desde:</label>
        <input type="date" id="desde" name="desde"  class="form-control input-color-custom" class="form-control" value="<?php echo htmlspecialchars($fecha_inicio); ?>">
      </div>
      <div class="col-md-3">
        <label for="hasta" class="form-label">Hasta:</label>
        <input type="date" id="hasta" name="hasta" class="form-control input-color-custom"  class="form-control" value="<?php echo htmlspecialchars($fecha_fin); ?>">
      </div>


    <div id="area-corte">
      <div class="card corte-caja-card ">
     <div class="card-header bg-primary text-white">
    Ventas del <strong><?php echo $fecha_inicio; ?></strong> al <strong><?php echo $fecha_fin; ?></strong>
    </div>
    <div class="card-body p-0">
            <div class="table-responsive">
         <table class="table table-striped table-compact mb-0">
                <thead class="table-light">
                <tr>
                  <th>Póliza</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($ventas as $v): ?>
                <tr>
                  <td><?php echo htmlspecialchars($v['poliza']); ?></td>
                  <td><?php echo htmlspecialchars($v['producto']); ?></td>
                  <td><?php echo htmlspecialchars($v['cantidad']); ?></td>
                  <td>$<?php echo number_format($v['total'], 2); ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer text-end">
          <strong>Total Ventas: $<?php echo number_format($total, 2); ?></strong>
        </div>
      </div>

      <div class="row g-3 mt-4">
        <div class="col-md-3">
          <label class="form-label">Pagos realizados:</label>
          <input type="number" step="0.01" min="0" name="pagos" class="form-control input-color-custom" class="form-control" value="<?php echo htmlspecialchars($total_pagos); ?>">
        </div>
        <div class="col-md-3">
          <label class="form-label">Retiros de caja:</label>
          <input type="number" step="0.01" min="0" name="retiros" class="form-control input-color-custom"  class="form-control" value="<?php echo htmlspecialchars($retiros_caja); ?>">
        </div>
        <div class="col-md-3">
          <label class="form-label">Descuentos:</label>
          <input type="number" step="0.01" min="0" name="descuentos"class="form-control input-color-custom"  class="form-control" value="<?php echo htmlspecialchars($descuentos); ?>">
        </div>
        <div class="col-md-3">
          <label class="form-label">Depósito a caja:</label>
          <input type="number" step="0.01" min="0" name="deposito" class="form-control input-color-custom" class="form-control" value="<?php echo htmlspecialchars($deposito_caja); ?>">
        </div>
        <div class="col-md-12 text-end">
          <h5 class="mt-3">Total final en caja: <strong class="text-success">$<?php echo number_format($total_final, 2); ?></strong></h5>
        </div>

              <div class="col-md-3 align-self-end">
        <button type="submit" class="btn btn-primary w-100">Ver Corte</button>
      </div>
      <div class="col-md-3 align-self-end">
        <button type="button" onclick="imprimirCorte()" class="btn btn-secondary w-100">Imprimir</button>
      </div>
    </form>
    
      </div>
    </div>
  </div>
</body>
</html>

