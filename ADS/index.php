<title>Primer inicio de sesion</title>

<?php
include("VALIDARINGRESO.php");
?>

<script>
  function validateForm(){
    var x = document.forms["primerinicio"]["correo"].value;
    var x1 = document.forms["primerinicio"]["clave"].value;

      if(x==""|| x1==""){

        alert("Campos incompletos");
        return false;

      }
    }
  </script>

<link rel="stylesheet" href="nombre.css">

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Iniciar sesión </h2>


    

    <!-- Login Form -->
    <form method="post" name="primerinicio" action="VALIDARINGRESO.php" onsubmit="return validateForm()">
      <input type="text" id="login" class="fadeIn second" name="correo" placeholder="Correo">
      <input type="password" id="password" class="fadeIn third" name="clave" placeholder="Contraseña">
      <input type="submit" class="fadeIn fourth" value="Iniciar" >
    </form>


    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">¿Olvidó su contraseña?</a>
    </div>

  </div>
</div>