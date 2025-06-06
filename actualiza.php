<html>
<head>
    <title>Programa que borra alumno</title>
</head>
<body>
    <h1>Programa para actualizar Alumnno</h1>
    <?php   
    $conexion = mysqli_connect("localhost","root","","academia") or
        die("Problemas con la conexion");

        mysqli_query($conexion, "update alumnos
                                               set email='$_REQUEST[mailnuevo]'
                                               where email='$_REQUEST[mailviejo]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
    echo "El email fue modificado con exito"
    ?>
</body>
</html>