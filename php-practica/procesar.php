<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos recibidos</title>
</head>
<body>
    <h1>Datos recibidos</h1>

    <?php
    $nombre = htmlspecialchars($_POST["nombre"] ?? "", ENT_QUOTES, "UTF-8");
    $correo = htmlspecialchars($_POST["correo"] ?? "", ENT_QUOTES, "UTF-8");
    $mensaje = htmlspecialchars($_POST["mensaje"] ?? "", ENT_QUOTES, "UTF-8");

    echo "<p>Nombre: " . $nombre . "</p>";
    echo "<p>Correo: " . $correo . "</p>";
    echo "<p>Mensaje: " . nl2br($mensaje) . "</p>";
    ?>

    <a href="index.html">Volver</a>
</body>
</html>
