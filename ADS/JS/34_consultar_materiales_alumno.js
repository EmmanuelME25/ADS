function actionRead() {
    $.ajax({
        method:"POST",
        url: "../php/34_consultar_materiales_alumno.php",
        data: {
            accion: "read"
        },
      success: function( respuesta ) {
        console.log(respuesta);
        JSONRespuesta = JSON.parse(respuesta);
        
        if(JSONRespuesta.estado==1){
            MateIni = $("#nombre");
            JSONRespuesta.alumno(usuario => {
                usuario.nombre, usuario.ap_paterno, usuario.ap_materno;
            });  
        } 
        console.log(respuesta);
        //Mostrar todos los registros en la tabla
      }
    });
  }
//   function actionRead2(){
//     $.ajax({
//         method:"POST",
//         url: "../phppropios/34_consultar_materiales_alumno.php",
//         data: {
//         accion: "read2"
//       },
//       success: function( respuesta ) {
//         //console.log(respuesta);
//         JSONRespuesta = JSON.parse(respuesta);
        
//         if(JSONRespuesta.estado==1){
//             MateIni = $("#mi")
  
//         } 
//       }
//     });
//   }