<?php
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

        if(mysqli_num_rows($resultCalifAlumno) > 0) {
            echo "<h3>calificaciones:</h3>";
            while ($rowCalif = mysqli_fetch_assoc($resultCalifAlumno)){
                echo "<h4>Materia: ". $rowCalif['materia'] . " - Calificación: " . $rowCalif['calificacion'] . "</h4>";
            }
        }else{
            echo "<h2>Algo salió mal</h2>";
        }
    }else{
        echo "<h4>Alumno no encontrado</h4>";
    }
}
echo "<a class='btn btn-danger' href='../../admin/admin.php'>volver</a>";
echo "<button id='descargar'>descargar reporte</button>";