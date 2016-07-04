<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="generator" content="atom" >
        <meta name="author" content="Giuseppe Naponiello" >
        <meta name="robots" content="INDEX,FOLLOW" />
        <meta name="copyright" content="&copy;2015 Arc-Team" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes" />
        <meta name="description" content="" />
        <meta name="keywords"  content="" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" media="all" >
        <title>Arc-Team Open Research</title>
        <style>
            label, input{display:inline-block;}
            label{width:50px;}
            input[type=number]{width:50px;}
        </style>
    </head>
    <body>
        <section id="valori">
            <header>Calcola Texture del terrreno</header>
            <form name="valori" action="#" method="post">
                <div class="row">
                    <label>Sabbia</label>
                    <input name="sabbia" type="number" placeholder="%" min="0" max="100" value="" class="perc" required>
                </div>
                <div class="row">
                    <label>Limo</label>
                    <input name="limo" type="number" placeholder="%" min="0" value="" class="perc" required>
                </div>
                <div class="row">
                    <label>Argilla</label>
                    <input name="argilla" type="number" placeholder="%" readonly="false" value="" class="perc">
                </div>
                <div class="row">
                    <button name="submit" type="submit">calcola</button>
                    <button name="reset" type="reset">azzera</button>
                </div>
                <div class="row">
                    <div id="risultato"></div>
                </div>
            </form>
        </section>
        <section id="canvas">

        </section>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script>
            $(document).ready(function(){
                var arg = $("input[name=argilla]");
                $("input[name=sabbia]").on('change', function(){
                    $("input[name=limo]").attr('max',100-$(this).val());
                });
                $("form[name=valori]").on("submit", function(e){
                    e.preventDefault();
                    var s = $("input[name=sabbia]").val();
                    var l = $("input[name=limo]").val();
                    arg.val(100-(parseInt(s)+parseInt(l)));
                    var a = arg.val();
                    getTexture(s, l, a);
                });
            });
            function getTexture(s,l,a){
                var res = $("#risultato");
                if((a + 1.5*l) < 15){res.text('Sand');}
                else if((a + 1.5*l >= 15) && (a + 2*l < 30)){res.text('Loamy Sand');}
                else if((l >= 7 && l < 20) && (s > 52) && ((a + 2*l) >= 30) || (l < 7 && s < 50 && (s+2*l)>=30)){res.text('Sandy Loam');}
                else if((l >= 7 && l < 27) && (a >= 28 && a < 50) && (s <= 52)){res.text('Loam');}
                else if((a >= 50 && (l >= 12 && l < 27)) || ((a >= 50 && a < 80) && l < 12)){res.text('Silt Loam');}
                else if(a >= 80 && l < 12){res.text('Silt');}
                else if((l >= 20 && l < 35) && (a < 28) && (s > 45)){res.text('Sandy Clay Loam');}
                else if((l >= 27 && l < 40) && (s > 20 && s <= 45)){res.text('Clay Loam');}
                else if((l >= 27 && l < 40) && (s  <= 20)){res.text('Silty Clay Loam');}
                else if(l >= 35 && s > 45){res.text('Sandy Clay');}
                else if(l >= 40 && a >= 40){res.text('Silty Clay');}
                else if(l >= 40 && s <= 45 && a < 40){res.text('Clay');}
                else{res.text('Errore nel calcolo, riprova');}
            }
        </script>
    </body>
</html>
