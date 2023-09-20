<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../style.css" />
        <title>Registrando a doctor...</title>
        <link rel="icon" type="image/x-icon" href="https://i.imgur.com/FUQHqOg.png">
    </head>
    <body>

        <?php
            $servername = "localhost";
            $database = "segurocitas";
            $username = "root";
            $password = "";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $database);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            echo "";
        ?>
        <section class="form-register">
            <form action="">              
                
                <?php
                    $Nombre = $_POST['Nombre'];
                    $Paterno = $_POST['Ap'];
                    $Materno = $_POST['Am'];
                    $Nacimiento = $_POST['Nacimiento'];
                    $tipoSangre = $_POST['Sangre'];
                    $Telefono = $_POST['Telefono'];
                    $Correo = $_POST['Correo'];
                    $User = $_POST['User'];
                    $Pass = $_POST['Pass'];
                            
                    $sql = "INSERT INTO `pacientedatos` (`idPaciente`, `nombre`, `paterno`, `materno`, `fechaN`, `tipoSangre`, `telefono`, `correo`, `user`, `pass`) VALUES 
                    (NULL, '$Nombre', '$Paterno', '$Materno', '$Nacimiento', '$tipoSangre', '$Telefono', '$Correo', '$User', '$Pass');";

                    if (mysqli_query($conn, $sql)) {
                        echo "<h1> Se ha registrado exitosamente </h1>";
                      } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                      }
                      mysqli_close($conn);
                ?>
            </form>
        </section>
        
        <section class="form-register">
            <form action="">
                <input class="botones" type="button" onclick="location.href='inicioSesionPaciente.html'" value="Iniciar Sesión">
                <input class="botones" type="button" onclick="location.href='../Main_principal.html'" value="Ir al inicio">
            </form>
        </section>
    </body>
</html>