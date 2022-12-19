$.ajax({
    method: "POST",
    url: "../PHP/27_consultar_calificaciones_actividad.php",
    data: {
    },

    success: function(respuesta) {
        let op = document.getElementById("materiase");
        let op2 = op.options[op.selectedIndex].text
    }
});

;
