function cambiarImg(){
    var img = document.getElementById("input-imagen").files.length;
    var form = document.getElementById("form");
    var error = document.getElementById("p-error");


    if(img == 0){
        error.innerHTML = "Debes seleccionar una imagen primero";
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