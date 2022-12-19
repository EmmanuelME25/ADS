<?php
    include ('../Connect.php'); 
    $Respuesta = array();
    $accion    = $_POST['accion'];
    
    switch ($accion) {
        case 'create':
            actionCreatePHP($conex);
            break;
        case 'delete':
            actionDeletePHP($conex);
            break;
        default:
            # code...
            break;
    }
    
    function actionCreatePHP($conex){
        $grado= $_POST['grade'];
        $grupo = $_POST['group'];
        $alumno= $_POST['alumno'];
        $QueryCreate = "INSERT INTO alumno_grupo (alumno_usuario_correo, grupo_idgrupo) VALUES ('".$alumno."', '".$grupo."')";
                if(mysqli_query($conex,$QueryCreate) ){
                    $Respuesta['estado']    =  1;
                    $Respuesta['mensaje']   =  "El registro se guardo correctamente";
                    $Respuesta['id']        =  mysqli_insert_id($conex);
                }else{
                    $Respuesta['estado'] =  0;
                    $Respuesta['mensaje']=  "Ocurrio un error desconocido";
                    $Respuesta['id']     =  -1;
                } 
        
        echo json_encode($Respuesta);
        mysqli_close($conex);
    }

    function actionDeletePHP($conex){
        $grado= $_POST['grade'];
        $grupo = $_POST['group'];
        $alumno= $_POST['alumno'];
        $QueryDelete = "DELETE FROM alumno_grupo where alumno_usuario_correo ='".$alumno."' AND grupo_idgrupo = '".$grupo."'";
                if(mysqli_query($conex,$QueryDelete) ){
                    $Respuesta['estado']    =  1;
                    $Respuesta['mensaje']   =  "El registro se guardo correctamente";
                    $Respuesta['id']        =  mysqli_insert_id($conex);
                }else{
                    $Respuesta['estado'] =  0;
                    $Respuesta['mensaje']=  "Ocurrio un error desconocido";
                    $Respuesta['id']     =  -1;
                } 
        
        echo json_encode($Respuesta);
        mysqli_close($conex);
    }