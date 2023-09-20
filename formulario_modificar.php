<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Agregando producto (Juego)</title>
        <link rel="icon" type="image/x-icon" href="https://i.imgur.com/FUQHqOg.png">
    </head>
    <body>

        <section class="form-register">
            <form action="modificar.php" method="post">
                <h4>Modificando cita</h4>
                <input class="botones" type="reset" value="Limpiar espacios">
                <br><br>

                <?php $nombre = $_POST['producto_seleccionado']; ?>

                <h1>Nombre del paciente</h1>
                <input class="controls" type="text" name="Nombre" id="nombre" value="<?php echo $nombre; ?>" readonl>

                <h1>Apellido paterno</h1>
                <input class="controls" type="text" name="Ap" id="apeP">

                <h1>Apellido materno</h1>
                <input class="controls" type="text" name="Am" id="apeM">

                <h1>Fecha de nacimiento</h1>
                <input class="controls" type="date" name="Nacimiento" maxlength="30" id="nacimiento" placeholder="Fecha de nacimiento">
                
                <h1>Teléfono</h1>
                <input class="controls" type="text" name="Telefono" maxlength="30" id="telefono" placeholder="Teléfono">

                <h1>Correo</h1>
                <input class="controls" type="text" name="Correo" maxlength="80" id="correo" placeholder="correo...">

                <h1>Tipo de sangre</h1>
                <input class="controls" type="text" name="Sangre" maxlength="20" id="sangre" placeholder="Sangre...">

                <h1>Descripción</h1>
                <input class="controls" type="text" name="Descripcion" maxlength="300" id="descripcion" placeholder="descripción...">

                <br><br>

                <input class="botones" type="submit" onclick="alert('¡Registrado!')" value="Modificar paciente">
            </form>
        </section>

        <br> <br>
        <br> <br>
        <br> <br>
        <br> <br>

    </body>
</html>