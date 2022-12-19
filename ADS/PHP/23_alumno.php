<?php 

    include ('../Connect.php'); 
    echo "<option select> Seleccionar </option>";
    $grupo = $_POST['valu'];
    $consulta = "SELECT usuario_correo FROM alumno where grupo =".$grupo; //Consulta para alumnos select
    $resultado = mysqli_query($conex,$consulta);
    while($registro = mysqli_fetch_assoc($resultado)){
        $correoa = $registro['usuario_correo'];
        $consultanom = "SELECT * FROM usuario where correo =".'"'.$correoa.'"'.""; //Consulta para nombre
        $resultadonom = mysqli_query($conex,$consultanom);
        while($registronom = mysqli_fetch_assoc($resultadonom)){
            echo "<option value = ".$registronom['correo']." > ".$registronom['nombre']." ".$registronom['ap_paterno']." ".$registronom['ap_materno']."</option>";
        }
    }

    
    
?>