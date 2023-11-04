<!DOCTYPE html>
<html>

<head>
    <title>Editar Cliente</title>
    <!-- Vincula Bootstrap (CDN) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Vincula el archivo CSS externo -->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Editar Cliente</h1>

        <?php
        session_start(); // Inicia la sesión
        include 'db_connection.php'; // Incluye el archivo de conexión a la base de datos

        if (isset($_SESSION['rol'])) {
            $rol = $_SESSION['rol'];

            // Verifica the rol del usuario y permite o prohíbe the edición del cliente
            if ($rol === 'Administrador') {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Recupera y procesa los datos del formulario
                    $client_id = $_POST['id'];
                    $nombre = $_POST['nombre'];
                    $dni = $_POST['dni'];
                    $telefono = $_POST['telefono'];
                    $email = $_POST['email'];

                    // Aquí puedes agregar validaciones de datos, como comprobar que los campos no estén vacíos

                    // Prepara la consulta SQL para actualizar los datos del cliente
                    $query = "UPDATE Clientes SET Nombre = '$nombre', DNI = '$dni', Telefono = '$telefono', Email = '$email' WHERE ID = $client_id";

                    // Ejecuta the consulta
                    if (mysqli_query($conexion, $query)) {
                        // Los datos del cliente se actualizaron con éxito, redirige al usuario a la página de clientes
                        header("Location: clients.php");
                        exit; // Asegúrate de salir del script para evitar cualquier otra salida
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Error al actualizar el cliente: ' . mysqli_error($conexion) . '</div>';
                    }
                }

                if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
                    $client_id = $_GET['id'];

                    // Realiza una consulta para obtener los datos del cliente específico
                    $query = "SELECT * FROM Clientes WHERE ID = $client_id";
                    $result = mysqli_query($conexion, $query);

                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_assoc($result);
                        // Muestra the formulario para editar el cliente
                        echo '<div class="row mt-4">';
                        echo '<div class="col-md-6">';
                        echo '<div class="card">';
                        echo '<div class="card-body">';
                        echo '<h2 class="card-title">Editar Cliente</h2>';
                        echo '<form method="post" action="edit_client.php">';
                        echo '<input type="hidden" name="id" value="' . $row['ID'] . '">';
                        echo '<div class="mb-3">';
                        echo '<label for="nombre" class="form-label">Nombre:</label>';
                        echo '<input type="text" name="nombre" value="' . $row['Nombre'] . '" class="form-control">';
                        echo '</div>';
                        echo '<div class="mb-3">';
                        echo '<label for="dni" class="form-label">DNI:</label>';
                        echo '<input type="text" name="dni" value="' . $row['DNI'] . '" class="form-control">';
                        echo '</div>';
                        echo '<div class="mb-3">';
                        echo '<label for="telefono" class="form-label">Teléfono:</label>';
                        echo '<input type="text" name="telefono" value="' . $row['Telefono'] . '" class="form-control">';
                        echo '</div>';
                        echo '<div class="mb-3">';
                        echo '<label for="email" class="form-label">Email:</label>';
                        echo '<input type="text" name="email" value="' . $row['Email'] . '" class="form-control">';
                        echo '</div>';
                        echo '<div class="mb-3">';
                        echo '<button type="submit" class="btn btn-primary">Actualizar Cliente</button>';
                        echo ' <a href="clients.php" class="btn btn-secondary">Volver atras</a>'; // Button to return to the main menu
                        echo '</div>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">No se encontró el cliente especificado.</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger" role="alert">Parámetros de URL inválidos.</div>';
                }
            } else {
                echo '<div class="alert alert-warning" role="alert">No tiene permiso para editar clientes.</div>';
            }
        } else {
            echo '<div class="alert alert-warning" role="alert">Debe iniciar sesión para acceder a esta página.</div>';
        }
        ?>
    </div>
</body>

</html>

