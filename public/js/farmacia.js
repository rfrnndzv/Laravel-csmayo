//Funciones para editar las recetas de FARMACIA
$(document).ready(function() {

    //Boton para guardar los datos de la RECETA
    $('#opt-imprimir').click(function(){

        var cifarm = $('#ciusuario').text();
        var nroreceta = $('#nroreceta').text();
        var tableMed = $('#TablaMedicamentos').DataTable()

        var ids         = tableMed.column(0).data().toArray()
        var cantidades  = tableMed.column(4).data().toArray()
        var valores     = tableMed.column(5).data().toArray()

        $.ajax({
            url: "/farmacia/actualizar",
            type: "GET",
            data: {
                cifarm,
                nroreceta,
                ids,
                cantidades,
                valores,
                _token:$('input[name="_token"]').val()
            },
            success: function(respuesta){
                console.log(respuesta);
                window.location.replace(respuesta);
            }
        })
    })
})
