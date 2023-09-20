<html>
<style>
    .popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        width: 80%; /* Establece el ancho máximo */
        height: 80%; /* Establece la altura máxima */
    }
</style>

</html>
<?php
// Verificar si se ha proporcionado el parámetro de ID de la solicitud
if (isset($_GET['id'])) {
    $solicitudId = $_GET['id'];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "segurocitas";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener los detalles de la solicitud con el ID proporcionado
    $query = "SELECT * FROM solicitudes WHERE idSolicitud = $solicitudId";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $campo1 = $row['nombre'];
        $campo2 = $row['paterno'];
        $campo3 = $row['materno'];
        $campo4 = $row['tipoSangre'];
        $campo5 = $row['telefono'];
        $campo6 = $row['correo'];
        $campo7 = $row['descripcion'];
        $campo8 = $row['alergias'];
        $campo9 = $row['enfermedades'];
        $campo10 = $row['estatura'];
        $campo11 = $row['peso'];
        
        // Mostrar los detalles de la solicitud
        echo "<div class='popup'>";
        echo "<h1>Detalles de la Solicitud</h1>";
        echo "<p><strong>ID:</strong> $solicitudId</p>";
        echo "<p><strong>Nombre:</strong> $campo1</p>";
        echo "<p><strong>Apellido paterno:</strong> $campo2</p>";
        echo "<p><strong>Apellido materno:</strong> $campo3</p>";
        echo "<p><strong>Tipo de sangre:</strong> $campo4</p>";
        echo "<p><strong>Teléfono:</strong> $campo5</p>";
        echo "<p><strong>Correo:</strong> $campo6</p>";
        echo "<p><strong>Descripción:</strong> $campo7</p>";
        echo "<p><strong>Alergias:</strong> $campo8</p>";
        echo "<p><strong>Enfermedades:</strong> $campo9</p>";
        echo "<p><strong>Estatura:</strong> $campo10</p>";
        echo "<p><strong>Peso:</strong> $campo11</p>";
        echo "</div>";

        $conn->close();//se cierra la base de datos
    } else {
        echo "No se encontró la solicitud con el ID proporcionado.";
    }
} else {
    echo "No se proporcionó el ID de la solicitud.";
}
?>