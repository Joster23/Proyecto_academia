<!DOCTYPE html>
<html>
<head>
    <title>Listado de Alumnos</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f8;
            padding: 50px;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .volver {
            margin-top: 30px;
            display: inline-block;
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
        }

        .volver:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <h2>Listado de Alumnos</h2>
    <table>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Curso</th>
        </tr>
        <?php
        $conexion = mysqli_connect("localhost", "root", "", "academia") or die("Error en la conexión");

        $registros = mysqli_query($conexion, "SELECT * FROM alumnos") or die("Error en la consulta");

        $cursos = [1 => 'PHP', 2 => 'Java', 3 => 'Python', 4 => 'C++', 5 => 'JavaScript'];

        while ($reg = mysqli_fetch_array($registros)) {
            $cursoNombre = isset($cursos[$reg['codigocurso']]) ? $cursos[$reg['codigocurso']] : 'Desconocido';

            echo "<tr>";
            echo "<td>{$reg['codigo']}</td>";
            echo "<td>{$reg['nombre']} {$reg['apellidopat']}</td>";
            echo "<td>{$reg['email']}</td>";
            echo "<td>{$cursoNombre}</td>";
            echo "</tr>";
        }

        mysqli_close($conexion);
        ?>
    </table>

    <a class="volver" href="Pagina.html">← Volver a la principal</a>
</body>
</html>
