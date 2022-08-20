$(document).ready( function(){
  var menuRight = document.getElementById( 'menu_principal' ),
    iconLateral = document.getElementById( 'icon-lateral' ),
    body = document.body;
    iconLateral.onclick = function() {
	  classie.toggle( this, 'active' );
  	  classie.toggle( menuRight, 'menu-lateral' ); 
  };

  $("#newsletter_form").validate({
    rules: {
      nome: {required:!0,minlength:2},
      email: {required:!0,email:!0},
    },
    messages: {
      nome: {required: "Preencha o campo nome",minlength: "No mínimo 2 letras"},
      email: {required: "Informe o seu email",email: "Informe um email válido"},
    },
    submitHandler: function(e) {
      var n = $(e).serialize();
      return $("#newsletter_envia").html('<img src="img/loading.gif" border="0" />'), $.ajax({
        type: "POST",
        url: $(e).attr("action"),
        data: n,
        success: function(e) {
          $("#newsletter_envia").html(e)
        }
      }), !1
    }
  })
});