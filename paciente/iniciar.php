<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../style.css">
        <title>Iniciando como paciente</title>
        <link rel="icon" type="image/x-icon" href="https://i.imgur.com/FUQHqOg.png">
    </head>
    <body>

        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "segurocitas";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Error con la conexión en la base de datos: " . $conn->connect_error . " chécale que rollo papi");
            }
            $user = $_POST['user'];
            $pass = $_POST['pass'];
        ?>

        <section class="form-registerLong">
            <form action="Main_paciente.php" method="POST">
                <?php
                    $sql = "SELECT idPaciente, nombre, paterno, materno FROM pacientedatos WHERE user = '$user' AND pass = '$pass'";
                    $resultado = $conn->query($sql);

                    // Verificar si se encontró un resultado
                    if ($resultado->num_rows > 0) {
                        // Inicio de sesión exitoso
                        echo "<h1 style='text-align: center; font-size: 42px;'>¡Inicio de sesión exitoso!</h1>";
                        ?>
                            <div class="gif-container">
                                <img src="../open.gif" alt="Pase por aquí">
                            </div>
                        <?php

                        //Obtenemos los datos del usuario:
                        $fila = $resultado->fetch_assoc();
                        $idDoc = $fila['idDoc'];
                        $nombre = $fila['nombre'];
                        $paterno = $fila['paterno'];
                        $materno = $fila['materno'];
                        $nombreCompleto = $nombre . " " . $paterno . " " . $materno;

                        
                        // Iniciar la sesión y almacenar el ID del usuario
                        //echo "<br><br><p style='text-align: center; font-size: 24px;'>¡Bienvenido doctor $nombreCompleto!</p>";
                        //echo "<input class='botones' type='submit' value='¡Pase por aquí!'>";
                        

                        session_start();
                        $_SESSION['usuario_id'] = $idDoc;
                    } else {
                        // Credenciales inválidas
                        echo "<h1 style='text-align: center; font-size: 42px;'>¿Quién eres?</h1><br> <br>";
                        ?>
                            <div class="gif-container">
                                <img src="../quien.gif" alt="¿Quién?">
                            </div>
                        <?php
                        echo "<br> <br><p style='text-align: center; font-size: 24px;'>Credenciales inválidas. Por favor, verifica tu usuario y contraseña.</p>";
                        echo "<input class='botones' type='button' onclick='location.href=`inicioSesion.html`' value='Inténtalo de nuevo'>";
                    }
                    header("Location: Main_paciente.php");
                    $conn->close();
                ?>
                
            </form>
        </section>
        
    </body>
</html>