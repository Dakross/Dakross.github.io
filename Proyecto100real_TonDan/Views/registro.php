<?php
ini_set('displa_errors', 1);
error_reporting(E_ALL);

include('db.php');
$NOMBRE = $_POST['Nombre'];
$CORREO = $_POST['Correo'];
$CLAVE = $_POST['Clave'];
$CLAVE2 = $_POST['password2'];

if($CLAVE == $CLAVE2 && $NOMBRE!=null && $CORREO!=null && $CLAVE !=null){
    $consulta = "INSERT INTO `usuarios` (`Correo`, `Clave`, `Nombre`, `Cantidad_de_sanciones`, `Categoria`) 
    VALUES ('$CORREO', '$CLAVE', '$NOMBRE', '0', '');";

    $RESULTADO = mysqli_query($conexion, $consulta) or die("Error de registro");

    echo "Registro existoso";
}

else{
    include('Registro.html');
}

mysqli_close($conexion);


?>