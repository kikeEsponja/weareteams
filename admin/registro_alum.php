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
		form{
			display:flex;
			justify-content: center;
		}
		form > div > input{
			margin: 1%;
		}
	</style>
</head>
<body>
    <center>
        <h1 class="h1">Registro Alumnos</h1>
        <form action="../src/js/log_registro_alum.php" method="POST" id="form_reg">
			<div>
            	<input class="btn btn-dark" type="text" id="nombre" name="nombre" placeholder="ingrese nombre">
				<input class="btn btn-dark" type="text" id="apellido" name="apellido" placeholder="ingrese apellido">
			</div>
			<div>
            	<input class="btn btn-dark" type="email" id="correo" name="correo" placeholder="ingrese correo" required>
            	<select class="btn btn-dark" id="pais" name="pais" required>
            		<option id="empty" value="">País</option>
                	<option value="ar">Argentina</option>
                    <option value="bz">Belice</option>
                	<option value="bo">Bolivia</option>
                	<option value="br">Brasil</option>
                	<option value="ca">Canadá</option>
                	<option value="cl">Chile</option>
                	<option value="cn">China</option>
                	<option value="co">Colombia</option>
    				<option value="cr">Costa Rica</option>
    				<option value="cu">Cuba</option>
    				<option value="cw">Curazao</option>
    				<option value="do">República Dominicana</option>
    				<option value="ec">Ecuador</option>
    				<option value="es">España</option>
    				<option value="gt">Guatemala</option>
    				<option value="hn">Honduras</option>
    				<option value="ht">Haití</option>
    				<option value="mx">Méjico</option>
					<option value="ni">Nicaragua</option>                	
    				<option value="pa">Panamá</option>
    				<option value="es">España</option>
    				<option value="us">Estados Unidos</option>
                	<option value="pe">Perú</option>
    				<option value="pr">Puerto Rico</option>
    				<option value="sv">EL Salvador</option>
    				<option value="uy">Uruguay</option>
                	<option value="ve">Venezuela</option>
            	</select>
			</div>
            <div>
            	<input class="btn btn-dark" type="password" id="contras" name="contras" placeholder="Ingrese contraseña">
            	<input class="btn btn-dark" type="password" id="contras_rep" name="contras_rep" placeholder="Repita contraseña">
			</div>
			<div>
				<select class="btn btn-dark" id="perfil" name="perfil" required>
            		<option value="">Perfil</option>
    				<option value="Setter">Setter</option>
            		<option value="Closer">Closer</option>
            		<option value="Vendedor digital">Vendedor digital</option>
    			</select>
				<button class="btn btn-success" type="submit" id="boton_registro" onclick="validarContrasAl()">Registrarse</button>
			</div>
        </form>
        <br>
        <div>
            <label for="ir_a_login_alumnos">Ya tienes cuenta? ingresa aquí -></label>
            <button class="btn btn-warning" id="ir_a_login_alumnos">Login</button>
        </div>
        <br>
        <button type="button" class="btn btn-warning" onclick="goBack()">Volver</button>
        <button type="button" class="btn btn-warning" id="inicio">Ir al inicio</button>
    </center>
    <div class="red" style="top: 50%; height:300px;"></div>

    <script>
        const loginAlum = document.getElementById('ir_a_login_alumnos');
        loginAlum.addEventListener('click', ()=>{
            window.location.href = './login_alum.php';
        });

        const inicio = document.getElementById('inicio');
        inicio.addEventListener('click', ()=>{
            window.location.href = '../index.php';
        });

        const goBack = () =>{
            window.history.back();
        }

		const empty = document.getElementById('empty');
		empty.addEventListener('input', function(){
        	if(empty){
            	alert('elija una opción');
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="../src/js/funciones.js"></script>
</body>
</html>