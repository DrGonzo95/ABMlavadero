<?php
include 'db_connection.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $vehicle_id = $_GET['id'];

    // Realiza una consulta para eliminar el vehículo específico
    $query = "DELETE FROM Vehiculos WHERE ID = $vehicle_id";

    if (mysqli_query($conexion, $query)) {
        // El vehículo se eliminó con éxito, puedes redirigir al usuario a la página de vehículos o mostrar un mensaje de éxito
        header("Location: vehicles.php");
    } else {
        echo "Error al eliminar el vehículo: " . mysqli_error($conexion);
    }
} else {
    echo "Parámetros de URL inválidos.";
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
