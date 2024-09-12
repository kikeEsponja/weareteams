<?php 
	session_start();
	if(isset($_SESSION['nombre']))
	{
	include "../src/js/config.php"; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--<meta http-equiv="refresh" content="20"> para refrescar la pagina-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="fortrainevolution.com">
	<meta name="description" content="sistema administrativo para we are team">
    <link rel="shortcut icon" href="../src/img/logo_azul_wat.svg">
	<link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
	<link rel="shortcut icon" href="./src/img/logo_azul_wat.svg">	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/admin.css">
    <title>Administración</title>
	<style>
		body{
			color: #fff;
		}
    	img{
        	width:5%;
        }
    	.caution{
        	border-radius: 50%;
        	width: 40px;
        	height: 40px;
        	box-shadow: 3px 2px 8px 1px
        }
    	.form_secreto{
    		display:none;
    	}
    	@media(max-width: 420px){
        	img{
            	width:30%;
            }
            .fecha{
        		display:block;
        	}
        }
	</style>
</head>
<body>
<header>
    <img src="../src/img/logo_blonco_wat.svg">
</header>
	<hr>
    <div>
        <div class="mi-dinero bg-primary">
            <div>
              <h3 class="ok" id="SaludoUser-coin"><?php echo $_SESSION['nombre']; ?> </h3>
            </div>
        </div>
        <!--<h1 class="h1">ADMIN</h1>-->
        <div class="loader" id="loader"></div>
    </div>
    <!--<div class="minichat mi-dinero w-25 bg-danger">
      <iframe src="http://localhost:3000" width="100%" height="100%" id="embed-minichat"></iframe>
    </div>-->

<main>
	<div class="main">
		<div>
    		<div class="botones">
                <button class="btn btn-warning" id="cerrarSes">Cerrar sesión</button><br>
            </div>
			<div class="bg-dark sigonosigo" id="confirma" style="display:none;">
            	<h4 class="bad">Estás seguro que deseas salir?</h4>
                <button class="btn btn-danger" id="si">Sí</button>
                <button class="btn btn-info" id="no">No</button>
			</div>
          	<div>
            	<div class="bg-warning seguirjugando" id="excelente" style="display:none;">Continuemos</div>
            </div>
			<!--<a href="#embed-minichat" class="btn btn-primary" style="font-size: 20px;">CHAT</a>-->
		</div>
	</div>
    <center>
        <h1 class="h1">Calificaciones</h1>
        <h2>Ingresar calificacion</h2>
        <form action="../src/js/calif.php" method="POST">
            <input class="btn btn-light" type="text" id="nombre" name="nombre" placeholder="ingrese nombre del alumno">
    		<input class="btn btn-light" type="text" id="apellido" name="apellido" placeholder="ingrese apellido del alumno">
            <input class="btn btn-light" type="email" id="correo_alumno" name="correo_alumno" placeholder="Correo de alumno">
            <!--<input type="text" id="materia" name="materia" placeholder="ingrese materia">-->
    		<select class="btn btn-light" id="materia" name="materia" required>
    			<option value="">Tipo de calificación</option>
        		<option value="Examen">Examen</option>
    			<option value="KPI +60 aperturas al dia">KPI +60 aperturas al día</option>
    			<option value="KPI +80 aperturas al dia">KPI +80 aperturas al día</option>
    			<option value="KPI +100 aperturas al dia">KPI +100 aperturas al día</option>
    			<option value="Agenda realizada">Agenda realizada</option>
    			<option value="Cierre de venta">Cierre de venta</option>
    			<option value="Asistencia completa">Asistencia completa</option>
            	<option value="Llegada tarde o retiro">Llegada tarde o retiro</option>
            	<option value="Aporte de valor">Aporte de valor</option>
            	<option value="Camara encendida">Cámara encendida</option>
    			<option value="Rol Play 1: Examenes">Rol Play 1: Exámenes</option>
    			<option value="Rol Play 2: Avanzados">Rol Play 2: Avanzados</option>
    			<option value="Rol Play 3: Clientes">Rol Play 3: Clientes</option>
            	<option value="Baja de cliente">Baja de cliente</option>
            	<option value="Ausencia en clases">Ausencia en clases</option>
    		</select>
            <input class="btn btn-light" type="number" id="calif" name="calificacion" placeholder="Ingrese calificación">

            <button class="btn btn-success" type="submit">Calificar</button>
        </form>

    	<hr>
        <h2>Ingresar calificacion por grupo</h2>
        <form action="../src/js/calif_grupo.php" method="POST" enctype="multipart/form-data">
            <input class="btn btn-light" type="file" id="archivo" name="archivo" accept=".xlsx, .xls">
            <button class="btn btn-success" type="submit">Calificar</button>
        </form>

    	<hr>
        <h2>Buscar calificacion</h2>
        <form action="../src/js/calif_buscar.php" method="POST">
            <input class="btn btn-light" type="email" id="nombre_buscar" name="nombre_buscar" placeholder="Correo del alumno">
            <button class="btn btn-success" type="submit">Buscar</button>
        </form>

    	<!--<hr>
        <h2>Modificar calificacion</h2>
        <form action="../src/js/calif_modificar.php" method="POST">
            <input class="btn btn-light" type="email" id="correo_mod" name="correo_mod" placeholder="Correo del alumno">
            <input class="btn btn-light" type="number" id="calif_mod" name="calif_mod" placeholder="Ingrese calificación">
            <button class="btn btn-warning" type="submit">Modificar</button>
        </form>-->

    	<hr>
    	<h3 class="text-danger">Zona de peligro</h3>
        <h2>Eliminar alumno</h2>
        <form action="../src/js/calif_eliminar.php" method="POST">
            <input class="btn btn-light" type="email" id="correo_del" name="correo_del" placeholder="Correo del alumno">
            <button class="btn btn-danger" type="submit">Borrar</button>
        </form>
    </center>
    <div>
    	<form action="../src/js/secreto.php" method="POST" class="form_secreto" id="form_secreto">
    		<input class="btn btn-light" type="password" id="secreto" name="secreto" placeholder="Clave de profesor">
        	<button class="btn btn-light" type="submit">Cambiar clave</button>
    		<button class="btn btn-warning" type="button" id="cancelar">Cancelar</button>
    	</form>
    	<button class="btn btn-danger caution" id="caution">!</button>
    </div>
</main>
	<script>
        var botonCerrar = document.getElementById("cerrarSes");
        var confText = document.getElementById("confirma");
        var yes = document.getElementById("si");
        var nain = document.getElementById("no");
        var excelente = document.getElementById("excelente");
        botonCerrar.addEventListener("click", function(){
            confText.style.display = "flex";
        });
        yes.addEventListener("click", function(){
            window.location.href = "../index.php";
        });
        no.addEventListener("click", function(){
            excelente.style.display = "block";
            confText.style.display = "none";
            setTimeout(function(){
                excelente.style.display = "none";
            }, 2000);
        });
    
        var botonSecreto = document.getElementById("caution");
        var cancelar = document.getElementById("cancelar");
    	var formSecreto = document.getElementById('form_secreto');
    
        botonSecreto.addEventListener("click", function(){
        	formSecreto.style.display = "flex";
        });
    
    	cancelar.addEventListener('click', function(){
        	formSecreto.style.display = "none";
        });
    
		const validarContras = () => {
    		let pass = document.getElementById('contras');
    		let passRep = document.getElementById('contras_rep');
    		let claveIntruso = document.getElementById('clave_prof');

		    fetch('./obtenerclave.php')
        		.then(response => response.json())
        		.then(data => {
            		if(data.clave) {
                
                		if(pass.value !== passRep.value || claveIntruso.value !== data.clave) {
                    		let formReg = document.getElementById('form_reg');
                    		event.preventDefault();
                    		alert('Las contraseñas no coinciden o la clave de profesor es incorrecta');
                		}
            		} else {
                		alert('Error al obtener la clave secreta');
            		}
        		})
        		.catch(error => console.error('Error:', error));
		};

    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
<?php
	}
	else
	{
		header('location:index.php');
	}
?>