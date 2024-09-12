<?php
// Conectar a la base de datos
include "./config.php";

// Obtener todas las materias predefinidas
$consultaMaterias = "SELECT id FROM materias";
$resultMaterias = mysqli_query($conn, $consultaMaterias);

// Obtener todos los alumnos registrados
$consultaAlumnos = "SELECT id FROM alumnos";
$resultAlumnos = mysqli_query($conn, $consultaAlumnos);

if (mysqli_num_rows($resultAlumnos) > 0 && mysqli_num_rows($resultMaterias) > 0) {
    while ($rowAlumno = mysqli_fetch_assoc($resultAlumnos)) {
        $idAlumno = $rowAlumno['id'];

        // Insertar todas las materias para cada alumno
        mysqli_data_seek($resultMaterias, 0); // Reiniciar el puntero del resultado
        while ($rowMateria = mysqli_fetch_assoc($resultMaterias)) {
            $idMateria = $rowMateria['id'];

            // Insertar la relación entre alumno y materia si no existe
            $sqlInsert = "INSERT INTO materias_alumnos (id_alumno, id_materia) VALUES ('$idAlumno', '$idMateria')";
            mysqli_query($conn, $sqlInsert);
        }
    }
    echo "Materias asignadas correctamente a todos los alumnos.";
} else {
    echo "No se encontraron materias o alumnos.";
}