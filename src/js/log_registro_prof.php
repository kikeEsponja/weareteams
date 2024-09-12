<?php

include "./config.php";

if($_POST)
{
	//$user=$_POST['usuario'];
	$name=$_POST['nombre'];
	//$number=$_POST['telefono'];
	$email=$_POST['correo'];
	$password=$_POST['contras'];
	//$address=$_POST['direccion'];

	$chequeo = "SELECT * FROM profes WHERE nombre = '$name'";
	$result = mysqli_query($conn, $chequeo);

	if(mysqli_num_rows($result) > 0){
		echo "<h2 class='bad'>Usuario existente</h2><br><br><a href='../../admin/registro_prof.php'>volver</a>";
	}else{
		$sql="INSERT INTO `profes`(`nombre`, `correo`, `contras`) VALUES ('".$name."','".$email."','".$password."')";

		$query = mysqli_query($conn,$sql);
		if($query)
		{
			session_start();
			$_SESSION['nombre'] = $name;
			header('Location: ../../admin/bienvenido.php');
		}
		else
		{
			echo "Algo salió mal";
		}

	}
	
}
?>