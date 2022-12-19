<?PHP

$usuario=$_POST['correo'];
$contrasena=$_POST['clave'];


session_start();
$_SESSION['correo']=$usuario;

include('Connect.php');



$consulta="SELECT * FROM usuario WHERE correo= '$usuario' and clave ='$contrasena'";
$resultado=mysqli_query($conex,$consulta);
$datos=mysqli_fetch_array($resultado);
$filas=mysqli_num_rows($resultado);


if($filas)
{
    
if($datos['correoAux']==NULL)
{
    header("location:02_inicio_primera_vez.html");
}
else 
{

$cp="SELECT * FROM padre WHERE usuario_correo= '$usuario'";
$rcp=mysqli_query($conex,$cp);
$fcp=mysqli_num_rows($rcp);
if($fcp)
{
    header("location:padre/24_pagina_principal_general.php");
}
$ca="SELECT * FROM alumno WHERE usuario_correo= '$usuario'";
$rca=mysqli_query($conex,$ca);
$fca=mysqli_num_rows($rca);
if($fca)
{
    header("location:alumno/24_pagina_principal_general.php");
}
$cad="SELECT * FROM administrador WHERE usuario_correo= '$usuario'";
$rcad=mysqli_query($conex,$cad);
$fcad=mysqli_num_rows($rcad);
if($fcad)
{
    header("location:admin/15_pagina_principal_admin.php");
}
$cpr="SELECT * FROM profesor WHERE usuario_correo= '$usuario'";
$rcpr=mysqli_query($conex,$cpr);
$fcpr=mysqli_num_rows($rcpr);
if($fcpr)
{
    header("location:docente/03_pagina_principal_docente.php");
}

}


}
else{

    header("location:index.html");

}


mysqli_free_result($resultado);
mysqli_close($conex);
?>
