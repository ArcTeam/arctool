function getTexture(us,s,a,l,canwhidth,canheight){
    $("path").attr('class','');
    $("#risultatoContent").show();
    var res = $("#risultato");
    if((l + 1.5*a) < 15){res.text('Sabbioso'); $("#sabbioso").attr('class','gettexture');}
    else if((l + 1.5*a >= 15) && (l + 2*a < 30)){res.text('Sabbioso franco'); $("#sabbiosofranco").attr('class','gettexture');}
    else if(l<80&&(a >= 7 && a < 20) && (s > 52) && ((l + 2*a) >= 30) || (a < 7 && s < 50 && (l+2*a)>=30)){res.text('Franco sabbioso'); $("#francosabbioso").attr('class','gettexture');}
    else if((a >= 7 && a < 27) && (l >= 28 && l < 50) && (s <= 52)){res.text('Franco'); $("#franco").attr('class','gettexture');}
    else if((l >= 50 && (a >= 12 && a < 27)) || ((l >= 50 && l < 80) && a < 12)){res.text('Franco limoso'); $("#francolimoso").attr('class','gettexture');}
    else if(l >= 80 && a < 12){res.text('Limoso'); $("#limoso").attr('class','gettexture');}
    else if((a >= 20 && a < 35) && (l < 28) && (s > 45)){res.text('Franco sabbioso argilloso'); $("#francosabbiosoargilloso").attr('class','gettexture');}
    else if((a >= 27 && a < 40) && (s > 20 && s <= 45)){res.text('Franco argilloso'); $("#francoargilloso").attr('class','gettexture');}
    else if((a >= 27 && a < 40) && (s  <= 20)){res.text('Fanco limoso argilloso'); $("#francolimosoargilloso").attr('class','gettexture');}
    else if(a >= 35 && s > 45){res.text('Argilloso sabbioso'); $("#argillososabbioso").attr('class','gettexture');}
    else if(a >= 40 && l >= 40){res.text('Argilloso limoso'); $("#argillosolimoso").attr('class','gettexture');}
    else if(a >= 40 && s <= 45 && l < 40){res.text('Argilloso'); $("#argilloso").attr('class','gettexture');}
    else{res.text('Errore nel calcolo, riprova');}

    var xOff = canwhidth;
    var yOff = canheight;
    var y = yOff-(yOff*parseFloat(a)*0.01);
    var h = yOff - y;
    var lh = (2*h)/1.73;
    var x = xOff-(xOff*parseFloat(s)*0.01)-(lh/2);
    pallino(x,y, xOff, yOff)

    var matrix = res.text();
    $("#data tbody").append("<tr><td><i class='fa fa-times remove' aria-hidden='true'></i></td><td>"+us+"</td><td>"+s+"</td><td>"+a+"</td><td>"+l+"</td><td>"+matrix+"</td></tr>");
    var tr = $("#data tbody tr").length;
    if(tr>0){
        $("button[name='csvLink']").show().click(function(){
            $("#dataContent").fadeIn('fast');
            $(".remove").click(function(){
                $(this).parent().parent().remove();
                var tr = $("#data tbody tr").length;
                if(tr==0){$("button[name='csvLink']").hide();}
            });
            $("#closeDiv").click(function(){ $("#dataContent").fadeOut('fast'); })
        });
    }else{
        $("button[name='csvLink']").hide();
    }

}

function pallino(x,y,xOff,yOff){
    ctx.clearRect(0, 0, xOff, yOff);
    ctx.beginPath();
    ctx.arc(x, y, 5, 0, Math.PI*2, false);
    ctx.closePath();
    ctx.fillStyle = "#000";
    ctx.fill();
}
