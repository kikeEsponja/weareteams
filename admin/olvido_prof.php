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
	<style>
		.columna{
			display:flex;
			flex-direction:column;
			align-items:center;
		}
	</style>
</head>
<body>
    <center>
        <h1 class="h1">Restablecer contraseña</h1>
        <form action="../src/js/log_olvido_prof.php" method="POST">
            <input class="btn btn-input" type="email" id="correo" name="correo" placeholder="Ingrese correo">
            <br class="brtlf">
            <input class="btn btn-input" type="password" id="nueva_contras" name="nueva_contras" placeholder="Ingrese contraseña">
            <button type="submit" class="btn btn-dark">Actualizar</button>
        </form>
        <br>
        <div class="columna">
            <label for="ir_a_registro_profesores">No tiene usted cuenta? regístrese aquí -></label>
            <button class="btn btn-warning" id="ir_a_registro_profesores">Registro</button>
            <label for="ir_a_login_profesores">Recordó la contraseña? -></label>
            <button class="btn btn-warning" id="ir_a_login_profesores">Login</button>
        </div>
        <br>
        <button type="button" class="btn btn-warning" onclick="goBack()">Volver</button>
        <button type="button" class="btn btn-warning" id="inicio">Ir al inicio</button>
    </center>

    <script>
        const registroProf = document.getElementById('ir_a_registro_profesores');
        registroProf.addEventListener('click', ()=>{
            window.location.href = './registro_prof.php';
        });

        const loginProf = document.getElementById('ir_a_login_profesores');
        loginProf.addEventListener('click', ()=>{
            window.location.href = './login_prof.php';
        });

        const inicio =document.getElementById('inicio');
        inicio.addEventListener('click', ()=>{
            window.location.href = '../index.php';
        });

        const goBack = () =>{
            window.history.back();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>