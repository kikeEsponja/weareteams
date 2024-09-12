<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
	<link rel="shortcut icon" href="../src/img/logo_azul_wat.svg">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hint.css/2.7.0/hint.min.css">
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
		.brillar{
        	text-shadow:
	        	0 0 5px #fff,
    	        0 0 10px #ff00ff,
        	    0 0 20px #ff00ff,
            	0 0 30px #ff00ff,
            	0 0 40px #ff00ff,
            	0 0 50px #ff00ff,
            	0 0 60px #ff00ff;
            animation: brillo 1s infinite alternate;
        }
		@keyframes brillo{
        	from{
            	opacity: 1;
            	text-shadow:
		        	0 0 5px #fff,
    		        0 0 10px #ff00ff,
        		    0 0 20px #ff00ff,
            		0 0 30px #ff00ff,
            		0 0 40px #ff00ff,
            		0 0 50px #ff00ff,
            		0 0 60px #ff00ff;
            }
        	to{
            	opacity: 0.7;
            	text-shadow:
	        		0 0 2px #fff,
    	        	0 0 5px #ff00ff,
        	    	0 0 10px #ff00ff,
            		0 0 15px #ff00ff,
            		0 0 20px #ff00ff,
            		0 0 25px #ff00ff,
            		0 0 30px #ff00ff;
            }
        }
	</style>
</head>
<body>
    <center>
        <h1 class="h1">Registro Profesores</h1>
        <form action="../src/js/log_registro_prof.php" method="POST" id="form_reg" onsubmit="validarContras(event)">
			<div>
				<input class="btn btn-dark" type="text" id="nombre" name="nombre" placeholder="Ingrese nombre">
            	<input class="btn btn-dark" type="email" id="correo" name="correo" placeholder="Ingrese correo" required>
			</div>
			<div>
				<input class="btn btn-dark" type="password" id="contras" name="contras" placeholder="Ingrese contraseña">
            	<input class="btn btn-dark" type="password" id="contras_rep" name="contras_rep" placeholder="Repita contraseña">
			</div>
			<div>
				<h2 class="hint--top hint--warning text-warning brillar" data-hint="Si realmente eres profesor, deberías tener la clave secreta">?</h2>
            	<input class="btn btn-dark" type="password" id="clave_prof" name="clave_prof" placeholder="Clave de profesor">
            	<button class="btn btn-success" type="submit" id="boton_registro">Registrarse</button>
			</div>
        </form>
        <br>
        <div>
            <label for="ir_a_login_profesores">Ya tiene cuenta? Ingrese -></label>
            <button class="btn btn-warning" id="ir_a_login_profesores">Login</button>
        </div>
        <br>
        <button type="button" class="btn btn-warning" onclick="goBack()">Volver</button>
        <button type="button" class="btn btn-warning" id="inicio">Ir al inicio</button>
    </center>
    <div class="red" style="top: 50%; height:300px;"></div>

    <script>
        const loginProf = document.getElementById('ir_a_login_profesores');
        loginProf.addEventListener('click', ()=>{
            window.location.href = './login_prof.php';
        });

        const goBack = () =>{
            window.history.back();
        };

        const inicio =document.getElementById('inicio');
        inicio.addEventListener('click', ()=>{
            window.location.href = '../index.php';
        });

		const validarContras = (event) => {
        	event.preventDefault();
        
    		let pass = document.getElementById('contras');
    		let passRep = document.getElementById('contras_rep');
    		let claveIntruso = document.getElementById('clave_prof');

	    	fetch('./obtenerclave.php')
    	    	.then(response => {
            		if(!response.ok){
                    	throw new Error('Error al obtener clave');
                    }
                	return response.json();
                })
            	.then(data => {
                	if(data.error){
                    	alert('Error: ' + data.error);
                    }else if(data.clave){
                		if(pass.value !== passRep.value || claveIntruso.value !== data.clave) {
                    		alert('Las contraseñas no coinciden o la clave de profesor es incorrecta');                    
                    	}else{
                    		document.getElementById('form_reg').submit();                        	
                        }
                	}
            	})
        		.catch(error => console.error('Error:', error));
		};

		/*const validarContras = () => {
    		let pass = document.getElementById('contras');
    		let passRep = document.getElementById('contras_rep');
    		let claveIntruso = document.getElementById('clave_prof');
        	console.log('vamos por acá');

	    	fetch('./obtenerclave.php')
    	    	.then(response => {
                	if(!response.ok){
                    	throw new Error('Error al obtener clave');
                    }
                	return response.text();
                })
        		.then(data => {
                	console.log(data)
                    let jsonData = JSON.parse(data);
            		if(jsonData.error) {
                    	alert('Error: ' + jsonData.error);
                    }else if(jsonData.clave){
                		if(pass.value !== passRep.value || claveIntruso.value !== jsonData.clave) {
                        	console.log('y por acá también');
                    		let formReg = document.getElementById('form_reg');
                    		event.preventDefault();
                    		alert('Las contraseñas no coinciden o la clave de profesor es incorrecta');
                		}
                    }
                })
        		.catch(error => console.error('Error:', error));
		};*/
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>