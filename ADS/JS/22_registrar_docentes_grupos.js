
function ActionAdd() {
    let profesor = document.getElementById("docentes").value;
    let grado = document.getElementById("grado").value;
    let grupo = document.getElementById("grupo").value;
    let materia = document.getElementById("materia").value;   
    var formData = new FormData();
    formData.append('correop',profesor);
    formData.append('grade',grado);
    formData.append('group',grupo);
    formData.append('materias',materia);
    formData.append('accion',"create");

    $.ajax({ 
        method:"POST",
        url: "../PHP/22_registrar_docentes_grupos.php",
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
    let profesor = document.getElementById("docentes").value; 
    let grado = document.getElementById("grado").value;
    let grupo = document.getElementById("grupo").value;
    let materia = document.getElementById("materia").value;   
    var formData = new FormData();
    formData.append('correop',profesor);
    formData.append('grade',grado);
    formData.append('group',grupo);
    formData.append('materias',materia);
    formData.append('accion',"delete");

    $.ajax({ 
        method:"POST",
        url: "../PHP/22_registrar_docentes_grupos.php",
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