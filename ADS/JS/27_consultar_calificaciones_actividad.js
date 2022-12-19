$.ajax({
    method: "POST",
    url: "../PHP/27_consultar_calificaciones_actividad.php",
    data: {
    },

    success: function(respuesta) {
        var op = document.getElementById("materiase");
        var op2 = op.options[op.selectedIndex].text
        document.cookie = "x = " + op2;
    }
});

;
