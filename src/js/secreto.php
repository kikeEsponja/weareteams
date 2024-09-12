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
</head>
<body>
<?php
include "./config.php";

if($_POST){
	$claveProfe = mysqli_real_escape_string($conn, $_POST['secreto']);

	$chequeoClave = "SELECT * FROM secreto";
	$resultClave = mysqli_query($conn, $chequeoClave);

	if(mysqli_num_rows($resultClave) > 0){
        $row = mysqli_fetch_assoc($resultClave);
        //$idClave = $row['id'];

    	$sql = "UPDATE secreto SET clave = '$claveProfe'";
    }else{
        $sql = "INSERT INTO secreto (clave) VALUES ('$claveProfe')";
    }
    $query = mysqli_query($conn, $sql);

    if($query){
        echo "<h2 class='text-light'>Clave secreta actualizada</h2><br><a class='btn btn-success' href='../../admin/admin.php'>volver</a>";
    }else{
        echo "<h2 class='text-light'>Algo salió mal</h2>";
    }
}
?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>