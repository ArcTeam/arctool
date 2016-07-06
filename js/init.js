var limo = $("input[name=limo]");
var reset = $("button[name=reset]");
//per gli elementi canvas non puoi usare la sintassi di jQuery ma puro javascript
var canvas = document.getElementById("canvas");
canvas.width = 627;
canvas.height = 538;
var ctx = canvas.getContext("2d");
$(document).ready(function(){
    $("#risultatoContent").hide();
    $("input[name=sabbia]").on('change', function(){ $("input[name=argilla]").attr('max',100-$(this).val()); });
    $("form[name=valori]").on("submit", function(e){
        e.preventDefault();
        var s = $("input[name=sabbia]").val();
        var a = $("input[name=argilla]").val();
        limo.val(100-(parseInt(s)+parseInt(a)));
        var l = limo.val();
        getTexture(s, a, l);
    });
    reset.on("click", function(){
        $("path").attr('class','');
        $("#risultatoContent").hide();
        $("#risultato").text('');
    });
    pallino(-100,-100);
});
