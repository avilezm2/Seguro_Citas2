<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="..\style.css">
        <title> Sesión de paciente </title>
        <link rel="icon" type="image/x-icon" href="..\Logo.png">
    </head>
    <body>
        
        <!-- Barra superior -->
        <header>
            <div class="logo">
                <img src="..\Logo.png" alt="logo de la compañia">
                <h2 class="nombre-empresa">Seguro Citas</h2>
            </div>
            <nav>
                <ul class="menu">
                    <li><a href="..\Main_principal.html" class="nav-link">Inicio</a></li>
                </ul>
            </nav>
        </header>
        
        <!--Presentación-->
        <section class="form-register">
            <form class="form-register" action="">
                
                <?php
                    session_start();
                    // Conexión a la base de datos (reemplaza los valores con los tuyos)
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "segurocitas";

                    // Crear la conexión
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verificar si hay errores en la conexión
                    if ($conn->connect_error) {
                        die("Error en la conexión a la base de datos: " . $conn->connect_error);
                    }

                    // Verificar si el ID del usuario está presente en la variable de sesión
                    if (isset($_SESSION['usuario_id'])) {
                        // Obtener el ID del usuario
                        $idUsuario = $_SESSION['usuario_id'];

                        $consulta = "SELECT nombre FROM pacientedatos WHERE idPaciente = $idUsuario";
                        $resultado = mysqli_query($conn, $consulta);

                        if ($resultado && mysqli_num_rows($resultado) > 0) {
                            // Obtener el nombre del usuario de la primera fila del resultado de la consulta
                            $fila = mysqli_fetch_assoc($resultado);
                            $nombre = $fila['nombre'];

                            // Mostrar el saludo con el nombre del usuario
                            echo "<h1>Bienvenido, $nombre</h1>";
                        } else {
                            // No se encontró el usuario en la base de datos
                            echo "Error al obtener el nombre del usuario";
                        }

                        
                    } else {
                        // El ID del usuario no está presente en la variable de sesión, lo que significa que el usuario no ha iniciado sesión correctamente o la sesión ha expirado
                        header("Location: inicioSesionDoc.html");
                        exit;
                    }








                    // Cerrar la conexión a la base de datos
                    $conn->close();

                ?>

                <button class="botones" id="consultars" type="button" onclick="location.href='consultarSolicitudes.php'">Consultar pendientes</button>
                <button class="botones" id="consultars" type="button" onclick="">Consultar citas agendadas</button>
                <button class="botones" id="consultars" type="button" onclick="">Concluir citas</button>
            </form>
        </section>


        <br> <br>
        <br> <br>
        <br> <br>
        <br> <br>
        
    </body>
</html>
