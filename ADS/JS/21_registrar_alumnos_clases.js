
function ActionAdd() {
    let grado = document.getElementById("grado").value;
    let grupo = document.getElementById("grupo").value;
    let alumno = document.getElementById("alumno").value;   
    var formData = new FormData();
    formData.append('grade',grado);
    formData.append('group',grupo);
    formData.append('alumno',alumno);
    formData.append('accion',"create");

    $.ajax({ 
        method:"POST",
        url: "../PHP/21_registrar_alumnos_clases.php",
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


function ActionDelete() {
    let grado = document.getElementById("grado").value;
    let grupo = document.getElementById("grupo").value;
    let alumno = document.getElementById("alumno").value;   
    var formData = new FormData();
    formData.append('grade',grado);
    formData.append('group',grupo);
    formData.append('alumno',alumno);
    formData.append('accion',"delete");

    $.ajax({ 
        method:"POST",
        url: "../PHP/21_registrar_alumnos_clases.php",
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