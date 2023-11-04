<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Servicios</title>
    <!-- Vincula Bootstrap (CDN) -->
    <!-- Vincula Bootstrap (CDN) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Gestión de Servicios</h1>

        <?php
        session_start(); // Inicia la sesión
        include 'db_connection.php'; // Incluye el archivo de conexión a la base de datos

        // Function to create a "Back to Main Menu" button
        function createBackButton() {
            echo '<a href="principal.php" class="btn btn-primary mt-3">Volver al Menú Principal</a>';
        }

        if (isset($_SESSION['rol'])) {
            $rol = $_SESSION['rol'];

            // Verifica el rol del usuario and muestra u oculta el formulario de alta de servicios
            if ($rol === 'Administrador') {
                echo '<div class="row mt-4">';
                echo '<div class="col-md-6">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h2 class="card-title">Alta de Servicio</h2>';
                echo '<form method="post" action="add_service.php">';
                echo '<div class="mb-3">';
                echo '<label for="nombre" class="form-label">Nombre:</label>';
                echo '<input type="text" name="nombre" id="nombre" class="form-control" required>';
                echo '</div>';
                echo '<div class="mb-3">';
                echo '<label for="precio" class="form-label">Precio:</label>';
                echo '<input type="text" name="precio" id="precio" class="form-control" required>';
                echo '</div>';
                echo '<div class="mb-3">';
                echo '<button type="submit" class="btn btn-primary">Agregar Servicio</button>';
                echo '</div>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                // Add the "Back to Main Menu" button
                createBackButton();
            } else {
                echo '<p>No tiene permiso para registrar nuevos servicios.</p>';
                // Add the "Back to Main Menu" button
                createBackButton();
            }

            // Tabla para mostrar los servicios existentes
            echo '<div class="row mt-4">';
            echo '<div class="col-md-12">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h2 class="card-title">Servicios Registrados</h2>';
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Nombre</th>';
            echo '<th>Precio</th>';
            echo '<th>Acciones</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // Realiza una consulta para obtener los servicios desde la base de datos
            $query = "SELECT * FROM Servicios";
            $result = mysqli_query($conexion, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['ID'] . '</td>';
                    echo '<td>' . $row['Nombre'] . '</td>';
                    echo '<td>' . $row['Precio'] . '</td>';
                    // Puedes agregar enlaces o botones para editar o eliminar servicios aquí
                    echo '<td><a href="edit_service.php?id=' . $row['ID'] . '">Editar</a> | <a href="delete_service.php?id=' . $row['ID'] . '">Eliminar</a></td>';
                    echo '</tr>';
                }
            } else {
                echo "No se encontraron servicios en la base de datos.";
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } else {
            echo "Debe iniciar sesión para acceder a esta página.";
            // Add the "Back to Main Menu" button
            createBackButton();
        }
        ?>
    </div>
</body>
</html>
