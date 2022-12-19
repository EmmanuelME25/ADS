<?php 

    include ('../Connect.php'); 
    echo "<option select> Seleccionar </option>";
    $consulta = "SELECT grupo_idgrupo FROM profesor_grupo where profesor_usuario_correo =".'"'.$_POST['cpaaa'].'"'.""; //Consulta para alumnos select
    $resultado = mysqli_query($conex,$consulta);
    while($registro = mysqli_fetch_assoc($resultado)){
        $consulta1 = "SELECT * FROM grupo where idgrupo =".$registro['grupo_idgrupo']; //Consulta para alumnos select
        $resultado1 = mysqli_query($conex,$consulta1);
            while($registro1 = mysqli_fetch_assoc($resultado1)){ 
                echo "<option value = ".$registro1['idgrupo']." > ".$registro1['nombre']."</option>";
            }
    }

    
    
?>