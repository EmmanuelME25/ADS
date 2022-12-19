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
        $correo = $_POST['correop'];
        $alumno= $_POST['hij'];
        $QueryCreate = "UPDATE alumno SET padre_usuario_correo ='".$correo."' where usuario_correo ='".$alumno."'";
                if(mysqli_query($conex,$QueryCreate)){
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
        $correo = $_POST['correop'];
        $alumno= $_POST['hij'];
        
        $QueryDelete = "UPDATE alumno SET padre_usuario_correo = NULL where usuario_correo =".'"'.$alumno.'"'."";
                if(mysqli_query($conex,$QueryDelete)){
                    $Respuesta['estado']    =  1;
                    $Respuesta['mensaje']   =  "El registro se guardo correctamente";
                    $Respuesta['id']        =  mysqli_insert_id($conex);
                }else{
                    $Respuesta['estado']    =   0;
                    $Respuesta['mensaje']   =   "Ocurrio un error desconocido";
                    $Respuesta['id']        =   -1;
                } 
        
        echo json_encode($Respuesta);
        mysqli_close($conex);
    } 