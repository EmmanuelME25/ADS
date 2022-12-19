<?php 
    include ('../Connect.php'); 
    
    $consulta = "SELECT usuario_correo FROM alumno where padre_usuario_correo=".'"'.$_POST['correopad'].'"'.""; //Consulta para alumnos lista
    $resultado = mysqli_query($conex,$consulta);
    while($registro = mysqli_fetch_assoc($resultado)){
        $correoa = $registro['usuario_correo'];
        $consultanom = "SELECT * FROM usuario where correo =".'"'.$correoa.'"'.""; //Consulta para nombre
        $resultadonom = mysqli_query($conex,$consultanom);
        while($registronom = mysqli_fetch_assoc($resultadonom)){
            echo "<tr>";
            echo "<td>".$registronom['nombre']." ".$registronom['ap_paterno']." ".$registronom['ap_materno']."</td>"; //para el nombre
            echo "</tr>";
        }
    }

    
    
?>