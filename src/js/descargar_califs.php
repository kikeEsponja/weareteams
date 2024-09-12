<?php
include "./config.php";

if(isset($_GET['id_alumno'])){
    $idAlumno = mysqli_real_escape_string($conn, $_GET['id_alumno']);

    $chequeoAlumno = "SELECT nombre FROM alumnos WHERE id = '$idAlumno'";
    $resultAlumno = mysqli_query($conn, $chequeoAlumno);

    if(mysqli_num_rows($resultAlumno) > 0){
        $rowAlumno = mysqli_fetch_assoc($resultAlumno);
        $nombreAlumno = $rowAlumno['nombre'];

        $califAlumno = "SELECT materias.materia, calificaciones_diarias.calificacion FROM calificaciones_diarias JOIN materias ON calificaciones_diarias.id_materia = materias.id WHERE calificaciones_diarias.id_alumno = '$idAlumno'";
        $resultCalifAlumno = mysqli_query($conn, $califAlumno);

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="calificaciones_' . $nombreAlumno . '.csv"');

        $output = fopen('php://output', 'w');

        fputcsv($output, array('Materia', 'Calificacion'));

        if(mysqli_num_rows($resultCalifAlumno) > 0){
            while($rowCalif = mysqli_fetch_assoc($resultCalifAlumno)){
                fputcsv($output, array($rowCalif['materia'], $rowCalif['calificacion']));
            }
        }

        fclose($output);
        exit();
    }else{
        echo "Alumno no encontrado.";
    }
}else{
    echo "ID de alumno no proporcionado.";
}