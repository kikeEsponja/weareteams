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
include "config.php";

if($_POST){
	$correoAlumno = mysqli_real_escape_string($conn, $_POST['correo_alumno']);
    //$materia = mysqli_real_escape_string($conn, $_POST['materia']);
	$calificacion = (int)$_POST['calificacion'];

	$chequeoAlumno = "SELECT id FROM alumnos WHERE correo = '$correoAlumno'";
	$resultAlumno = mysqli_query($conn, $chequeoAlumno);

	if(mysqli_num_rows($resultAlumno) > 0){
        $row = mysqli_fetch_assoc($resultAlumno);
        $idAlumno = $row['id'];
        $chequeoMateria = "SELECT * FROM materias WHERE id_alumno = '$idAlumno' AND materia = '$materia'";
        $resultMateria = mysqli_query($conn, $chequeoMateria);

        if(mysqli_num_rows($resultMateria) > 0){
            $sql = "UPDATE materias SET calificacion = '$calificacion' WHERE id_alumno = '$idAlumno' AND materia = '$materia'";
        }else{
            echo "hubo un problema";
        }
        $query = mysqli_query($conn, $sql);

        if($query){
            echo "<h2 class='text-light'>Calificación actualizada</h2><br><a class='btn btn-success' href='../../admin/admin.php'>volver</a>";
        }else{
            echo "<h2 class='text-light'>Algo salió mal</h2>";
        }
    }
}
?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>