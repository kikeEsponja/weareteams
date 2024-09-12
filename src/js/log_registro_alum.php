<?php

include "config.php";

if($_POST)
{
	//$user=$_POST['usuario'];
	$name=$_POST['nombre'];
	$pais=$_POST['pais'];
	$email=$_POST['correo'];
	$password=$_POST['contras'];
	$perfil=$_POST['perfil'];
	$apellido=$_POST['apellido'];

	$chequeo = "SELECT * FROM alumnos WHERE nombre = '$name'";
	$result = mysqli_query($conn, $chequeo);

	if(mysqli_num_rows($result) > 0){
		echo "<h2 class='bad'>Usuario existente</h2><br><br><a href='../../admin/registro_alum.php'>volver</a>";
	}else{
		$sql="INSERT INTO `alumnos`(`nombre`, `correo`, `contras`, `pais`, `perfil`, `apellido`) VALUES ('".$name."','".$email."','".$password."','".$pais."','".$perfil."','".$apellido."')";

		$query = mysqli_query($conn,$sql);
		if($query)
		{
			session_start();
			$_SESSION['nombre'] = $name;
			header('Location: ../../admin/bienvenidoal.php');
		}
		else
		{
			echo "Algo salió mal";
		}
	}	
}
?>