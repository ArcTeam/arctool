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
        <link href="css/stile.css" rel="stylesheet" media="all" >
        <title>Arc-Team Open Research</title>
    </head>
    <body>
        <header id="main">
            <div class="wrap"><h1><i class="fa fa-pie-chart"></i> geTTexture</h1></div>
        </header>
        <section id="valori" class="wrap">
            <header class="row">
                <h1>Inserisci la percentuale di sabbia e argilla, il sistema calcolerà la quantità di limo e il tipo di texture del suolo</h1>
            </header>
            <form name="valori" action="#" method="post">
                <div class="row">
                    <label>Sabbia</label>
                    <input name="sabbia" type="number" placeholder="%" min="0" max="100" value="" class="perc" required>
                </div>
                <div class="row">
                    <label>Argilla</label>
                    <input name="argilla" type="number" placeholder="%" min="0" value="" class="perc" required>
                </div>
                <div class="row">
                    <label>Limo</label>
                    <input name="limo" type="number" placeholder="%" readonly="false" value="" class="perc">
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
        <section id="canvas" class="wrap">

        </section>
        <footer></footer>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="js/init.js"></script>
        <script src="js/function.js"></script>
    </body>
</html>
