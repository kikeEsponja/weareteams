const validarContrasAl = () => {
    let pass = document.getElementById('contras');
    let passRep = document.getElementById('contras_rep');

    if(pass.value !== passRep.value){
        let formReg = document.getElementById('form_reg');
        event.preventDefault();
        alert('las contrase«Ðas no coinciden');
    }
}

const enlace = document.getElementById('logeo');
enlace.addEventListener('click', ()=>{
    window.location.href = './admin/logeo.php';
});

document.getElementById('filtro-vendedores').addEventListener('click', function(){
	filtrarPerfil('vendedor digital');
});
document.getElementById('filtro-setters').addEventListener('click', function(){
	filtrarPerfil('setter');
});
document.getElementById('filtro-closers').addEventListener('click', function(){
	filtrarPerfil('closer');
});
document.getElementById('mostrar-todo').addEventListener('click', function(){
	mostrarTodo();
});

function filtrarPerfil(perfil){
	const filas = document.querySelectorAll('.fila-alumno');
	filas.forEach(fila => {
    	if(fila.getAttribute('data-perfil') === perfil){
        	fila.style.display = '';
        }else{
        	fila.style.display = 'none';
        }
    });
}

function mostrarTodo(){
	const filas = document.querySelectorAll('.fila-alumno');
	filas.forEach(fila => {
    	fila.style.display = '';
    });
}
/*const registroProf = document.getElementById('ir_a_registro_profesores');
enlace.addEventListener('click', ()=>{
    window.location.href = './admin/registro_prof.php';
});

const ingresoProf = document.getElementById('ir_a_login_profesores');
enlace.addEventListener('click', ()=>{
    window.location.href = './admin/login_prof.php';
});

const registroAlum = document.getElementById('ir_a_registro_alumnos');
enlace.addEventListener('click', ()=>{
    window.location.href = './admin/registro_alum.php';
});

const ingresoAlum = document.getElementById('ir_a_login_alumnos');
enlace.addEventListener('click', ()=>{
    window.location.href = './admin/login_alum.php';
});*/