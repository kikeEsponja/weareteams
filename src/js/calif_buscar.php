<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
	<link rel="shortcut icon" href="../img/logo_azul_wat.svg">
	<link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link href="../css/admin.css" rel="stylesheet">
	<title>Administración</title>
</head>
<body>
    <div class="blue" style="z-index: -100"></div>
<?php
include "config.php";

if($_POST){
	$correoAlumno = mysqli_real_escape_string($conn, $_POST['nombre_buscar']);

	$chequeoAlumno = "SELECT id, nombre FROM alumnos WHERE correo = '$correoAlumno'";
	$resultAlumno = mysqli_query($conn, $chequeoAlumno);

	if(mysqli_num_rows($resultAlumno) > 0){
        $rowAlumno = mysqli_fetch_assoc($resultAlumno);
        $idAlumno = $rowAlumno['id'];
        $nombreAlumno = $rowAlumno['nombre'];

        $califAlumno = "SELECT materias.materia, calificaciones_diarias.calificacion FROM calificaciones_diarias JOIN materias ON calificaciones_diarias.id_materia = materias.id WHERE calificaciones_diarias.id_alumno = '$idAlumno'";
        $resultCalifAlumno = mysqli_query($conn, $califAlumno);

        echo "<h3>Alumno: ".$nombreAlumno."</h3>";

        if(mysqli_num_rows($resultCalifAlumno) > 0) {
            echo "<h3>calificaciones:</h3>";
            while ($rowCalif = mysqli_fetch_assoc($resultCalifAlumno)){
                echo "<h4>Materia: ". $rowCalif['materia'] . " - Calificación: " . $rowCalif['calificacion'] . "</h4>";
            }
        }else{
            echo "<h2 class='bad'>Algo salió mal</h2>";
        }
    }else{
        echo "<h4>Alumno no encontrado</h4>";
    }
}
echo "<a class='btn btn-danger' href='../../admin/admin.php'>volver</a>";
echo "<a href='./descargar_califs.php?id_alumno=$idAlumno' class='btn btn-success'>descargar reporte</a>";
?>
    <script>
        let descargar =document.getElementById('descargar');
        descargar.addEventListener('click', ()=>{

        })
    </script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>