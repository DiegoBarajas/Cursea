function redirectCurso0(){
    var form = document.getElementById("form_curso-0");

    form.submit();
}

function redirectCurso1(){
    var form = document.getElementById("form_curso-1");

    form.submit();
}

function redirectCurso2(){
    var form = document.getElementById("form_curso-2");

    form.submit();
}



function redirectCursomasVisto0(){
    var form = document.getElementById("form_curso-mas-visto-0");

    form.submit();
}

function redirectCursomasVisto1(){
    var form = document.getElementById("form_curso-mas-visto-1");

    form.submit();
}

function redirectCursomasVisto2(){
    var form = document.getElementById("form_curso-mas-visto-2");

    form.submit();
}

function clickCategoria(categoria){
    categoria.submit();
}

function load(){
    document.getElementById("load").style.display = "none";
    
    window.watsonAssistantChatOptions = {
        integrationID: "11420c74-9f58-4f75-af8d-2cfb989f79ae", // The ID of this integration.
        region: "us-south", // The region your integration is hosted in.
        serviceInstanceID: "a0823d81-c30b-443f-8733-90dcd8daeb27", // The ID of your service instance.
        onLoad: function(instance) { instance.render(); }
    };
    setTimeout(function(){
        const t=document.createElement('script');
        t.src="https://web-chat.global.assistant.watson.appdomain.cloud/versions/" + (window.watsonAssistantChatOptions.clientVersion || 'latest') + "/WatsonAssistantChatEntry.js";
        console.log(t.src);
        document.head.appendChild(t);
    });
}

window.onload = load;