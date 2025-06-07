<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Producto</title>
    <link rel="stylesheet" href="../public/css/style.css">        
</head>
<body>
    <h1>Registrar Nuevo Producto</h1>

    <?php if (isset($message)): ?>
        <p class="message <?php echo strpos($message, 'Error') !== false ? 'error' : 'success'; ?>">
            <?php echo htmlspecialchars($message); ?>
        </p>
    <?php endif; ?>

    <form action="index.php?action=register" method="POST">
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required min="0">

        <label for="precio_unitario">Precio Unitario:</label>
        <input type="number" id="precio_unitario" name="precio_unitario" step="0.01" required min="0">

        <input type="submit" value="Registrar Producto">
    </form>

    <div class="button-container">
        <a href="index.php?action=list">Volver al Listado de Productos</a>
    </div>
</body>
</html>