<?php

session_start();
if(!isset($_SESSION['usuario'])){
    header("location:login.html");
    exit();
}


include("db.php");
$solicitudes = "SELECT * from solicitudes ORDER BY Tiempo ASC";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Imagenes/logocolor.png" type="image/x-icon">   
    <link rel="stylesheet" href="Styles/style.css">
    <title>MiBaño</title>
</head>
<body>
    <div class="header">
        <img class="menu" src="./Imagenes/Menu.png">
        <img class="logo" src="./Imagenes/logo_black_utem.png">
        <img class="profile" src="./Imagenes/avatar_default.png">
    </div>
    <div class="funcionario" content="width=device-width, initial-scale=1.0">
        <h1>Hola  </h1>
        <h1 name="usuario"></h1>
    </div>
    <div class="listado-baños" content="width=device-width, initial-scale=1.0">
        <h1>Listado de baños</h1>
    </div>
    <table class="listado">
        <tbody>
            <tr>
                <td>
                    <b class="ubicacion">Ubicación</b>
                </td>
                <td>
                    <b class="problemas">Problemas</b>
                </td>
                <td>
                    <b class="detalles">Detalles</b>
                </td>
            </tr>
            <tr>
                <?php
                $lista = mysqli_query($conexion, $solicitudes);
                while ($row = mysqli_fetch_assoc($lista)) { ?>
                <td>
                    <b class="direcciones-baño" content="width=device-width, initial-scale=1.0" >
                        <p name="Edificio"><?php echo $row["edificio"]; ?> </p> <p>-</p> <p name="Piso"><?php echo $row["Piso"]; ?></p>
                    </b>
                </td>

                <td>
                    <b class="problemas-baños" content="width=device-width, initial-scale=1.0">
                        <?php
                    if ($row["Tipo_Solicitud"] == 0)
                        echo ("No hay confort");
                    if ($row["Tipo_Solicitud"] == 1)
                        print("No hay jabon");
                    if ($row["Tipo_Solicitud"] == 2)
                        print("No hay Nova para manos");
                    if ($row["Tipo_Solicitud"] == 4)
                        echo ($row["Tipo_Solicitud"]);
                } mysqli_free_result($lista); ?>
                    </b>
                </td>
                <td>
                    <b class="estado-baño" content="width=device-width, initial-scale=1.0">
                        <img class="estados-baños" src="./Imagenes/Mas.png">
                    </b>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
