$(document).ready(function(){
    $("#risultatoContent").hide();
    var limo = $("input[name=limo]");
    $("input[name=sabbia]").on('change', function(){ $("input[name=argilla]").attr('max',100-$(this).val()); });
    $("form[name=valori]").on("submit", function(e){
        e.preventDefault();
        var s = $("input[name=sabbia]").val();
        var a = $("input[name=argilla]").val();
        limo.val(100-(parseInt(s)+parseInt(a)));
        var l = limo.val();
        getTexture(s, a, l);
    });
    $("button[name=reset]").on("click", function(){
        $("path").attr('class','');
        $("#risultatoContent").hide();
        $("#risultato").text('');
    });
});
