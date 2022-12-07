<?php

include('db.php');

$USUARIO = $_POST['Correo'];
$CLAVE = $_POST['Clave'];

$consulta = "SELECT * FROM usuarios where Correo = '$USUARIO' and Clave ='$CLAVE'";

$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($resultado);

if($filas){
    session_start();
    $_SESSION['usuario'] = $USUARIO;
    header("location:Cuenta_html.php");
}else{
    include('login.html');
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>