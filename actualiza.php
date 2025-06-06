<html>
<head>
    <title>Programa que borra alumno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        .container {
            background-color: #fff;
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .message {
            font-size: 18px;
            color: green;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Programa para actualizar Alumno</h1>
        <?php   
        $conexion = mysqli_connect("localhost", "root", "", "academia") or
            die("Problemas con la conexión");

        mysqli_query($conexion, "UPDATE alumnos
                                 SET email='$_REQUEST[mailnuevo]'
                                 WHERE email='$_REQUEST[mailviejo]'") or
            die("Problemas en el select: " . mysqli_error($conexion));

        echo "<div class='message'>El email fue modificado con éxito.</div>";
        ?>
        <a class="button" href="pagina.html">Volver a la página principal</a>
    </div>
</body>
</html>
