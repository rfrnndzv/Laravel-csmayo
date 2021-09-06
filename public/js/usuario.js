$(document).ready(function(){
    $('#registrar').click(function(){
        var c1 = $('#c1').val();
        var c2 = $('#c2').val();
        if( c1 != c2){
            $('#mc2').fadeIn();
            return false;
        }
    });
});

//Validación de Campos requeridos
$(document).ready(function(){
  $('#ciusuario').focusout(function(){
    var datos = $('#registro').serializeArray();
    $.ajax({
      url: "busca",
      type: "GET",
      data: datos
    }).done(function(data){
      if(data){
        $('#ciusuario').focus();
        alert('Este C.I. de personal ya esta registrado.\nRevise nuevamente por favor.');
        $('#ciusuario').val("");
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