<?PHP

$usuario=$_POST['correo'];
$contrasena=$_POST['clave'];

session_start();
$_SESSION['correo']=$usuario;

include('Connect.php');

$consulta="SELECT * FROM usuario WHERE correo= '$usuario' and clave ='$contrasena'";

$resultado=mysqli_query($conex,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas)
{

header("location:inicio.html");

}else{
    header("location:index.php");
}
mysqli_free_result($resultado);
mysqli_close($conex);
?>