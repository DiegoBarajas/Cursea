function cambiarImg(act){
    var nombre = document.getElementById("nombre");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var confirmar = document.getElementById("confirmar");
    var img = document.getElementById("input-imagen").files.length;
    var form = document.getElementById("form");
    var error = document.getElementById("p-error");

    
    if( (nombre.value == "") && (email.value == "") && (password.value == "") && (img == 0)){
        error.innerHTML = "No hiciste ningun cambio";
    }else if( ((email.value != "") && (!validarEmail(email.value)) && (password.value != "") && (password.value.length < 6) )){
        error.innerHTML = "Debes ingresar un correo electronico y tu nueva contraseña debe tener 6 caracteres o más";
    }else if( (email.value != "") && (!validarEmail(email.value)) ){
        error.innerHTML = "Debes ingresar un correo electronico";
    }else if( (password.value != "") && (password.value.length < 6) ){
        error.innerHTML = "Tu nueva contraseña debe tener 6 caracteres o más";
    }else if( ((nombre.value!="") || (email.value!="") || (password.value!="")) && (confirmar.value != act)) {
        error.innerHTML = "Tu contraseña no coincide con la ingresada";
    }else{
       form.submit();
    }
}

function seleccionarImg(){
    var form_img = document.getElementById("input-imagen");
    var img = document.getElementById("img");

    var url = URL.createObjectURL(form_img.files[0]);
    img.src = url;
}

function validarEmail(valor) {
    if (/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(valor)){
        return true;
    } else {
        return false;
    }
}