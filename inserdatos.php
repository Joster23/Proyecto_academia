<html>
<head>
    <title>Formulario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .mensaje {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
            text-align: center;
            margin-bottom: 20px;
        }

        .volver {
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .volver:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "academia") or
        die("<div class='mensaje' style='background-color:#f8d7da;color:#721c24;'>Problemas con la conexión: " . mysqli_connect_error() . "</div>");

    $nombre = mysqli_real_escape_string($conexion, $_REQUEST['nombre']);
    $apellidopat = mysqli_real_escape_string($conexion, $_REQUEST['apellido']);
    $email = mysqli_real_escape_string($conexion, $_REQUEST['email']);
    $codigocurso = mysqli_real_escape_string($conexion, $_REQUEST['codigocurso']);

    $query = "INSERT INTO alumnos (nombre, apellidopat, email, codigocurso) VALUES ('$nombre', '$apellidopat', '$email', '$codigocurso')";

    if (mysqli_query($conexion, $query)) {
        echo "<div class='mensaje'>✅ El alumno fue dado de alta correctamente.</div>";
    } else {
        echo "<div class='mensaje' style='background-color:#f8d7da;color:#721c24;'>❌ Problemas en la inserción: " . mysqli_error($conexion) . "</div>";
    }

    mysqli_close($conexion);
    ?>

    <a class="volver" href="Pagina.html">← Volver a la principal</a>
</body>
</html>

