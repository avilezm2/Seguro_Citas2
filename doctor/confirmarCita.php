<!DOCTYPE html>
<html>
    <head>
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
                background-color: #c5ac1f;
            }
        </style>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Buscar</title>
        <link rel="icon" type="image/x-icon" href="https://i.imgur.com/yjta1o5.png">
    </head>
    <body>

        <?php
            $servername = "localhost";
            $database = "seven";
            $username = "root";
            $password = "";

            $productoSelect = $_POST['producto_seleccionado'];

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $database);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            echo "";
            //mysqli_close($conn);
        ?>

        <br><br><br>
        <section class="form-register">
            <form action="">
                <input class="botones" type="button" onclick="location.href='Main.html'" value="Regresar al Main">
                <input class="botones" type="button" onclick="location.href='seleccionar_Producto_buscar.php'" value="Buscar otro producto">
            </form>
        </section>

        <section class="form-register">
            <form action="">
                <?php  
                    $sql = "SELECT IdProducto, Nombre, Fecha_Ingreso, Categoria, Precio FROM productos WHERE IdProducto = '$productoSelect'";
                    //echo $sql;
                    $result = $conn->query($sql);
                    
                    echo "<h1>Producto de 7 iLEBEN Games Store</h1><br>";
                    echo "<table>";
                    if ($result->num_rows > 0) {
                        // output data of each row
                        echo "<tr>";
                        echo "<th>ID del producto:</th>";
                        echo "<th>Nombre:</th>";
                        echo "<th>Fecha de ingreso:</th>";
                        echo "<th>Categoria:</th>";
                        echo "<th>Precio:</th>";
                        echo "</tr>";
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td>" . $row["IdProducto"] . "</td>";
                                echo "<td>" . $row["Nombre"] . "</td>";
                                echo "<td>" . $row["Fecha_Ingreso"] . "</td>";
                                echo "<td>" . $row["Categoria"] . "</td>";
                                echo "<td>" . $row["Precio"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }

                    $conn->close();
                ?>
            </form>
        </section>
        
        

    </body>
</html>