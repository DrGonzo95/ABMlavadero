<!DOCTYPE html>
<html>
<head>
    <title>Editar Vehículo</title>
 <!-- Vincula Bootstrap (CDN) -->
    <!-- Agrega enlaces a las bibliotecas de Bootstrap CSS y JS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mt-4">Editar Vehículo</h1>

        <?php
        include 'db_connection.php'; // Incluye el archivo de conexión a la base de datos

        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
            $vehicle_id = $_GET['id'];

            // Realiza una consulta para obtener los datos del vehículo específico
            $query = "SELECT * FROM Vehiculos WHERE ID = $vehicle_id";
            $result = mysqli_query($conexion, $query);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                // Muestra un formulario con los datos del vehículo para su edición
                echo '<div class="row mt-4">';
                echo '<div class="col-md-6">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h2 class="card-title">Editar Vehículo</h2>';
                echo '<form method="post" action="update_vehicle.php">';
                echo '<input type="hidden" name="id" value="' . $row['ID'] . '">';
                echo '<div class="mb-3">';
                echo '<label for="marca" class="form-label">Marca:</label>';
                echo '<input type="text" name="marca" id="marca" class="form-control" value="' . $row['Marca'] . '">';
                echo '</div>';
                echo '<div class="mb-3">';
                echo '<label for="modelo" class="form-label">Modelo:</label>';
                echo '<input type="text" name="modelo" id="modelo" class="form-control" value="' . $row['Modelo'] . '">';
                echo '</div>';
                echo '<div class="mb-3">';
                echo '<label for="ano" class="form-label">Año:</label>';
                echo '<input type="number" name="ano" id="ano" class="form-control" value="' . $row['Año'] . '">';
                echo '</div>';
                echo '<div class="mb-3">';
                echo '<label for="placa" class="form-label">Placa:</label>';
                echo '<input type="text" name="placa" id="placa" class="form-control" value="' . $row['Placa'] . '">';
                echo '</div>';
                echo '<div class="mb-3">';
                echo '<button type="submit" class="btn btn-primary">Actualizar Vehículo</button>';
                // Add the "Volver Atrás" (Back) button to go back to the previous page
                echo '<a href="vehicles.php" class="btn btn-secondary">Volver Atrás</a>';
                echo '</div>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else {
                echo "No se encontró el vehículo especificado.";
            }
        } else {
            echo "Parámetros de URL inválidos.";
        }

        // Cierra la conexión a la base de datos
        mysqli_close($conexion);
        ?>
    </div>
</body>
</html>