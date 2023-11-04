<?php
include 'db_connection.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $client_id = $_GET['id'];

    // Realiza una consulta para eliminar el cliente específico
    $query = "DELETE FROM Clientes WHERE ID = $client_id";

    if (mysqli_query($conexion, $query)) {
        // El cliente se eliminó con éxito, puedes redirigir al usuario a la página de clientes o mostrar un mensaje de éxito
        header("Location: clients.php");
    } else {
        echo "Error al eliminar el cliente: " . mysqli_error($conexion);
    }
} else {
    echo "Parámetros de URL inválidos.";
}
?>
