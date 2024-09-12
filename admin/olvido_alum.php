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
        <form action="../src/js/log_olvido_alum.php" method="POST">
            <input class="btn btn-input" type="email" id="correo" name="correo" placeholder="Ingrese correo">
            <br class="brtlf">
            <input class="btn btn-input" type="password" id="nueva_contras" name="nueva_contras" placeholder="Ingrese contraseña">
            <button type="submit" class="btn btn-dark">Actualizar</button>
        </form>
        <br>
        <div class="columna">
            <label for="ir_a_registro_alumnos">No tienes cuenta? regístrate aquí -></label>
            <button class="btn btn-warning" id="ir_a_registro_alumnos">Registro</button>
            <label for="ir_a_login_alumnos">Recordaste la contraseña? -></label>
            <button class="btn btn-warning" id="ir_a_login_alumnos">Login</button>
        </div>
        <br>
        <button type="button" class="btn btn-warning" onclick="goBack()">Volver</button>
        <button type="button" class="btn btn-warning" id="inicio">Ir al inicio</button>
    </center>

    <script>
        const registroAlum = document.getElementById('ir_a_registro_alumnos');
        registroAlum.addEventListener('click', ()=>{
            window.location.href = './registro_alum.php';
        });

        const loginAlum = document.getElementById('ir_a_login_alumnos');
        loginAlum.addEventListener('click', ()=>{
            window.location.href = './login_alum.php';
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