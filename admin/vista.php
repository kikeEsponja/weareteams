<?php
	session_start();
	if(isset($_SESSION['nombre']) && isset($_SESSION['correo'])){
		include "../src/js/config.php"; 
		
        $correoAlumno = mysqli_real_escape_string($conn, $_SESSION['correo']);
		$idAlumno = mysqli_real_escape_string($conn, $_SESSION['id']);

        $chequeoAlumno = "SELECT nombre, perfil FROM alumnos WHERE id = '$idAlumno'";
        $resultAlumno = mysqli_query($conn, $chequeoAlumno);

        if(mysqli_num_rows($resultAlumno) > 0){
            $rowAlumno = mysqli_fetch_assoc($resultAlumno);
            $nombreAlumno = $rowAlumno['nombre'];
        	$perfilAlumno = $rowAlumno['perfil'];

            $califAlumno = "SELECT materias.materia, calificaciones_diarias.calificacion FROM calificaciones_diarias JOIN materias ON calificaciones_diarias.id_materia = materias.id WHERE calificaciones_diarias.id_alumno = '$idAlumno'";
            $resultCalifAlumno = mysqli_query($conn, $califAlumno);    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!--<meta http-equiv="refresh" content="20"> para refrescar la pagina-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="fortrainevolution.com">
	<meta name="description" content="sistema administrativo">
	<link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
	<link rel="shortcut icon" href="../src/img/logo_azul_wat.svg">	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/admin.css">
    <title>Administración</title>
	<style>
		h3{
			line-height: 2;
		}
        img{
        	width: 5%;
        }
        .fecha{
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
    <div class="blue"></div>
	<header>
    	<img src="../src/img/logo_blonco_wat.svg">
    	<hr>
    	<div>
        	<div class="mi-dinero bg-primary">
            	<div>
              		<h3 class="ok" id="SaludoUser-coin"><?php echo $_SESSION['nombre']; echo ' [' . $rowAlumno['perfil'] . ']'?> </h3>
            	</div>
            	<p><span id="nota"><?php if(mysqli_num_rows($resultCalifAlumno) > 0){ echo "<h3>notas:</h3>"; while($rowCalif = mysqli_fetch_assoc($resultCalifAlumno)){ echo "<p>Curso: ". $rowCalif['materia'] . " - Nota: " . $rowCalif['calificacion'] . "</p>"; }}else{ echo "<h2>No hay calificaciones aún</h2>";}}else{ echo "<h4>Alumno no encontrado</h4>";} ?></span></p>
        	</div>
        	<div class="loader" id="loader"></div>
    	</div>
	</header>
	<main>
		<div>
        	<div class="botones">
                <button class="btn btn-warning" id="cerrarSes">cerrar sesión</button><br>
            </div>
			<div class="text-light sigonosigo" id="confirma" style="display:none;">
            	<h4 class="bad">Confirmar salida</h4>
                <button class="btn btn-danger" id="si">Sí</button>
                <button class="btn btn-info" id="no">No</button>
			</div>
          	<div>
            	<div class="bg-warning seguirjugando" id="excelente" style="display:none;">Continuemos!</div>
            </div>
            <footer>
            </footer>
		</div>
    	<center>
        	<h2 class="text-light" id="formulario-diario"></h2>
        	<div id="calificaciones"></div>
        	<hr>
        	<form class="form_diario" action="../src/js/calif_diario.php" method="POST">
        		<label for="fecha" class="fecha">Fecha:</label>
            	<input class="btn btn-outline-primary" type="date" id="fecha" name="fecha" placeholder="fecha">
            	<input class="btn btn-outline-primary" type="number" id="dia_num" name="dia_num" placeholder="día número:">
        		<p id="error-mensaje" style="color:#f00; display:none;">El número no puede ser mayor a 31</p>
        		<div class="contenedor_sec">
        		<div class="sec">
        			<h3>OUTBOUND</h3>
            		<input class="btn btn-outline-primary" type="number" id="apertura" name="apertura" placeholder="apertura">
            		<input class="btn btn-outline-primary" type="number" id="resp_posi" name="resp_posi" placeholder="respuesta positiva">
            		<input class="btn btn-outline-primary" type="number" id="no_interest" name="no_interest" placeholder="no me interesa">
            		<input class="btn btn-outline-primary" type="number" id="vistos" name="vistos" placeholder="vistos">
            		<input class="btn btn-outline-primary" type="number" id="vistos_retom" name="vistos_retom" placeholder="vistos retomados">
        		</div>
        		<div class="sec">
        		    <h3>INBOUND</h3>
        			<input class="btn btn-outline-primary" type="number" id="apertura_inbound" name="apertura_inbound" placeholder="apertura">
            		<input class="btn btn-outline-primary" type="number" id="resp_recib" name="resp_recib" placeholder="respuesta positiva">
            		<input class="btn btn-outline-primary" type="number" id="convers_posi" name="convers_posi" placeholder="conversaciones positivas">
            		<input class="btn btn-outline-primary" type="number" id="vistos_inbound" name="vistos_inbound" placeholder="vistos">
            		<input class="btn btn-outline-primary" type="number" id="seguimiento" name="seguimiento" placeholder="seguimiento">
        		</div>
        		<div class="sec">
        			<h3>ANUNCIOS</h3>
            		<input class="btn btn-outline-primary" type="number" id="resp_recib_anuncio" name="resp_recib_anuncio" placeholder="respuesta positiva">
            		<input class="btn btn-outline-primary" type="number" id="convers_posi_anuncio" name="convers_posi_anuncio" placeholder="conversaciones positivas">
            		<input class="btn btn-outline-primary" type="number" id="vistos_inbound_anuncio" name="vistos_inbound_anuncio" placeholder="vistos">
            		<input class="btn btn-outline-primary" type="number" id="seguimiento_anuncio" name="seguimiento_anuncio" placeholder="seguimiento">
            		<input class="btn btn-outline-primary" type="number" id="agenda" name="agenda" placeholder="agenda">
        		</div>
        	</div>
			<br>
            <button type="submit" class="btn btn-success">enviar</button>
        </form>

    	</center>
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
    	
    	let formDiario = document.getElementById('formulario-diario');
    	formDiario.textContent = 'FORMULARIO DIARIO';
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
<?php
    }else{
        header('location: ./mal.php');
    }
?>