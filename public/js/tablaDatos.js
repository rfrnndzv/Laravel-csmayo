//Funciones para el apartado de DIAGNOSTICOS

//Quitar
$(document).ready(function() {
    var table = $('#TablaDiagnosticos').DataTable();
 
    $('#TablaDiagnosticos tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#btn-quitar1').click( function () {
        table.row('.selected').remove().draw( false );
    } );
} );

//Añadir
$(document).ready(function() {
    var t = $('#TablaDiagnosticos').DataTable();
 
    $('#btn-aniadir1').on( 'click', function () {
        t.row.add( [
            $('#val_codigo').val(),
            $('#val_diagnostico').val(),
            $('#val_nr').val()
        ] ).draw( false );

        $('#val_codigo').val(" ")
        $('#val_diagnostico').val(" ")
        $('#val_nr').val(" ")
 
    } );
} );

//Funciones para el apartado de MEDICAMENTOS
$(document).ready(function() {
    var table = $('#TablaMedicamentos').DataTable();
 
    $('#TablaMedicamentos tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#btn-quitar2').click( function () {
        table.row('.selected').remove().draw( false );
    } );
} );

$(document).ready(function() {
    var t = $('#TablaMedicamentos').DataTable();
 
    $('#btn-aniadir2').on( 'click', function () {
        t.row.add( [
            $('#val_medicamento').val(),
            $('#val_indicaciones').val(),
            $('#val_cantidad').val()
        ] ).draw( false );

        $('#val_medicamento').val(" ")
        $('#val_indicaciones').val(" ")
        $('#val_cantidad').val(" ")
 
    } );
 
} );

//Boton para guardar los datos de la RECETA
$(document).ready(function() {
    $('#btn-recetar').click(function(){

        var tableDiag = $('#TablaDiagnosticos').DataTable()

        var codigos         = tableDiag.column(0).data().toArray()
        var diagnosticos    = tableDiag.column(1).data().toArray()
        var nrs             = tableDiag.column(2).data().toArray()

        var tableMed = $('#TablaMedicamentos').DataTable()

        var nombres         = tableMed.column(0).data().toArray()
        var indicaciones    = tableMed.column(1).data().toArray()
        var cantidades     = tableMed.column(2).data().toArray()

        var recetar = [
            $('#val_nrohc').text(),
            $('#val_atencion').val()
        ]

        $.ajax({
            url: "/cmedica/receta",
            type: "GET",
            data: {
                codigos,
                diagnosticos,
                nrs,
                nombres,
                indicaciones,
                cantidades,
                recetar,
                _token:$('input[name="_token"]').val()
            },
            success: function(respuesta){
                alert(respuesta)
            }
        })

        return false;
    })
})

$(document).ready(function() {
    $('#val_codigo').change(function () {
        
        switch ($('#val_codigo').val()) {
            case "A03": $('#val_diagnostico').val('Disentería'); break;
            case "A09": $('#val_diagnostico').val('Diarrea y Diarrea Persistente'); break;
            case "A59": $('#val_diagnostico').val('Tricomoniasis'); break;
            case "B359": $('#val_diagnostico').val('Nicosis Cutanea'); break;
            case "B37": $('#val_diagnostico').val('Candidiasis Vaginal'); break;
            case "B370": $('#val_diagnostico').val('Monoliasis Oral'); break;
            case "B86": $('#val_diagnostico').val('Sarcoptosis'); break;
            case "D50": $('#val_diagnostico').val('Anemias por Deficiencia de Hierro'); break;
            case "E440": $('#val_diagnostico').val('Desnutrición Aguda Moderada'); break;
            case "E45": $('#val_diagnostico').val('Desnutrición Crónica en Menores de 2 años'); break;
            case "H10": $('#val_diagnostico').val('Conjuntivitis Vacteriana'); break;
            case "H660": $('#val_diagnostico').val('Infección Aguda del Oído'); break;
            case "H661": $('#val_diagnostico').val('Infección Crónica del Oído'); break;
            case "J00": $('#val_diagnostico').val('Resfrío Común'); break;
            case "J030": $('#val_diagnostico').val('Faringoamigdalitis'); break;
            case "J15": $('#val_diagnostico').val('Neumonia no Grave'); break;
            case "K590": $('#val_diagnostico').val('Estreñimiento'); break;
            case "L22": $('#val_diagnostico').val('Dermatitis del Pañal'); break;
            case "L50": $('#val_diagnostico').val('Urticaria'); break;
            case "M545": $('#val_diagnostico').val('Lumbalgia'); break;
            case "N30": $('#val_diagnostico').val('Infección Urinaria Baja (Sistitis)'); break;
            case "O140": $('#val_diagnostico').val('Preelclapmcia Leve y Moderada'); break;
            case "O210": $('#val_diagnostico').val('Emesis e Hiperemesis del Embarazo'); break;
            case "PC104": $('#val_diagnostico').val('Prevención Anemias de Niños'); break;
            case "PC106": $('#val_diagnostico').val('Prev. Def. Vid. A 1 Dosis'); break;
            case "PC107": $('#val_diagnostico').val('Prev. Def. Vid. A 2 Dosis'); break;
            case "PC1CCD": $('#val_diagnostico').val('Peso Talla Normal'); break;
            case "PC2": $('#val_diagnostico').val('Prev. Anemia en Embarazos'); break;
            case "PC34": $('#val_diagnostico').val('Tratamiento Preferencia Referencia'); break;
            case "PC58": $('#val_diagnostico').val('Tuberculosis Pulmonar'); break;
            case "PC88": $('#val_diagnostico').val('Tuberculosis Extrapulmonar'); break;
            case "PC91": $('#val_diagnostico').val('Desnutrición Aguda Grave (Pre-ref.)'); break;
            case "T140": $('#val_diagnostico').val('Contusiones Superficiales'); break;
            case "Z381": $('#val_diagnostico').val('Parto y RN en Domicilio por Pers. Salud'); break;
            case "Z392": $('#val_diagnostico').val('Control Puerperal'); break;

            default:
            break;
        }
        
    })
});

$(document).ready(function() {
    $('#TablaMedicamentos').DataTable()
    $('#TablaDiagnosticos').DataTable()
});