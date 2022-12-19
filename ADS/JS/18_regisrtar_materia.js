document.getElementById('formulario').addEventListener('submit', function(e){
    e.preventDefault();

    let formulario = new FormData(document.getElementById('formulario'));

    fetch('../PHP/18_registrar_materia.php', {
        method: 'POST',
        body: formulario
    })
    .then(res=>res.json())
    .then(data =>{
        if(data == 'true')
        {
            MostrarMensaje("Exito", "Datos guardados con exito", "success");
        }
        else
        {
            MostrarMensaje("Error", "Datos no guardados con exito", "error");
            console.log(data);
        }
        document.getElementById('materia').value = '';
        document.getElementById('codigo').value = '';
        document.getElementById('plan').value = '';
        document.getElementById('grado').value = ''; 
    })
});

function MostrarMensaje(titulo, texto, tipoAlerta)
{
    Swal.fire(
        titulo,
        texto,
        tipoAlerta
      )
}