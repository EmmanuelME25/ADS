<?php 

    include ('../Connect.php'); 
    echo "<option select> Seleccionar </option>";
    $grado = $_POST['valu'];
    $consulta = "SELECT * FROM materia where grado =".$grado; //Consulta para alumnos select
    $resultado = mysqli_query($conex,$consulta);
    while($registro = mysqli_fetch_assoc($resultado)){
            echo "<option value = ".$registro['idmateria']." > ".$registro['nombre']."</option>";
    }

    
    
?>