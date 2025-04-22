<?php
// Datos de conexión a la base de datos
$host = "localhost"; // O la dirección de tu servidor de base de datos
$usuario = "root"; // Tu nombre de usuario de la base de datos
$clave = ""; // Tu contraseña de la base de datos
$base_de_datos = "comicmangaworld"; // El nombre de tu base de datos

// Crear una conexión a la base de datos MySQLi
$conexion = new mysqli($host, $usuario, $clave, $base_de_datos);

// Verificar si hay errores en la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Establecer la codificación de caracteres a UTF-8 (recomendado)
$conexion->set_charset("utf8");

// (Opcional: Puedes agregar mensajes de éxito si lo deseas para depuración)
// echo "Conexión a la base de datos exitosa!";
?>