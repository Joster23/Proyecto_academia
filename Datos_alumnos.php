<!DOCTYPE html>
<html>
<head>
    <title>Datos del Alumno</title>
    <link rel="stylesheet" href="hoja1.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            text-align: center;
            padding-top: 60px;
        }

        .card {
            background-color: white;
            padding: 30px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 400px;
        }

        .card h2 {
            color: #007BFF;
            margin-bottom: 20px;
        }

        .card p {
            font-size: 16px;
            margin: 10px 0;
            color: #333;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .volver {
            display: inline-block;
            margin-top: 20px;
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
        }

        .volver:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<?php
$conexion = mysqli_connect("localhost", "root", "", "academia") or
    die("<p class='error'>❌ Error de conexión a la base de datos</p>");

$email = mysqli_real_escape_string($conexion, $_POST['email']);

$consulta = mysqli_query($conexion, "SELECT * FROM alumnos WHERE email='$email'") or
    die("<p class='error'>❌ Error en la consulta</p>");

if ($alumno = mysqli_fetch_array($consulta)) {
    $cursos = [1 => 'PHP', 2 => 'Java', 3 => 'Python', 4 => 'C++', 5 => 'JavaScript'];
    $curso = isset($cursos[$alumno['codigocurso']]) ? $cursos[$alumno['codigocurso']] : 'Desconocido';

    echo "<div class='card'>";
    echo "<h2>Datos del Alumno</h2>";
    echo "<p><strong>Nombre:</strong> {$alumno['nombre']} {$alumno['apellidopat']}</p>";
    echo "<p><strong>Email:</strong> {$alumno['email']}</p>";
    echo "<p><strong>Curso:</strong> $curso</p>";
    echo "</div>";
} else {
    echo "<p class='error'>❌ No se encontró ningún alumno con ese email.</p>";
}

mysqli_close($conexion);
?>

<a class="volver" href="Pagina.html">← Volver</a>

</body>
</html>

