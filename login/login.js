//Ejecutando funciones
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);
document.getElementById("btn__registrarse").addEventListener("click", register);
window.addEventListener("resize", anchoPage);

//Declarando variables
var formulario_login = document.querySelector(".formulario__login");
var formulario_register = document.querySelector(".formulario__register");
var contenedor_login_register = document.querySelector(".contenedor__login-register");
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_register = document.querySelector(".caja__trasera-register");

    //FUNCIONES

function anchoPage(){

    if (window.innerWidth > 850){
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "block";
    }else{
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_register.style.display = "none";   
    }
}

anchoPage();


    function iniciarSesion(){
        if (window.innerWidth > 850){
            formulario_login.style.display = "block";
            contenedor_login_register.style.left = "10px";
            formulario_register.style.display = "none";
            caja_trasera_register.style.opacity = "1";
            caja_trasera_login.style.opacity = "0";
        }else{
            formulario_login.style.display = "block";
            contenedor_login_register.style.left = "0px";
            formulario_register.style.display = "none";
            caja_trasera_register.style.display = "block";
            caja_trasera_login.style.display = "none";
        }
    }

    function register(){
        if (window.innerWidth > 850){
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "410px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.opacity = "0";
            caja_trasera_login.style.opacity = "1";
        }else{
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "0px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.display = "none";
            caja_trasera_login.style.display = "block";
            caja_trasera_login.style.opacity = "1";
        }
}

function login(){
    var formulario = document.getElementById("form-login");

    var email = document.getElementById("email-log");
    var pass = document.getElementById("pass-log");

    var error = document.getElementById("error_login");
    var error_email = document.getElementById("error_login_email");

    error.innerHTML = null;
    error_email.innerHTML = null;
    email.style.border = "0px";
    pass.style.border = "0px";

    if((email.value == "") && (pass.value == "")){
        error.innerHTML = "Debes llenar todos los campos";

        email.style.border = "1px solid red";
        pass.style.border = "1px solid red";
    }else if(email.value == ""){
        error_email.innerHTML = "Debes llenar el campo 'Correo Electrónico'";

        email.style.border = "1px solid red";
    }else if(pass.value == ""){
        error.innerHTML = "Debes llenar el campo 'Contraseña'";

        pass.style.border = "1px solid red";
    }else if(!validarEmail(email.value)){
        error_email.innerHTML = "Debes ingresar un correo electrónico";

        email.style.border = "1px solid red";
    }else if(pass.value.length < 6){
        error.innerHTML = "La contraseña debe tener como mínimo 6 carácteres";

        pass.style.border = "1px solid red";
    }else{
        formulario.submit();
    }

}

function signin(){
    var formulario = document.getElementById("form-signin");

    var nombre = document.getElementById("nombre-sign"); 
    var email = document.getElementById("email-sign");
    var pass = document.getElementById("pass-sign");
    var con_pass = document.getElementById("con-pass-sign");

    var error = document.getElementById("error_signin");
    var error_email = document.getElementById("error_signin_email");
    var error_pass = document.getElementById("error_signin_pass");

    error.innerHTML = null;
    error_email.innerHTML = null;
    error_pass.innerHTML = null;
    nombre.style.border = "0px";
    email.style.border = "0px";
    pass.style.border = "0px";
    con_pass.style.border = "0px";

    if((nombre.value == "") && (email.value == "") && (pass.value == "") && (con_pass.value == "")){
        error.innerHTML = "Debes llenar todos los campos";

        nombre.style.border = "1px solid red";
        email.style.border = "1px solid red";
        pass.style.border = "1px solid red";
        con_pass.style.border = "1px solid red";
    }else if((nombre.value == "") && (email.value == "") && (pass.value == "")){
        error.innerHTML = "Debes llenar todos los campos";

        nombre.style.border = "1px solid red";
        email.style.border = "1px solid red";
        pass.style.border = "1px solid red";
    }else if((email.value == "") && (pass.value == "") && (con_pass.value == "")){
        error.innerHTML = "Debes llenar todos los campos";
        
        email.style.border = "1px solid red";
        pass.style.border = "1px solid red";
        con_pass.style.border = "1px solid red";
    }else if((nombre.value == "") && (pass.value == "") && (con_pass.value == "")){
        error.innerHTML = "Debes llenar todos los campos";

        nombre.style.border = "1px solid red";
        pass.style.border = "1px solid red";
        con_pass.style.border = "1px solid red";
    }else if((nombre.value == "") && (email.value == "") && (con_pass.value == "")){
        error.innerHTML = "Debes llenar todos los campos";

        nombre.style.border = "1px solid red";
        email.style.border = "1px solid red";
        con_pass.style.border = "1px solid red";


    }else if((nombre.value == "") && (email.value == "")){
        error.innerHTML = "Debes llenar todos los campos";

        nombre.style.border = "1px solid red";
        email.style.border = "1px solid red";
    }else if((email.value == "") && (con_pass.value == "")){
        error.innerHTML = "Debes llenar todos los campos";
        
        email.style.border = "1px solid red";
        con_pass.style.border = "1px solid red";
    }else if((nombre.value == "") && (con_pass.value == "")){
        error.innerHTML = "Debes llenar todos los campos";

        nombre.style.border = "1px solid red";
        con_pass.style.border = "1px solid red";
    }else if((email.value == "") && (con_pass.value == "")){
        error.innerHTML = "Debes llenar todos los campos";

        email.style.border = "1px solid red";
        con_pass.style.border = "1px solid red";
    }else if((pass.value == "") && (con_pass.value == "")){
        error.innerHTML = "Debes llenar todos los campos";

        pass.style.border = "1px solid red";
        con_pass.style.border = "1px solid red";
    }else if((email.value == "") && (con_pass.value == "")){
        error.innerHTML = "Debes llenar todos los campos";

        email.style.border = "1px solid red";
        con_pass.style.border = "1px solid red";
    }else if(nombre.value == ""){
        error.innerHTML = "Debes llenar el campo 'Nombre'";
        
        nombre.style.border = "1px solid red";
    }else if(email.value == ""){
        error.innerHTML = "Debes llenar el campo 'Correo Electrónico'";

        email.style.border = "1px solid red";
    }else if(pass.value == ""){
        error.innerHTML = "Debes llenar el campo 'Contraseña'";

        pass.style.border = "1px solid red";
    }else if(con_pass.value == ""){
        error.innerHTML = "Debes llenar el campo 'Confirmar contraseña'";

        con_pass.style.border = "1px solid red";
    }else if(!validarEmail(email.value)){
        error_email.innerHTML = "Debes ingresar un correo electrónico";
        
        email.style.border = "1px solid red";
    }else if(pass.value.length < 6){
        error_pass.innerHTML = "La contraseña debe tener como mínimo 6 carácteres";

        pass.style.border = "1px solid red";
    }else if(pass.value != con_pass.value){
        error.innerHTML = "Las contraseñas no coinciden";

        pass.style.border = "1px solid red";
        con_pass.style.border = "1px solid red";
    }else{
        formulario.submit();
    }
}

function clr(){
    var nombre = document.getElementById("nombre-sign"); 
    var email = document.getElementById("email-sign");
    var pass = document.getElementById("pass-sign");
    var con_pass = document.getElementById("con-pass-sign");

    var error = document.getElementById("error_signin");
    var error_email = document.getElementById("error_signin_email");
    var error_pass = document.getElementById("error_signin_pass");
    error.innerHTML = null;
    error_email.innerHTML = null;
    error_pass.innerHTML = null;
    nombre.style.border = "0px";
    email.style.border = "0px";
    pass.style.border = "0px";
    con_pass.style.border = "0px";
    nombre.value=null;
    email.value=null;
    pass.value=null;
    con_pass.value=null;

    var email = document.getElementById("email-log");
    var pass = document.getElementById("pass-log");

    var error = document.getElementById("error_login");
    var error_email = document.getElementById("error_login_email");
    error.innerHTML = null;
    error_email.innerHTML = null;
    email.style.border = "0px";
    pass.style.border = "0px";
    email.value=null;
    pass.value=null;

    console.log("Hola")
}

function validarEmail(valor) {
    if (/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(valor)){
        return true;
    } else {
        return false;
    }
}

function teclas(event){
    var va = event.keyCode;
    if(va == 13){
        login();
    }
}

function tabular(event){
    var tecla = event.keyCode;
    if(tecla == 13){
        document.getElementById("pass-log").focus();
    }
}

function tabular1(event){
    var tecla = event.keyCode;
    if(tecla == 13){
        document.getElementById("email-sign").focus();
    }
}

function tabular2(event){
    var tecla = event.keyCode;
    if(tecla == 13){
        document.getElementById("pass-sign").focus();
    }
}

function tabular3(event){
    var tecla = event.keyCode;
    if(tecla == 13){
        document.getElementById("con-pass-sign").focus();
    }
}

function teclas2(event){
    var va = event.keyCode;
    if(va == 13){
        signin();
    }
}

function olvidePassword(){
    var ventanita = document.getElementById("ventanita");
    llenarInput();

    ventanita.style.visibility = "visible";
}

function olvidePasswordC(){
    var ventanita = document.getElementById("ventanita");

    ventanita.style.visibility = "hidden";
}

function llenarInput(){
    var correo = document.getElementById("email-log").value;

    document.getElementById("input-olvide").value = correo;
}