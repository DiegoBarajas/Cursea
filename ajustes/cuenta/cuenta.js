function switchBtn(){
    var switch_checked = document.getElementById('switch-label').checked;
    var hidden = document.getElementById('hidden');
    var form = document.getElementById('form_tema');

    if(!switch_checked){
        hidden.value = "oscuro";
    }else{
        hidden.value = "claro";
    }

    form.submit();
}