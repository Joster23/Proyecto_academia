<html>
<head>
    <title>Eliminar Alumno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding-top: 50px;
        }

        .mensaje {
            display: inline-block;
            background-color: #d1ecf1;
            color: #0c5460;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .volver {
            display: inline-block;
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .volver:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Eliminar Alumno</h1>

    <?php
    $conexion = mysqli_connect("localhost", "root", "", "academia") or 
        die("<div class='mensaje error'>❌ Problemas con la conexión</div>");

    $email = mysqli_real_escape_string($conexion, $_REQUEST['email']);

    $registros = mysqli_query($conexion, "SELECT codigo FROM alumnos WHERE email='$email'") or 
        die("<div class='mensaje error'>❌ Problemas en el SELECT: " . mysqli_error($conexion) . "</div>");

    if ($reg = mysqli_fetch_array($registros)) {
        mysqli_query($conexion, "DELETE FROM alumnos WHERE email='$email'") or
            die("<div class='mensaje error'>❌ Problemas en el DELETE: " . mysqli_error($conexion) . "</div>");
        echo "<div class='mensaje'>✅ Alumno con email <strong>$email</strong> ha sido eliminado correctamente.</div>";
    } else {
        echo "<div class='mensaje error'>❌ No existe un alumno con el email <strong>$email</strong>.</div>";
    }

    mysqli_close($conexion);
    ?>

    <a class="volver" href="Pagina.html">← Volver a la principal</a>
</body>
</html>
