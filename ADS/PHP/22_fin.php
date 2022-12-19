<?php 
    include ('../Connect.php'); 
    
    $consulta = "SELECT grupo_idgrupo FROM profesor_grupo where profesor_usuario_correo=".'"'.$_POST['correopad'].'"'.""; //Consulta para alumnos lista
    $resultado = mysqli_query($conex,$consulta);
    
    while($registro = mysqli_fetch_assoc($resultado)){
        $gid = $registro['grupo_idgrupo'];
        $consultanom = "SELECT * FROM grupo where idgrupo =".'"'.$gid.'"'.""; //Consulta 
        $resultadonom = mysqli_query($conex,$consultanom);
        $consultanom1 = "SELECT materia_idmateria FROM profesor_materia where profesor_usuario_correo=".'"'.$_POST['correopad'].'"'.""; //Consulta 
        $resultadonom1 = mysqli_query($conex,$consultanom1);
        while($registronom = mysqli_fetch_assoc($resultadonom)){
            while($registronom1 = mysqli_fetch_assoc($resultadonom1)){
                $consultama = "SELECT * FROM materia where idmateria=".'"'.$registronom1['materia_idmateria'].'"'.""; //Consulta 
                $resultadoma = mysqli_query($conex,$consultama);
                while($registroma = mysqli_fetch_assoc($resultadoma)){
                    echo "<tr>";
                    echo "<td>".$registroma['nombre']."</td>";
                    echo "<td>".$registronom['nombre']."</td>"; //para el nombre
                    echo "</tr>";
                }
            }
            
        }
    }

    
    
?>