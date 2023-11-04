<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Vehículos</title>
 <!-- Vincula Bootstrap (CDN) -->
    <!-- Agrega enlaces a las bibliotecas de Bootstrap CSS y JS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mt-4">Gestión de Vehículos</h1>
    
        <!-- Formulario para agregar nuevos vehículos -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Agregar Nuevo Vehículo</h2>
                        <form method="post" action="add_vehicle.php">
                            <div class="mb-3">
                                <label for="marca" class="form-label">Marca:</label>
                                <input type="text" name="marca" id="marca" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="modelo" class="form-label">Modelo:</label>
                                <input type="text" name "modelo" id="modelo" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="ano" class="form-label">Año:</label>
                                <input type="number" name="ano" id="ano" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="placa" class="form-label">Placa:</label>
                                <input type="text" name="placa" id="placa" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Agregar Vehículo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla para mostrar los vehículos existentes -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Vehículos Registrados</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Año</th>
                                    <th>Placa</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'db_connection.php'; // Incluye el archivo de conexión a la base de datos
                                
                                // Realiza la consulta para obtener los vehículos desde la base de datos
                                $query = "SELECT * FROM Vehiculos";
                                $result = mysqli_query($conexion, $query);
                                
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td>' . $row['ID'] . '</td>';
                                        echo '<td>' . $row['Marca'] . '</td>';
                                        echo '<td>' . $row['Modelo'] . '</td>';
                                        echo '<td>' . $row['Año'] . '</td>';
                                        echo '<td>' . $row['Placa'] . '</td>';
                                        // Puedes agregar enlaces o botones para editar o eliminar vehículos aquí
                                        echo '<td><a href="edit_vehicle.php?id=' . $row['ID'] . '" class="btn btn-primary">Editar</a> | <a href="delete_vehicle.php?id=' . $row['ID'] . '" class="btn btn-danger">Eliminar</a></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo "No se encontraron vehículos en la base de datos.";
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
        <a class="btn btn-primary" href="principal.php">Volver a Página Principal</a> <!-- Button to return to the main page -->
    </div>
</body>
</html>
