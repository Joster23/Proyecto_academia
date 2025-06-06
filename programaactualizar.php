<html>
<head>
    <title>Actualizar Alumno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .formulario {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"] {
            margin-top: 15px;
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        .volver {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .volver a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }

        .volver a:hover {
            text-decoration: underline;
        }

        .mensaje {
            text-align: center;
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Actualizar Email de Alumno</h1>

    <?php
    if (!isset($_REQUEST['cajitamail']) || empty(trim($_REQUEST['cajitamail']))) {
        echo "<div class='mensaje'>❌ No se proporcionó un email válido para buscar.</div>";
    } else {
        $conexion = mysqli_connect("localhost", "root", "", "academia") or 
            die("❌ Problemas con la conexión.");

        $email = mysqli_real_escape_string($conexion, $_REQUEST['cajitamail']);

        $registros = mysqli_query($conexion, "SELECT * FROM alumnos WHERE email='$email'") or 
            die("❌ Problemas en el SELECT: " . mysqli_error($conexion));

        if ($reg = mysqli_fetch_array($registros)) {
    ?>
        <div class="formulario">
            <form action="actualiza.php" method="post">
                <label for="mailnuevo">Nuevo Email:</label>
                <input type="text" name="mailnuevo" value="<?php echo $reg['email']; ?>">

                <input type="hidden" name="mailviejo" value="<?php echo $reg['email']; ?>">

                <input type="submit" value="Modificar Correo">
            </form>
        </div>
    <?php
        } else {
            echo "<div class='mensaje'>❌ No existe un alumno con ese email.</div>";
        }

        mysqli_close($conexion);
    }
    ?>

    <div class="volver">
        <a href="Pagina.html">← Volver a la página principal</a>
    </div>
</body>
</html>
