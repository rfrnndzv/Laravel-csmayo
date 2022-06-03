$(document).ready(function() {

    $('#TablaDiagnosticos').DataTable()
    $('#TablaMedicamentos').DataTable()
    
    //Funciones para el apartado de DIAGNOSTICOS
    //Quitar
    var tdq = $('#TablaDiagnosticos').DataTable();
 
    $('#TablaDiagnosticos tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            tdq.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#btn-quitar1').click( function () {
        tdq.row('.selected').remove().draw( false );
    } );

    //Añadir
    var tda = $('#TablaDiagnosticos').DataTable();
 
    $('#btn-aniadir1').on( 'click', function () {
        tda.row.add( [
            $('#val_codigo').val(),
            $('#val_nr').val()
        ] ).draw( false );

        $('#val_codigo').val(" ")
        $('#val_nr').val(" ")
 
    } );

    //Funciones para el apartado de MEDICAMENTOS
    //Quitar
    var tmq = $('#TablaMedicamentos').DataTable();
 
    $('#TablaMedicamentos tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            tmq.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#btn-quitar2').click( function () {
        tmq.row('.selected').remove().draw( false );
    } );

    //Añadir
    var tma = $('#TablaMedicamentos').DataTable();
 
    $('#btn-aniadir2').on( 'click', function () {
        tma.row.add( [
            $('#val_medicamento').val(),
            $('#val_indicaciones').val(),
            $('#val_cantidad').val()
        ] ).draw( false );

        $('#val_medicamento').val(" ")
        $('#val_indicaciones').val(" ")
        $('#val_cantidad').val(" ")
 
    } );

    //Boton para guardar los datos de la RECETA
    $('#btn-recetar').click(function(){

        var tableDiag = $('#TablaDiagnosticos').DataTable()

        var codigos = tableDiag.column(0).data().toArray()
        var nrs     = tableDiag.column(1).data().toArray()

        var tableMed = $('#TablaMedicamentos').DataTable()

        var nombres         = tableMed.column(0).data().toArray()
        var indicaciones    = tableMed.column(1).data().toArray()
        var cantidades      = tableMed.column(2).data().toArray()

        var recetar = [
            $('#val_nrohc').text(),
            $('#val_atencion').val()
        ]

        if (nombres.length == 0) {
            alert('No se ha recetado medicamentos')
            return false
        }
        $.ajax({
            url: "/cmedica/receta",
            type: "GET",
            data: {
                codigos,
                nrs,
                nombres,
                indicaciones,
                cantidades,
                recetar
            },
            success: function(respuesta){
                alert(respuesta)
            }
        })
    })
});