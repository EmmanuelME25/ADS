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
        $grado= $_POST['grade'];
        $grupo = $_POST['group'];
        $materia= $_POST['materias'];
        $QueryCreate = "INSERT INTO profesor_grupo (profesor_usuario_correo, grupo_idgrupo) VALUES ('".$correo."', '".$grupo."')";
        $QueryCreate1 = "INSERT INTO profesor_materia (profesor_usuario_correo, materia_idmateria) VALUES ('".$correo."', '".$materia."')";
                if(mysqli_query($conex,$QueryCreate) ){
                    if(mysqli_query($conex,$QueryCreate1) ){
                        $Respuesta['estado']    =  1;
                        $Respuesta['mensaje']   =  "El registro se guardo correctamente";
                        $Respuesta['id']        =  mysqli_insert_id($conex);
                    }
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
        $grado= $_POST['grade'];
        $grupo = $_POST['group'];
        $materia= $_POST['materias'];
        $QueryDelete = "DELETE FROM profesor_grupo where profesor_usuario_correo ='".$correo."' AND grupo_idgrupo = '".$grupo."'";
        $QueryDelete1 = "DELETE FROM profesor_materia where profesor_usuario_correo ='".$correo."' AND materia_idmateria ='".$materia."'";
                if(mysqli_query($conex,$QueryDelete) ){
                    if(mysqli_query($conex,$QueryDelete1) ){
                        $Respuesta['estado']    =  1;
                        $Respuesta['mensaje']   =  "El registro se guardo correctamente";
                        $Respuesta['id']        =  mysqli_insert_id($conex);
                    }
                }else{
                    $Respuesta['estado'] =  0;
                    $Respuesta['mensaje']=  "Ocurrio un error desconocido";
                    $Respuesta['id']     =  -1;
                } 
        
        echo json_encode($Respuesta);
        mysqli_close($conex);
    }