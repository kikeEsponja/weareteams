<?php
include '../src/js/config.php';

header('Content-Type: application/json');

/*if(!$conn){
	echo json_encode(['error' => 'Error de conexión']);
    exit;
}*/

$sql = "SELECT clave FROM secreto";
$result = mysqli_query($conn, $sql);

if($result && mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_assoc($result);
	echo json_encode(['clave' => $row['clave']]);
}else{
	echo json_encode(['error' => 'no hay clave']);
}

mysqli_close($conn);