function funcion(){

    var com = document.getElementById("comentario");

    var long = 999 - (parseInt(com.value.length));

    var p = document.getElementById("p-comentario");



    p.innerHTML = long;



    if(long==0){

        p.style.color = "red";

    }else if(long < 0){

        com.value = com.value.substring(0, 999 - 1);

        p.innerHTML = '0';

    }else{

        p.style.color = "black";

    }

}



function editarComentario(id_comentario, comentario){

    document.getElementById("text_area").value = comentario;

    document.getElementById("id-comentario").value = id_comentario;



    funcion2();

}



function borrar(id_comentario, comentario){

    document.getElementById("p-comm").innerHTML = comentario;

    document.getElementById("id-comentario2").value = id_comentario;

}



function editarComentarioPost(){

    document.getElementById("com").value = document.getElementById("text_area").value;

    var f = document.getElementById("formulario_uwu");

    if(document.getElementById("text_area").value.length <= 0){

        document.getElementById("h3-camb").innerHTML = "El comentario no puede estar vacio";

        document.getElementById("h3-camb").style.color = "rgb(200,0,0)";

    }else{

        f.submit();

    }

}



function eliminarPost(){

    var f = document.getElementById("formulario_unu");



    f.submit();

}



function cbHidden(){

    document.getElementById("cb").checked = false;

}



function funcion2(){

    var com = document.getElementById("text_area");

    var long = 999 - (parseInt(com.value.length));

    var p = document.getElementById("h3-camb");



    p.innerHTML = "Cambiar comentario ("+long+")";



    if(long==0){

        p.style.color = "rgb(200,0,0)";

    }else if(long < 0){

        com.value = com.value.substring(0, 999 - 1);

        p.innerHTML = "Cambiar comentario (0)";

    }else{

        p.style.color = "var(--cafe-5)";

    }

}



function cb2Hidden(){

    document.getElementById("cb2").checked = false;

}



function redirecccion(id){

    window.location.href = "video.php?id="+id;

}





// - - -    VIDEO   - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 



var video = document.getElementById("vidio");

var v = 1;

var min = 0;

var seg = "00";

var duracion;

var fullscreen = false;



function playVideo(){

    var imgend = document.getElementById("imgRestartEnd");

    var img = document.getElementById("imgPlay");



    setLabDuracion();



    imgend.style.display="none";

    if(video.paused){

        video.play();

        img.setAttribute("src", "/img/video/pause.png");

    }else{

        video.pause();

        img.setAttribute("src", "/img/video/play.png");

    }

}



function mutedVideo(){

    var img = document.getElementById("imgMute");

    var volume = document.getElementById("volumeBar");



    v = video.volume;



    if(!video.muted){

        video.muted = true;

        img.setAttribute("src", "/img/video/mute.png");

        volume.value = 0;

    }else{

        video.muted = false;

        img.setAttribute("src", "/img/video/volume.png");

        volume.value = v*100;

        video.volume = v;

    }

}



function volumeVideo(){

    var control = document.getElementById("volumeBar");

    var img = document.getElementById("imgMute");



    var vol = parseInt(control.value);

    vol = Math.floor(vol/10)/10

    if(vol==0){

        img.setAttribute("src", "/img/video/mute.png");

    }else{

        img.setAttribute("src", "/img/video/volume.png");

    }



    if(video.muted){

        video.muted=false;

    }



    video.volume = vol;

}



function restartVideo(){

    video.currentTime = 0;

}



function updProgress(){

    var progress = document.getElementById("progressBar");



    var pb = (progress.value/100)*video.duration;

    video.currentTime = pb;

}



function barra(){

    var progress = document.getElementById("progressBar");

    var lab = document.getElementById("labTiempo");



    var pro = (video.currentTime*100)/video.duration;

    progress.value = pro;



    var s = Math.floor(video.currentTime);

    var m = Math.floor(s/60);

    s = s%60;



    if(s<10){

        s = '0'+s;

    }



    lab.innerHTML = m+':'+s;

}



function fullScreen(){

    var v = document.getElementById("videooooo");
    var con = document.getElementById("controls");
    var img = document.getElementById("imgFullscren");

    

    if(!fullscreen){
        document.body.requestFullscreen();


        v.style.width= "100%";
        v.style.height= "100%";
        v.style.position= "fixed";
        v.style.top = "0px";
        v.style.left = "0px";
        v.style.backgroundColor = "#000";
        v.style.zIndex="20"; 

        con.style.width = "100%";

        img.setAttribute("src", "/img/video/exit-fullscreen.png")

        fullscreen = true;

    }else{
        document.exitFullscreen();

        v.style.width= "70vw";
        v.style.height= "77.5vh";
        v.style.position= "inherit";
        v.style.top = "unset";
        v.style.left = "unset";
        v.style.backgroundColor = "black";
        v.style.zIndex="1";

        con.style.width = "70vw";

        img.setAttribute("src", "/img/video/fullscreen.png")

        fullscreen = false;
    }

}



function setLabDuracion(){

    var lab = document.getElementById("labDuracion");



    var s = Math.floor(video.duration);

    var m = Math.floor(s/60);

    s = s%60;



    if(s<10){

        s = '0'+s;

    }

    if((s == NaN) || (m == Nan)){
        lab.innerHTML = ". . .";
    }else{
        lab.innerHTML = m+':'+s;
    }

}



function videoEnd(){

    var img = document.getElementById("imgPlay");

    var imgend = document.getElementById("imgRestartEnd");





    img.setAttribute("src", "/img/video/play.png");

    imgend.style.display = "block";

}

function ready(){
    setLabDuracion();
}

setTimeout(()=>{

    setLabDuracion();

},1000);

