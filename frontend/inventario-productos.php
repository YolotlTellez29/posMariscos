<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario - Marisquería</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script>
        function imprimir(id) {
            var contenido = document.getElementById(id).innerHTML;
            var ventana = window.open('', '', 'height=600,width=800');
            ventana.document.write('<html><head><title>Ticket</title></head><body>');
            ventana.document.write(contenido);
            ventana.document.write('</body></html>');
            ventana.document.close();
            ventana.print();
        }
    </script>
</head>
<body>
<section class="section">
    <div class="container">
        <h1 class="title has-text-centered">📦 Inventario de Marisquería</h1>

        <!-- 🦑 Carnes -->
        <div id="carnes" class="box">
            <h2 class="subtitle">🦐 Carnes</h2>
            <table class="table is-striped is-fullwidth">
                <thead><tr><th>Producto</th><th>Cantidad</th></tr></thead>
                <tbody>
                    <tr><td>Langosta</td><td>30 kg</td></tr>
                    <tr><td>Cangrejo</td><td>30 kg</td></tr>
                    <tr><td>Calamar</td><td>50 kg</td></tr>
                    <tr><td>Pulpo</td><td>30 kg</td></tr>
                    <tr><td>Camarón</td><td>100 kg</td></tr>
                    <tr><td>Ostra</td><td>30 kg</td></tr>
                </tbody>
            </table>
            <button class="button is-primary" onclick="imprimir('carnes')">Imprimir Ticket</button>
        </div>

        <!-- 🥬 Verduras -->
        <div id="verduras" class="box">
            <h2 class="subtitle">🥬 Verduras</h2>
            <table class="table is-striped is-fullwidth">
                <thead><tr><th>Producto</th><th>Cantidad</th></tr></thead>
                <tbody>
                    <tr><td>Tomate</td><td>50 kg</td></tr>
                    <tr><td>Elote</td><td>30 kg</td></tr>
                    <tr><td>Calabaza</td><td>50 kg</td></tr>
                    <tr><td>Cilantro</td><td>30 kg</td></tr>
                    <tr><td>Alcachofa</td><td>100 kg</td></tr>
                    <tr><td>Jitomate</td><td>30 kg</td></tr>
                </tbody>
            </table>
            <button class="button is-link" onclick="imprimir('verduras')">Imprimir Ticket</button>
        </div>

        <!-- 🥤 Bebidas -->
        <div id="bebidas" class="box">
            <h2 class="subtitle">🥤 Bebidas</h2>
            <table class="table is-striped is-fullwidth">
                <thead><tr><th>Producto</th><th>Cantidad</th></tr></thead>
                <tbody>
                    <tr><td>Coca-Cola 600ml</td><td>24 pz</td></tr>
                    <tr><td>Sprite 600ml</td><td>24 pz</td></tr>
                    <tr><td>Sangrita Viuda 1L</td><td>10 pz</td></tr>
                    <tr><td>Vodka 1L</td><td>15 pz</td></tr>
                </tbody>
            </table>
            <button class="button is-info" onclick="imprimir('bebidas')">Imprimir Ticket</button>
        </div>

        <!-- 🌶️ Condimentos -->
        <div id="condimentos" class="box">
            <h2 class="subtitle">🌶️ Condimentos</h2>
            <table class="table is-striped is-fullwidth">
                <thead><tr><th>Producto</th><th>Cantidad</th></tr></thead>
                <tbody>
                    <tr><td>Orégano</td><td>1 kg</td></tr>
                    <tr><td>Comino</td><td>1 kg</td></tr>
                    <tr><td>Ajo en polvo</td><td>500 g</td></tr>
                    <tr><td>Pimienta negra</td><td>1 kg</td></tr>
                    <tr><td>Chile seco</td><td>2 kg</td></tr>
                    <tr><td>Paprika</td><td>1 kg</td></tr>
                </tbody>
            </table>
            <button class="button is-danger" onclick="imprimir('condimentos')">Imprimir Ticket</button>
        </div>
    </div>
</section>
</body>
</html>