$(document).ready(function(){
    var r = $(':checkbox[required]');
    r.change(function(){
        if(r.is(':checked')) { r.removeAttr('required'); }
        else {r.attr('required', 'required');}
    });
    $("#uploadImg").on("change",function(){ checkFileSize(this); });
});

function checkFileSize() {
    var img = document.getElementById("uploadImg");
    var pattern = new RegExp(/[\s\~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/); //unacceptable chars
    if (window.File && window.FileReader && window.FileList && window.Blob){
        var fsize = img.files[0].size;
        var ftype = img.files[0].type;
        var fname = img.files[0].name;
        if(fsize>1048576){
            img.setCustomValidity("Stai cercando di caricare un file di "+(fsize/1048576).toFixed(2)+" mb mentre la dimensione massima consentita è di 1mb");
        }else if (ftype != 'image/png' && ftype!='image/jpeg') {
            img.setCustomValidity("Stai cercando di caricare un file di tipo "+ftype+" mentre sono consentiti solo file di tipo png o jpg.");
        }else if (pattern.test(fname)) {
            img.setCustomValidity("Il nome del file contiene caratteri non validi come spazi o accenti, rinomina il file e riprova.");
        }else{
            img.setCustomValidity("");
        }
    }else{
        alert("Il tuo browser non supporta alcune funzionalità html5, prova ad aggiornarlo!");
    }
}
