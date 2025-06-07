<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="../public/css/style.css">             
</head>
<body>
    <h1>Listado de Productos</h1>

    <div class="button-container">
        <a href="index.php?action=register">Registrar Nuevo Producto</a>
    </div>

    <?php if (empty($products)): ?>
        <p>No hay productos registrados.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Valor Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['id']); ?></td>
                        <td><?php echo htmlspecialchars($product['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($product['cantidad']); ?></td>
                        <td>$<?php echo number_format(htmlspecialchars($product['precio_unitario']), 2); ?></td>
                        <td class="total-value">$<?php echo number_format($product['cantidad'] * $product['precio_unitario'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>