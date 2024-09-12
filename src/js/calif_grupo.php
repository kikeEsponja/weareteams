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
error_reporting(E_ALL);
ini_set("display_errors", 1);

use Shuchkin\SimpleXLSX;
include "./config.php";
include "./SimpleXLSX.php";

if(isset($_FILES['archivo'])){
    $archivo = $_FILES['archivo']['tmp_name'];
    echo "Archivo recibido: " . $archivo . "<br>";

    if($xlsx = SimpleXLSX::parse($archivo)){
        echo "Archivo procesado<br>";

        //$fechaActual = date('Y-m-d');  // Obtener la fecha actual

        foreach($xlsx->rows() as $row){
            echo "Procesando fila: " . implode(", ", $row) ."<br>";

            $fecha = mysqli_real_escape_string($conn, $row[0]);
            $nombreAlumno = mysqli_real_escape_string($conn, $row[1]);
            $apellidoAlumno = mysqli_real_escape_string($conn, $row[2]);
            $correoAlumno = mysqli_real_escape_string($conn, $row[3]);
            $materia = mysqli_real_escape_string($conn, $row[4]);
            $calificacion = (int)$row[5];

            // Verificar si el alumno ya existe en la base de datos
            $chequeoAlumno = "SELECT id FROM alumnos WHERE correo = '$correoAlumno'";
            $resultAlumno = mysqli_query($conn, $chequeoAlumno);

            if(mysqli_num_rows($resultAlumno) > 0){
                $rowAlumno = mysqli_fetch_assoc($resultAlumno);
                $idAlumno = $rowAlumno['id'];

                // Obtener el id de la materia predefinida
                $chequeoMateria = "SELECT id FROM materias WHERE materia = '$materia'";
                $resultMateria = mysqli_query($conn, $chequeoMateria);

                if(mysqli_num_rows($resultMateria) > 0){
                    $rowMateria = mysqli_fetch_assoc($resultMateria);
                    $idMateria = $rowMateria['id'];

                    $sqlInsertarCalificacion = "INSERT INTO calificaciones_diarias (id_alumno, id_materia, calificacion, fecha) VALUES ('$idAlumno', '$idMateria', '$calificacion', '$fecha')";

                    mysqli_query($conn, $sqlInsertarCalificacion);
                } else {
                    echo "No se encontró la materia $materia.";
                }
            } else {
                echo "Alumno no encontrado: $correoAlumno.<br>";
            }
        }
        echo "<h2>Calificaciones actualizadas</h2><br><a class='btn btn-success' href='../../admin/admin.php'>Volver</a>";
    } else {
        echo SimpleXLSX::parseError();
        echo "Error al procesar el archivo";
    }
}
?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>