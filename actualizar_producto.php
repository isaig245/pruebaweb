<?php
include 'conexion.php';

// Verificar si se recibieron los datos por POST
if (isset($_POST['id']) && is_numeric($_POST['id']) && isset($_POST['nombre'])) {
    $id_producto = $_POST['id'];
    $nombre = $_POST['nombre'];
    $autor = $_POST['autor'];
    $anio = $_POST['anio'];

    // Consulta para actualizar el nombre del producto
    $query = "UPDATE productos SET Nombre = ?, Autor = ?, Año_Lanzamiento = ? WHERE ID_Producto = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ssii", $nombre, $autor, $anio, $id_producto);

    if ($stmt->execute()) {
        echo "<p>Producto actualizado con éxito.</p>";
        echo '<a href="mostrar_productos.html">Volver a la lista de productos</a>';
    } else {
        echo "<p>Error al actualizar el producto: " . $stmt->error . "</p>";
    }

    $stmt->close();
} else {
    echo "<p>Datos de producto no válidos.</p>";
}

$conexion->close();
?>