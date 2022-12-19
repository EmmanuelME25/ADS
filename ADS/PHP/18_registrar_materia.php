<?php

        $conex=mysqli_connect("localhost","root","","ADSbd");
        if(!$conex){
                die("Error al conectarse a la base de datos: ".mysqli_connect_error());
        }

       
        insertar($conex);
        
        function insertar($conex){
                $materia = $_POST['materia'];
                $codigo  = $_POST['codigo'];
                $plan = $_POST['plan'];
                $grado = $_POST['grado'];
        
        $consulta="INSERT INTO materia(idmateria, nombre, codigo,plan_estudio, grado) VALUES (NULL,'".$materia."','".$codigo."','".$plan."','".$grado."')";
        mysqli_query($conex,$consulta);
        echo json_encode('true');
        }       
        //$consulta=INSERT INTO 'materia'(idmateria, nombre, plan_estudio, grado) VALUES ('6','$materia','$plan','$grado');
        

        //echo $materia, $codigo, $plan, $grado;

?>