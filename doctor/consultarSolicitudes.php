<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "segurocitas";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario de aceptación de una solicitud
if (isset($_POST['aceptar'])) {
    $solicitudId = $_POST['solicitud_id'];

    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    // Mover la solicitud a la tabla "citas"
    $query = "INSERT INTO citas (nombrePaciente, paternoPaciente, maternoPaciente, telPaciente, correoPaciente, fechaCita, horaCita, idPac) SELECT nombre, paterno, materno, telefono, correo, $fecha, $hora, idPac FROM solicitudes WHERE idSolicitud = $solicitudId";
    $result = $conn->query($query);

    if ($result) {
        // Eliminar la solicitud de la tabla "solicitudes"
        $deleteQuery = "DELETE FROM solicitudes WHERE id = $solicitudId";
        $deleteResult = $conn->query($deleteQuery);

        if ($deleteResult) {
            echo "La solicitud ha sido aceptada correctamente.";
        } else {
            echo "Error al eliminar la solicitud.";
        }
    } else {
        echo "Error al mover la solicitud a la tabla de citas.";
    }
}

// Obtener todas las solicitudes ordenadas por ID
$query = "SELECT * FROM solicitudes ORDER BY idSolicitud";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="..\style.css">
    <link rel="icon" type="image/x-icon" href="Logo.png">

    <title>Administrar Solicitudes</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            font-family: arial, sans-serif;
            }

            tr:nth-child(even) {
            background-color: #4fa7c4;
            }
    </style>

    <script>
        function verSolicitud(id) {
            // Abrir una ventana emergente con los datos de la solicitud
            window.open("verSolicitud.php?id=" + id, "_blank", "width=600,height=400");
        }
    </script>

</head>
<body>



    <section class="form-registerLong">
        <h1>Administrar Solicitudes</h1>
        <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido paterno</th>
            <th>Descripción</th>
            <th>Enfermedades</th>

            <th>Ver</th>
            <th>Aceptar</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            echo "<form method='post' action=''>";
                echo "<input type='time' name='hora' id='hora' required>";
                echo "<input type='date' name='fecha' id='fecha' required>";
            while ($row = $result->fetch_assoc()) {
                $solicitudId = $row['idSolicitud'];
                $campo1 = $row['nombre'];
                $campo2 = $row['paterno'];
                $campo7 = $row['descripcion'];
                $campo9 = $row['enfermedades'];

                
                // Agrega aquí las columnas adicionales que tengas en tu tabla de solicitudes

                echo "<tr>";
                echo "<td>$solicitudId</td>";
                echo "<td>$campo1</td>";
                echo "<td>$campo2</td>";
                echo "<td>$campo7</td>";
                echo "<td>$campo9</td>";

                echo "<td>
                        <button onclick='verSolicitud($solicitudId)'>Ver</button>
                    </td>";

                // Agrega aquí las columnas adicionales que tengas en tu tabla de solicitudes
                
                
                echo "<td>
                        <input type='hidden' name='solicitud_id' value='$solicitudId'>

                        <input type='submit' name='aceptar' value='Aceptar'>
                        </td>
                    </form>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay solicitudes disponibles.</td></tr>";
        }
        ?>
        </table>
    </section>
    
</body>
</html>

  
<!DOCTYPE html>
<html lang="es">
    <head>

        
    </head>
</html>