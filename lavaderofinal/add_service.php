<!DOCTYPE html>
<html>
<head>
    <title>Alta de Servicio</title>
</head>
<body>
    <h1>Alta de Servicio</h1>

    <?php
    include 'db_connection.php'; // Incluye el archivo de conexión a la base de datos
   
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recupera los datos del formulario
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];

        // Aquí puedes agregar validaciones de datos, como comprobar que los campos no estén vacíos

        // Prepara la consulta SQL para insertar el nuevo servicio en la base de datos
        $query = "INSERT INTO Servicios (Nombre, Precio) VALUES ('$nombre', '$precio')";

        // Ejecuta la consulta
        if (mysqli_query($conexion, $query)) {
            // El servicio se agregó con éxito, puedes redirigir al usuario a la página de servicios o mostrar un mensaje de éxito
            header("Location: services.php");
        } else {
            // Si ocurrió un error en la consulta, muestra un mensaje de error
            echo "Error al agregar el servicio: " . mysqli_error($conexion);
        }
    }
    ?>

    <!-- Aquí puedes agregar el formulario para dar de alta un nuevo servicio -->
</body>
</html>


