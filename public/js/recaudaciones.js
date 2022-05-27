//Mostrar/Ocultar campos del Responsable
$(document).ready(function(){
  $('#val_responsable').click(function(){
    if ($('#val_responsable').prop('checked')) {      
      $("#responsable").append('<p class="division">A.1. IDENTIFICACIÓN DEL RESPONSABLE</p><div class="col-lg-2"><label for="val_ciresponsable" class="form-label">C.I. Responsable</label><input type="text" class="form-control" id="val_ciresponsable" name="ciresponsable" require><div class="invalid-feedback"> Ingrece Cédula de Identidad </div></div><div class="col-lg-2"> <label for="val_nombresresp" class="form-label">Nombres</label><input disabled type="text" class="form-control" id="val_nombresresp" name="nombresresp" required><div class="invalid-feedback"> Introduzca al menos un nombre </div></div><div class="col-lg-2"> <label for="val_apaternoresp" class="form-label">Apellido Paterno</label><input disabled type="text" class="form-control" id="val_apaternoresp" name="apaternoresp"></div><div class="col-lg-2"> <label for="val_amaternoresp" class="form-label">Apellido Materno</label><div class="input disabled-group has-validation"><input disabled type="text" class="form-control" id="val_amaternoresp" name="amaternoresp"></div></div><div class="col-lg-2"> <label for="val_fnacresp" class="form-label">Fecha de Nacimiento</label><input disabled type="date" class="form-control" id="val_fnacresp" name="fnacresp"><div class="invalid-feedback"> Por favor proporcione una fecha de nacimiento. </div></div><div class="col-lg-2"> <label class="form-label">Sexo</label><div class="form-check"><input disabled type="radio" class="form-check-input disabled" id="val_sexofresp" name="sexoresp" value="F"required><label class="form-check-label" for="val_sexofresp">Femenino</label></div><div class="form-check"><input disabled type="radio" class="form-check-input disabled" id="val_sexomresp" name="sexoresp" value="M"required><label class="form-check-label" for="val_sexom">Masculino</label><div class="invalid-feedback">Seleccione almenos uno</div></div></div><div class="col-lg-2"> <label for="val_ocupacionresp" class="form-label">Ocupación</label><input disabled type="text" class="form-control" id="val_ocupacionresp" name="ocupacionresp" require><div class="invalid-feedback"> Por favor complete el campo. </div></div><div class="col-lg-2"> <label for="val_ocomunitariaresp" class="form-label">Gestión Comunitaria</label><input disabled type="text" class="form-control" id="val_ocomunitariaresp" name="ocomunitariaresp"></div><div class="col-lg-2"> <label for="val_nacionalidadresp" class="form-label">Nacionalidad</label><input disabled type="text" class="form-control" id="val_nacionalidadresp" name="nacionalidadresp"></div><div class="col-lg-2"> <label for="val_telefonoresp" class="form-label">Telefono</label><input disabled type="text" class="form-control" id="val_telefonoresp" name="telefonoresp"></div>');
    }else{
      $("#responsable").html('');
    }
  });
});

//Inserta los datos por C.I. si el Responsable ya esta registrado
$(document).ready(function(){
  $('#responsable').on("keyup", "#val_ciresponsable",function(){
    var datos = $('#registro').serializeArray();
    const ciresponsable =  $('#val_ciresponsable').val();
    $.ajax({
      url: "/recaudaciones/responsable",
      type: "GET",
      data: {
        ciresponsable,
        _token:$('input[name="_token"]').val()
      },
      success:function(responsable){
        
        if(responsable != null){
          $('#val_nombresresp').val(responsable['nombres']);
          $('#val_apaternoresp').val(responsable['apaterno']);
          $('#val_amaternoresp').val(responsable['amaterno']);
          $('#val_fnacresp').val(responsable['fnac']);
          if((responsable['sexo']) == "M"){
            $('#val_sexomresp').prop('checked', true);
          }else{
            $('#val_sexofresp').prop('checked', true);
          }
          $('#val_ocupacionresp').val(responsable['ocupacion']);
          $('#val_ocomunitariaresp').val(responsable['ocomunitaria']);
          $('#val_nacionalidadresp').val(responsable['nacionalidad']);
          $('#val_telefonoresp').val(responsable['telefono']);
        }else{
          $('#val_nombresresp').val("");
          $('#val_apaternoresp').val("");
          $('#val_amaternoresp').val("");
          $('#val_fnacresp').val("");
          $('#val_sexomresp').prop('checked', false);
          $('#val_sexofresp').prop('checked', false);
          $('#val_ocupacionresp').val("");
          $('#val_ocomunitariaresp').val("");
          $('#val_nacionalidadresp').val("");
          $('#val_telefonoresp').val("");
          $('.select-resp').val($('select > option:first').val());
        }
      }
    });
  });
});

//Validación de Campo C.I. paciente
$(document).ready(function(){
  $('#val_cipaciente').focusout(function(){
    var datos = $('#registro').serializeArray();
    const ci = $('#val_cipaciente').val();
    $.ajax({
      url: "/recaudaciones/show",
      type: "GET",
      data: datos
    }).done(function(res){
      if (res){
        alert('El C.I.: '+ci+' de paciente ya esta registrado.\nVerifique por favor.');
        $('#val_cipaciente').val("");
        $('#val_cipaciente').focus();
      }
    });
  });
});

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()