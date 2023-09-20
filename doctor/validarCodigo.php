<?php
    $servername = "localhost";
    $dbname = "segurocitas";
    $username = "root";
    $password = "";
    // Crea una conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica si hay errores en la conexión
    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }
?>
<?php
// ...

// Obtiene el valor de la clave enviada desde el formulario HTML
$codigo = $_POST['codigo'];

// Realiza una consulta para verificar si la clave existe en la base de datos
$sql = "SELECT * FROM codigos WHERE codigo = '$codigo'";
$resultado = $conn->query($sql);

// Verifica si se encontró una coincidencia de clave en la base de datos
if ($resultado->num_rows > 0) {
    // La clave es válida
    echo "codigo_valido";
} else {
    // La clave no es válida
    echo "codigo_invalido";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
