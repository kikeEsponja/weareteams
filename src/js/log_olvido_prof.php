<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
	<link rel="shortcut icon" href="../img/logo_azul_wat.svg">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link href="../css/admin.css" rel="stylesheet">
	<title>Administración</title>
	<style>
		body{
			color: #fff;
		}
	</style>
</head>
<body>
<?php
include './config.php';

if($_POST){
	$correo = mysqli_real_escape_string($conn, $_POST['correo']);
	$nueva_contras = mysqli_real_escape_string($conn, $_POST['nueva_contras']);

	$sql = "UPDATE profes SET contras = '$nueva_contras' WHERE correo = '$correo'";
	$query = mysqli_query($conn, $sql);

	if($query){
    	echo "<h2>Contraseña actualizada con éxito</h2>";
    	echo "<a class='btn btn-success' href='../../admin/login_prof.php'>ir a logearse</a>";
    }else{
    	echo "Error en restablecimiento de contraseña";
    }
}
?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>