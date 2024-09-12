<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
	<link rel="shortcut icon" href="../src/img/logo_azul_wat.svg">	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/admin.css">
    <title>Administración</title>
</head>
<body>
	<div class="blue"></div>
    <center>
        <h1 class="h1">Seleccione su perfil:</h1>
        <div>
            <button type="button" class="btn btn-success" id="profe">PROFESOR</button>
            <button type="button" class="btn btn-primary" id="alumno">ALUMNO</button>
        </div>
        <br>
        <button type="button" class="btn btn-warning" onclick="goBack()">Volver</button>
    </center>

    <script>
        const profe = document.getElementById('profe');
        profe.addEventListener('click', () =>{
            window.location.href = './login_prof.php';
        });

        const alumn = document.getElementById('alumno');
        alumn.addEventListener('click', () =>{
            window.location.href = './login_alum.php';
        });

        const goBack = () =>{
            window.history.back();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src='./admin.js'></script>
</body>
</html>