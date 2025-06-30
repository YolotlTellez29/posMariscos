<?php
// Simulación: datos de ejemplo en lugar de conexión real a base de datos
$productos = [
  ['nombre' => 'Café Americano', 'categoria' => 'Bebida', 'precio' => 25.00, 'descripcion' => 'Café caliente sin azúcar'],
  ['nombre' => 'Ensalada César', 'categoria' => 'Comida', 'precio' => 60.00, 'descripcion' => 'Con pollo y aderezo'],
  ['nombre' => 'Refresco 600ml', 'categoria' => 'Bebida', 'precio' => 18.00, 'descripcion' => 'Refresco embotellado']
];

if (isset($_POST['agregar'])) {
  // Simulación de agregado
  $productos[] = [
    'nombre' => $_POST['nombre'],
    'categoria' => $_POST['categoria'],
    'precio' => $_POST['precio'],
    'descripcion' => $_POST['descripcion']
  ];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gestor de Productos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f5f5f5;
    }
    .container {
      display: flex;
      height: 100vh;
    }
    .sidebar {
      width: 80px;
      background-color: #eef1f2;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding-top: 20px;
      border-right: 1px solid #ccc;
    }
    .sidebar img {
      width: 50px;
      margin-bottom: 40px;
    }
    .sidebar button {
      background: none;
      border: none;
      margin: 10px 0;
      cursor: pointer;
      font-size: 18px;
    }
    .main {
      flex-grow: 1;
      padding: 20px;
      overflow-y: auto;
    }
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    header input {
      width: 300px;
      padding: 5px;
    }
    .grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }
    .form-section {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .form-section h2 {
      margin-top: 0;
    }
    .form-group {
      margin-bottom: 10px;
    }
    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 4px;
    }
    .form-group input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .form-actions {
      margin-top: 20px;
    }
    .form-actions button {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      margin-right: 10px;
      cursor: pointer;
    }
    .green {
      background-color: #4b5e3d;
      color: white;
    }
    .blue {
      background-color:rgb(73, 107, 116);
    }
    .red {
      background-color: #e15b5b;
      color: white;
    }
    ul {
      padding-left: 20px;
    }
    ul li {
      margin-bottom: 10px;
      line-height: 1.4;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="sidebar">
      <img src="logo.png" alt="Logo">
      <button>🏠</button>
      <button>📋</button>
      <button>💳</button>
      <button>📊</button>
      <button>📦</button>
      <button>⚙</button>
      <button>🔒</button>
    </div>
    <div class="main">
      <header>
        <input type="text" placeholder="Buscar producto o cualquier orden...">
        <div><?php echo date('F d, Y, h:i a'); ?></div>
      </header>
      <div class="grid">
        <form class="form-section" method="POST">
          <h2>AGREGAR PRODUCTO</h2>
          <div class="form-group">
            <label>Nombre de producto</label>
            <input type="text" name="nombre" required>
          </div>
          <div class="form-group">
            <label>Categoría</label>
            <input type="text" name="categoria" required>
          </div>
          <div class="form-group">
            <label>Precio</label>
            <input type="number" step="0.01" name="precio" required>
          </div>
          <div class="form-group">
            <label>Descripción</label>
            <input type="text" name="descripcion">
          </div>
          <div class="form-group">
            <label>Subir imagen</label>
            <input type="file" name="imagen" accept="image/*">
          </div>
          <div class="form-actions">
            <button class="green" name="agregar">AGREGAR PRODUCTO</button>
          </div>
        </form>
                <form class="form-section" method="POST">
          <h2>MODIFICAR O ELIMINAR PRODUCTO </h2>
          <div class="form-group">
            <label>Nombre de producto</label>
            <input type="text" name="nombre" required>
          </div>
          <div class="form-group">
            <label>Categoría</label>
            <input type="text" name="categoria" required>
          </div>
          <div class="form-group">
            <label>Precio</label>
            <input type="number" step="0.01" name="precio" required>
          </div>
          <div class="form-group">
            <label>Descripción</label>
            <input type="text" name="descripcion">
          </div>
          <div class="form-group">
            <label>Subir imagen</label>
            <input type="file" name="imagen" accept="image/*">
          </div>
          <div class="form-actions">
            <button class="green" name="agregar">MODIFICAR</button>
          </div>
          <div class="form-actions">
            <button class="red">ELIMINAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
