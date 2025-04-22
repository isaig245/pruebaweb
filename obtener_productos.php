<?php
include 'conexion.php';

// Consulta SQL para obtener todos los productos
$query = "SELECT ID_Producto, Nombre, Autor, Año_Lanzamiento FROM productos";
$resultado = $conexion->query($query);

// Verificar si la consulta tuvo éxito
if ($resultado) {
    // Estructura de la tabla HTML
    echo "<table border='1'>";
    echo "<thead>";
    echo "<tr>";

    // Obtener los nombres de las columnas dinámicamente
    $columnas = $resultado->fetch_fields();
    foreach ($columnas as $columna) {
        echo "<th>" . $columna->name . "</th>";
    }
    echo "<th>Acciones</th>"; // New column for "Edit"
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Mostrar los datos de cada fila
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['ID_Producto'] . "</td>";
        echo "<td>" . htmlspecialchars($fila['Nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['Autor']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['Año_Lanzamiento']) . "</td>";
        echo "<td><a href='editar_producto.php?id=" . $fila['ID_Producto'] . "'>Editar</a></td>"; // Link to edit
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";

    // Liberar el resultado
    $resultado->free();
} else {
    echo "Error al ejecutar la consulta: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>