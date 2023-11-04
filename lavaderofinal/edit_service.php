<!DOCTYPE html>
<html>
<head>
    <title>Editar Servicio</title>
   <!-- Vincula Bootstrap (CDN) -->
    <!-- Vincula Bootstrap (CDN) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Editar Servicio</h1>

        <?php
        include 'db_connection.php'; // Incluye el archivo de conexión a la base de datos

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recupera los datos del formulario
            $service_id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];

            // Aquí puedes agregar validaciones de datos, como comprobar que los campos no estén vacíos

            // Prepara la consulta SQL para actualizar los datos del servicio
            $query = "UPDATE Servicios SET Nombre = '$nombre', Precio = '$precio' WHERE ID = $service_id";

            // Ejecuta la consulta
            if (mysqli_query($conexion, $query)) {
                // Los datos del servicio se actualizaron con éxito, redirige al usuario a la página de servicios
                header("Location: services.php");
                exit; // Asegúrate de salir del script para evitar cualquier otra salida
            } else {
                echo "Error al actualizar el servicio: " . mysqli_error($conexion);
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
            $service_id = $_GET['id'];

            // Realiza una consulta para obtener los datos del servicio específico
            $query = "SELECT * FROM Servicios WHERE ID = $service_id";
            $result = mysqli_query($conexion, $query);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                // Muestra un formulario con los datos del servicio para su edición
                echo '<div class="row mt-4">';
                echo '<div class="col-md-6">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h2 class="card-title">Editar Servicio</h2>';
                echo '<form method="post" action="edit_service.php">';
                echo '<input type="hidden" name="id" value="' . $row['ID'] . '">';
                echo '<div class="mb-3">';
                echo '<label for="nombre" class="form-label">Nombre:</label>';
                echo '<input type="text" name="nombre" value="' . $row['Nombre'] . '" class="form-control">';
                echo '</div>';
                echo '<div class="mb-3">';
                echo '<label for="precio" class="form-label">Precio:</label>';
                echo '<input type="text" name="precio" value="' . $row['Precio'] . '" class="form-control">';
                echo '</div>';
                echo '<div class="mb-3">';
                echo '<button type="submit" class="btn btn-primary">Actualizar Servicio</button>';
                echo '</div>';
                echo '</form>';
                // Add a button to return to the main menu
                echo '<a href="services.php" class="btn btn-secondary">Volver atras</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else {
                echo "No se encontró el servicio especificado.";
            }
        } else {
            echo "Parámetros de URL inválidos.";
        }
        ?>
    </div>
</body>
</html>
