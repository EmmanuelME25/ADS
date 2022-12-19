<?php
session_start();
$usr=$_POST['corraux'];
include('Connect.php');

$cosn="SELECT * FROM usuario WHERE correoAux= '$usr'";
$resultado=mysqli_query($conex,$cosn);
$datos=mysqli_fetch_array($resultado);
$filas=mysqli_num_rows($resultado);


if($cosn==NULL)
{
    $insertar = "INSERT INTO usuario(correoAux) VALUES ('$usr'))";
    if($conex->mysqli_query($insertar))
    {
    $email=$usr;
    $asunto="Credenciales de recuperación";
    $msg=$datos['correo'];
    $mail=@mail($email,$asunto,$msg);
    if($mail)
    {
        echo"Mensaje exitoso";
        header("location:index.html");
    }
    }
   
    

}
else
{

    $email=$usr;
    $asunto="Credenciales de recuperación";
    $msg=$datos['correo'];
    $mail=@mail($email,$asunto,$msg);
    if($mail)
    {
        echo"Mensaje exitoso";
    }
    header("location:index.html");

}

mysqli_free_result($resultado);
mysqli_close($conex);


?>