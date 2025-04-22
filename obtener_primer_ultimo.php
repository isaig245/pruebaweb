<?php
include 'conexion.php';

// Obtener el primer producto (ID más bajo)
$query_primer = "SELECT Nombre,Autor,Año_Lanzamiento FROM productos ORDER BY ID_Producto ASC LIMIT 1";
$resultado_primer = $conexion->query($query_primer);
$primer_producto_info = ''; // Inicializar la variable para la información del primer producto
if ($resultado_primer && $resultado_primer->num_rows > 0) {
    $primer_producto = $resultado_primer->fetch_assoc();
    $primer_producto_info = htmlspecialchars($primer_producto['Nombre']) . " (Autor: " . htmlspecialchars($primer_producto['Autor']) . ", Año: " . htmlspecialchars($primer_producto['Año_Lanzamiento']) . ")";
} else {
    $primer_producto_info = 'No encontrado';
}
if ($resultado_primer) $resultado_primer->free();

// Obtener el último producto (ID más alto)
$query_ultimo = "SELECT Nombre,Autor,Año_Lanzamiento FROM productos ORDER BY ID_Producto DESC LIMIT 1";
$resultado_ultimo = $conexion->query($query_ultimo);
$ultimo_producto_info = ''; // Inicializar la variable para la información del último producto
if ($resultado_ultimo && $resultado_ultimo->num_rows > 0) {
    $ultimo_producto = $resultado_ultimo->fetch_assoc();
    $ultimo_producto_info = htmlspecialchars($ultimo_producto['Nombre']) . " (Autor: " . htmlspecialchars($ultimo_producto['Autor']) . ", Año: " . htmlspecialchars($ultimo_producto['Año_Lanzamiento']) . ")";
} else {
    $ultimo_producto_info = 'No encontrado';
}
if ($resultado_ultimo) $resultado_ultimo->free();

echo "<p><strong>Primer Producto:</strong> " . $primer_producto_info . "</p>";
echo "<p><strong>Último Producto:</strong> " . $ultimo_producto_info . "</p>";

$conexion->close();
?>
