<?php

session_start();
if(!isset($_SESSION['usuario'])){
    header("location:login.html");
    exit();
}

require('db.php');

//Nombre del Usuario
$usuario = $_SESSION['usuario'];
$R1 = "SELECT * from usuarios where Correo = '$usuario'";
$NOMBRE = mysqli_query($conexion,$R1);
$fila1 = mysqli_fetch_row($NOMBRE);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/Cuenta.css">
    <link rel="shortcut icon" href="Imagenes/logocolor.png" type="image/x-icon">
    <title>MiPerfil</title>
</head>
<body>
    <header id="cabezera">
        <img src="Imagenes/Menu.png" alt="" id="menu">
        <img src="Imagenes/Mibaño.png" alt="" id="logo1">
        <img src="Imagenes/avatar_default.png" alt="" id="avatar">
    </header>
    <div id="cuerpo">
        <h1>PERFIL</h2>
         <div id="perfil">
            <img src="Imagenes/Avatar2.jpg" alt="" id="foto">
            <h2 id="nombre-usuario">
                <?php
                echo ($fila1[3]);
                ?>
            </h2>
            <h2 id="categoria-usuario">
                <?php
                if ($fila1[5] == 0)
                    echo "Alumno";
                else
                    echo "Funcionario";
                ?>
            </h2>
         </div>   
         <div class="informacion">
            <div class="informacion">
                <h2 class="contenido">Cantidad de sanciones</h2>
                <h3 class="datos" >
                    <?php
                    echo ($fila1[5]);
                    ?>
                </h3>
            </div>
            <div class="informacion">
                <h2 class="contenido">Celular</h2>
                <h3 class="datos" id="celular-usuario">56998257745</h3>
            </div>
            <div class="informacion">
                <h2 class="contenido" >Correo</h2>
                <h3 class="datos" id="correo-usuario">
                    <?php
                    echo ($fila1[1]);
                    ?>
                </h3>
            </div>
         </div>

    </div>
</body>
</html>