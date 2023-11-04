<!DOCTYPE html>
<html>
<head>
    <title>Página Principal</title>
    <!-- Vincula Bootstrap (CDN) -->
    <!-- Agrega enlaces a las bibliotecas de Bootstrap CSS y JS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Bienvenido a la Página Principal</h1>
                        <p class="card-text">Esta es la página principal de tu aplicación de lavadero de autos.</p>
                        <p class="card-text">Desde aquí, puedes acceder a las diferentes secciones de la aplicación:</p>
                        <table class="table text-center">
                            <tbody>
                                <tr>
                                    <td><a href="vehicles.php">Gestión de Vehículos</a></td>
                                </tr>
                                <tr>
                                    <td><a href="clients.php">Gestión de Clientes</a></td>
                                </tr>
                                <tr>
                                    <td><a href="services.php">Gestión de Servicios</a></td>
                                </tr>
                                <tr>
                                    <td><a class="btn btn-danger" href="logout.php">Cerrar Sesión</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>