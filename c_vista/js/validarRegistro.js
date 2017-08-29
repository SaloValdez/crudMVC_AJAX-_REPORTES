/*=============================================
VALIDAR USUARIO EXISTENTE AJAX
=============================================*/

var usuarioExistente = false;
var emailExistente = false;  //para no hacer el registro si existe  el registro
$("#usuRegistro").change(function(){

	var usuario = $("#usuRegistro").val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);

	$.ajax({
		url:"c_vista/secciones/ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			if (respuesta == 0) {
				 $("label[for='usuRegistro'] span").html('<p>Este usuario ya existe en la BD</p>');
				 usuarioExistente = true;
			}else{
				$("label[for='usuRegistro'] span").html("");
				usuarioExistente = false;
			}
		}

	});

});


/*=============================================
VALIDAR CORREO EXISTENTE AJAX
=============================================*/


$("#emailRegistro").change(function(){

	var email = $("#emailRegistro").val();

	var datos = new FormData();
	datos.append("validarEmail", email);

	$.ajax({
		url:"c_vista/secciones/ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			if (respuesta == 0) {
				 $("label[for='emailRegistro'] span").html('<p>Este email ya existe en la BD</p>');
				 emailExistente = true;
			}else{
				$("label[for='emailRegistro'] span").html("");
				emailExistente = false;
			}
		}

	});

});










// VALIDAR REGISTROS
  function validarRegistro(){
    var usuario = document.querySelector('#usuRegistro').value;
    // console.log('usua',usuario);
    var password = document.querySelector('#contraRegistro').value;
    // console.log('contras',password);
    var email= document.querySelector('#emailRegistro').value;
    // console.log('ema',email);
      var terminos= document.querySelector('#terminos').checked;

    // validar CAMPO USUARIO
            if (usuario !="") {
              //  ¨si la variable usuario es diferente a vacia?
                  var caracteres = usuario.length; //cuenta la longetud caracteres
                  var expresion =/^[a-zA-Z0-9]*$/; //SOLO SE ACEPTARA ESTOS CARACTERES  EN ESTE CAMPO
                  if (caracteres > 9) {
                    document.querySelector("label[for='usuRegistro']").innerHTML +="<br>Escriba menos de 9 caracteres.";
                    // innerHTML = colocar en html una linea de texto
                    return false;
                  }
                  if (!expresion.test(usuario)) {
                    document.querySelector("label[for='usuRegistro']").innerHTML +="<br>No escriba caracteres especiales.";
                    return false;
                  }

									if (usuarioExistente) {
										document.querySelector("label[for='usuRegistro'] span").innerHTML ="<br><p>Este usuario ya existe en la BD</p>.";
                    return false;
									}

            }

      // validar CAMPO CONTRASEÑA
            if (password !="") {
              //  ¨si la variable usuario es diferente a vacia?
                  var caracteres = password.length; //cuenta la longetud caracteres
                  var expresion =/^[a-zA-Z0-9]*$/; //SOLO SE ACEPTARA ESTOS CARACTERES  EN ESTE CAMPO
                  if (caracteres > 6) {
                    document.querySelector("label[for='contraRegistro']").innerHTML +="<br>Escriba menos de 6 caracteres.";
                    // innerHTML = colocar en html una linea de texto
                    return false;
                  }
                  if (!expresion.test(password)) {
                    document.querySelector("label[for='contraRegistro']").innerHTML +="<br>No escriba caracteres especiales.";
                    return false;
                  }
            }

          // validar CAMPO EMAIL
            if (email !="") {
              //  ¨si la variable usuario es diferente a vacia?
                  var expresion =/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i; //SOLO SE ACEPTARA ESTOS CARACTERES  EN ESTE CAMPO

                  if (!expresion.test(email)) {
                    document.querySelector("label[for='emailRegistro']").innerHTML +="<br>Escriba correctamente el email.";
                    return false;
                  }
									if (emailExistente) {
										document.querySelector("label[for='emailRegistro'] span").innerHTML ="<br><p>Este email ya existe en la BD</p>.";
                    return false;
									}
            }

            // validar CHEKED terminos
            if (!terminos) {
                  // si no esta seleccionado
                document.querySelector("form").innerHTML +="<br>No se logor terminos y condiciones.";
                 document.querySelector('#usuRegistro').value = usuario;
                // console.log('usua',usuario);
                document.querySelector('#contraRegistro').value = password;
                // console.log('contras',password);
                document.querySelector('#emailRegistro').value = email;
                // console.log('ema',email);
                return false;
            }
    return true;


  }





// FIN VALIUDAR REGISTRO
