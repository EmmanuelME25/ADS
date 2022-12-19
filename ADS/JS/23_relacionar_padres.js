
function ActionAdd() {
    let padre = document.getElementById("correo").value;
    let hijo = document.getElementById("alumno").value;   
    var formData = new FormData();
    formData.append('correop',padre);
    formData.append('hij',hijo);
    formData.append('accion',"create");

    $.ajax({ 
        method:"POST",
        url: "../PHP/23_relacionar_padres.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function( respuesta ) {
            console.log(respuesta);
            JSONRespuesta = JSON.parse(respuesta); 
            if(JSONRespuesta.estado==1){
                alert("Exito", "Datos guardados con exito", "success");
                window.location.reload(true);
            }else{
                console.log(respuesta);
                alert("Error", "Datos no guardados con exito", "error");
                window.location.reload(true);
          }
        }
    });
}

function actionReadPHP($conexion){
    $QueryRead       = "SELECT * FROM entregas";
    $ResultadoRead   = mysqli_query($conexion,$QueryRead);
    $numeroRegistros = mysqli_num_rows($ResultadoRead);
    if($numeroRegistros>0){
        $Respuesta['estado']        = 1;
        $Respuesta['mensaje']       = "Los registro se listan correctamente";    
        $Respuesta['entregas']      = array();
        while ($RenglonEntrega = mysqli_fetch_assoc($ResultadoRead)) {
           $Entrega                   = array();
           $Entrega['id']     = $RenglonEntrega['id'];
           $Entrega['entrega']      = $RenglonEntrega['entrega'];
           $Entrega['fecha']          = $RenglonEntrega['fecha'];
           $Entrega['titulo'] = $RenglonEntrega['titulo'];
           array_push($Respuesta['entregas'],$Entrega);
        }
    }else{
        $Respuesta['estado'] =0;
        $Respuesta['mensaje']="Los siento, pero no hay registros para mostrar";    
    }
    echo json_encode($Respuesta);
    mysqli_close($conexion); 
}


function ActionDelete() {
    let padre = document.getElementById("correo").value;
    let hijo = document.getElementById("alumno").value;   
    var formData = new FormData();
    formData.append('correop',padre);
    formData.append('hij',hijo);
    formData.append('accion',"delete");

    $.ajax({ 
        method:"POST",
        url: "../PHP/23_relacionar_padres.php",
        data: formData,
        contentType: false,
        processData: false,
        success: function( respuesta ) {
            console.log(respuesta);
            JSONRespuesta = JSON.parse(respuesta); 
            if(JSONRespuesta.estado==1){
                alert("Exito", "Datos guardados con exito", "success");
                window.location.reload(true);
            }else{
                console.log(respuesta);
                alert("Error", "Datos no guardados con exito", "error");
                window.location.reload(true);
                
          }
        }
    });
}