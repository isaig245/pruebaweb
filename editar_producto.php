<?php
include 'conexion.php';

// Verificar si se recibió el ID por GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_producto = $_GET['id'];

    // Consulta para obtener la información del producto
    $query = "SELECT ID_Producto, Nombre, Autor, Año_Lanzamiento FROM productos WHERE ID_Producto = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $id_producto);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $producto = $resultado->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Producto</title>
        </head>
        <body>
            <h1>Editar Producto</h1>
            <form action="actualizar_producto.php" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto['ID_Producto']); ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($producto['Nombre']); ?>"><br><br>
                <label for="autor">Autor:</label>
                <input type="text" name="autor" id="autor" value="<?php echo htmlspecialchars($producto['Autor']); ?>"><br><br>
                <label for="anio">Año:</label>
                <input type="text" name="anio" id="anio" value="<?php echo htmlspecialchars($producto['Año_Lanzamiento']); ?>"><br><br>
                <input type="submit" value="Actualizar Producto">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "<p>Producto no encontrado.</p>";
    }

    $resultado->free();
    $stmt->close();
} else {
    echo "<p>ID de producto no válido.</p>";
}

$conexion->close();
?>