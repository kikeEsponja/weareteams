<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./src/img/logo_azul_wat.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hint.css/2.7.0/hint.min.css">
	<link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/admin.css">
    <title>Administración</title>
</head>
<body>
    <div class="blue"></div>
    <center>
        <div class="cont-h1">
			<img src="./src/img/logo_blonco_wat.svg" class="logo">
            <!--<div class="logo">t</div>
            <h1>wa</h1>-->
        </div>
        <div class="cont-h2">
            <!--<h2 class="sombra">RANKING</h2>-->
            <h2 class="plano">RANKING</h2>
        </div>
        <h3>COMERCIALES WE ARE TEAM</h3>
        <br>
        <div id="mejores" class="mejores">
            <?php
                include "./src/js/config.php";
                $sql = "SELECT alumnos.nombre, alumnos.correo, alumnos.pais, alumnos.perfil, SUM(calificaciones_diarias.calificacion) AS puntaje FROM alumnos JOIN calificaciones_diarias ON alumnos.id = calificaciones_diarias.id_alumno GROUP BY alumnos.id ORDER BY puntaje DESC";

                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Nombre</th>";
                    echo "<th>Perfil</th>";
                    echo "<th>País</th>";
                    echo "<th>Puntaje</th>";
                    echo "</tr>";
                    while($alumno = mysqli_fetch_assoc($result)){
                        $pais = strtolower($alumno['pais']);
                        $perfil = strtolower($alumno['perfil']);
                        $promedio = number_format($alumno['puntaje'], 2);

                        echo "<tr class='fila-alumno' data-perfil='{$perfil}'>";
                        echo "<td>".$alumno['nombre']."</td>";
                        echo "<td>".$perfil."</td>";
                        echo "<td>" . "<img class='flag' src='./src/img/banderas/{$pais}.svg' alt='{$alumno['pais']}'>" . "</td>";
                        echo "<td>".$promedio."</td>";
                        echo "</tr>";
                        //echo "<img class='flag' src='./src/img/banderas/{$pais}.svg' alt='{$alumno['pais']}'> - ";
                        //echo "<strong>{$alumno['nombre']}</strong> - {$alumno['perfil']} - Promedio: {$promedio}";
                        //echo $alumno['calificacion'];
                        //echo "</td>";
                    }
                    echo "</th>";
                    echo "</th>";
                    echo "</table>";
                }else{
                    echo "<p>No se encontraron alumnos</p>";
                }
            ?>
        </div>
        <br>
        <div class="filtro">
            <button type="button" class="btn btn-dark" id="filtro-vendedores" name="filtro-vendedores">Mostrar vendedores digitales</button>
            <button type="button" class="btn btn-dark" id="filtro-setters" name="filtro-setters">Mostrar setters</button>
            <button type="button" class="btn btn-dark" id="filtro-closers" name="filtro-closers">Mostrar closers</button>
            <button type="button" class="btn btn-outline-success" id="mostrar-todo" name="mostrar-todo">Mostrar todos</button>
        </div>
        <br>
        <div class="cont-texto">
            <p class="texto">Ranking con puntaje de los perfiles comerciales que van teniendo mejores resultados y han demostrado compromiso con su aprendizaje y actividad.</p>
        </div>
    </center>
    <br>
    <br>
    <div class="logeo">
        <h4 style="text-decoration: underline;">Acceso para formadores y cursantes: </h4>
        <button class="btn btn-success" id="logeo">Click Aquí</button>
    </div>
    <div class="red"></div>

    <script src="./src/js/funciones.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>