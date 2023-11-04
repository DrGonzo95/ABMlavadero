<!DOCTYPE html>
<html>

<head>
    <title>Gestión de Clientes</title>
    <!-- Vincula Bootstrap (CDN) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mt-4">Gestión de Clientes</h1>

        <!-- Formulario para dar de alta un nuevo cliente -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Alta de Cliente</h2>
                        <form method="post" action="add_client.php">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="dni">DNI:</label>
                                <input type="text" name="dni" id="dni" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono:</label>
                                <input type="text" name="telefono" id="telefono" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Agregar Cliente</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla para mostrar los clientes existentes -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Clientes Registrados</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'db_connection.php'; // Incluye el archivo de conexión a la base de datos

                                // Realiza una consulta para obtener los clientes desde la base de datos
                                $query = "SELECT * FROM Clientes";
                                $result = mysqli_query($conexion, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td>' . $row['ID'] . '</td>';
                                        echo '<td>' . $row['Nombre'] . '</td>';
                                        echo '<td>' . $row['DNI'] . '</td>';
                                        echo '<td>' . $row['Telefono'] . '</td>';
                                        echo '<td>' . $row['Email'] . '</td>';
                                        // Puedes agregar enlaces o botones para editar o eliminar clientes aquí
                                        echo '<td><a href="edit_client.php?id=' . $row['ID'] . '">Editar</a> | <a href="delete_client.php?id=' . $row['ID'] . '">Eliminar</a></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo "No se encontraron clientes en la base de datos.";
                                }

                                // Cierra la conexión a la base de datos
                                mysqli_close($conexion);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Button to return to the main menu -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <a class="btn btn-primary" href="principal.php">Volver al Menú Principal</a>
            </div>
        </div>
    </div>
</body>

</html>
