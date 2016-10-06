// ottengo il valore del breakpoint in uso
var breakpoint = {};
breakpoint.refreshValue = function () {
  this.value = window.getComputedStyle(document.querySelector('body'), ':before').getPropertyValue('content').replace(/\"/g, '');
};
$(window).resize(function () { breakpoint.refreshValue();}).resize();

// modifico le dimensioni del canvas in base al valore del breakpoint in uso
var canwhidth, canheight, file;
if(breakpoint.value == 'smartphone'){
    canwhidth = 300;
    canheight = 255;
    file = 'canvas_small.svg';
}else if (breakpoint.value == 'tablet') {
    canwhidth = 300;
    canheight = 255;
    file = 'canvas_small.svg';
}else {
    canwhidth = 627;
    canheight = 536;
    file = 'canvas.svg';
}
var limo = $("input[name=limo]");
var reset = $("button[name=reset]");
//per gli elementi canvas non puoi usare la sintassi di jQuery ma puro javascript
var canvas = document.getElementById("canvas");
canvas.width = canwhidth;
canvas.height = canheight;
var ctx = canvas.getContext("2d");

$(document).ready(function(){
    $(".ribbon").on("click", function(){ window.open('www.arc-team.com','_blank'); });
    $("#svgContent").load("img/"+file);
    $("#risultatoContent").hide();
    $("input[name=sabbia]").on('change', function(){ $("input[name=argilla]").attr('max',100-$(this).val()); });
    $("form[name=valori]").on("submit", function(e){
        e.preventDefault();
        var us = $("input[name=us]").val();
        var s = $("input[name=sabbia]").val();
        var a = $("input[name=argilla]").val();
        limo.val(100-(parseInt(s)+parseInt(a)));
        var l = limo.val();
        getTexture(us, s, a, l, canwhidth, canheight);
    });
    reset.on("click", function(){
        $("path").attr('class','');
        $("#risultatoContent").hide();
        $("#risultato").text('');
    });
    pallino(-100,-100);
});
