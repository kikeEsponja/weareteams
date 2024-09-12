<?php
session_start();
include "config.php";

if ($_POST) {
    $email = mysqli_real_escape_string($conn, $_POST['correo']);
    $password = mysqli_real_escape_string($conn, $_POST['contras']);
    $sql = "SELECT id, nombre, correo FROM alumnos WHERE correo = '" . $email . "' and contras = '" . $password . "' ";
    $result = mysqli_query($conn, $sql);
    //$query =  mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['id'] = $row['id'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['correo'] = $row['correo'];

        header('Location: ../../admin/vista.php');
        exit();
    } else {
        echo "<script> alert('Correo o contraseña incorrectas.'); </script><br>";
        echo "<h4 class='text-light'>Has introducido una contraseña o un correo no válidos</h4>";
        echo '<a class="btn btn-warning" href="../../admin/login_alum.php">volver</a>';
    }
}else{
    echo "acceso denegado";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
	<link rel="shortcut icon" href="../img/logo_azul_wat.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Administración</title>
</head>
<body>
	<div class="blue" style="height:450px;"></div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>