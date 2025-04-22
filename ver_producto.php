<?php
include 'conexion.php';

// Verificar si se recibió el ID por GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_producto = $_GET['id'];

    // Consulta SQL para obtener la información del producto específico
    $query = "SELECT ID_Producto, Nombre, Autor, Año_Lanzamiento, ID_Tipo FROM productos WHERE ID_Producto = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $id_producto); // "i" indica que el parámetro es un entero
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $producto = $resultado->fetch_assoc();
        echo "<h2>Detalles del Producto ID: " . htmlspecialchars($producto['ID_Producto']) . "</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><td>" . htmlspecialchars($producto['ID_Producto']) . "</td></tr>";
        echo "<tr><th>Nombre</th><td>" . htmlspecialchars($producto['Nombre']) . "</td></tr>";
        echo "<tr><th>Autor</th><td>" . htmlspecialchars($producto['Autor']) . "</td></tr>";
        echo "<tr><th>Año</th><td>" . htmlspecialchars($producto['Año_Lanzamiento']) . "</td></tr>";
        echo "<tr><th>Tipo ID</th><td>" . htmlspecialchars($producto['ID_Tipo']) . "</td></tr>";
        echo "</table>";
    } else {
        echo "<p>Producto con ID " . htmlspecialchars($id_producto) . " no encontrado.</p>";
    }

    $resultado->free();
    $stmt->close();
} else {
    echo "<p>Por favor, selecciona un ID de producto.</p>";
}

$conexion->close();
?>
