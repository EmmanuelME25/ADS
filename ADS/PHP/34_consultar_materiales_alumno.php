<?php
    include 'conexion.php';
    $Respuesta = array();
    $accion    = $_POST['accion'];
    $correo = "ayuda1@gmail.com";

    if ($accion == 'read'){
        case 'read':
            actionReadPHP($conexion);
            break;
        default:
            # code...
            break;
    }

    function actionReadPHP($conexion){
        $QueryRead       = "SELECT * FROM usuario WHERE correo='".$correo."';"
        $ResultadoRead   = mysqli_query($conexion,$QueryRead);
        $numeroRegistros = mysqli_num_rows($ResultadoRead);
        if($numeroRegistros>0){
            $Respuesta['estado']        = 1;
            $Respuesta['mensaje']       = "Los registro se listan correctamente";    
            $Respuesta['usuario']      = array();
            while ($RenglonEntrega = mysqli_fetch_assoc($ResultadoRead)) {
               $Alumno = array();
               $Alumno['nombre']        = $RenglonEntrega['nombre'];
               $Alumno['ap_paterno']    = $RenglonEntrega['ap_paterno'];
               $Alumno['ap_paterno']        = $RenglonEntrega['ap_paterno'];
               array_push($Respuesta['usuario'],$Alumno);
            }
        }else{
            $Respuesta['estado'] =0;
            $Respuesta['mensaje']="Los siento, pero no hay registros para mostrar";    
        }
        echo json_encode($Respuesta);
        mysqli_close($conexion); 
    }