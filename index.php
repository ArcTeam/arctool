<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="generator" content="atom">
        <meta name="author" content="Giuseppe Naponiello">
        <meta name="robots" content="INDEX,FOLLOW">
        <meta name="copyright" content="&copy;2015 Arc-Team">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
        <meta name="description" content="">
        <meta name="keywords"  content="">
        <title>geTTexture - ATOR</title>
        <link rel="icon" href="img/favicon.ico"/>
        <link href="css/stile.css" rel="stylesheet" media="all" >
    </head>
    <body>
        <header id="main">
            <div class="wrap"><h1><i class="fa fa-pie-chart"></i> geTTexture</h1></div>
        </header>
        <div class="wrap">
            <section id="valori">
                <header class="row">
                    <h1>Calcola la matrice del suolo</h1>
                    <p>Inserisci la percentuale di sabbia e argilla, il sistema calcolerà la quantità di limo e il tipo di texture del suolo</p>
                    <p>Se non sai come ottenere le percentuali dei vari componenti del suolo, <a href="#howto">leggi questo breve how-to</a></p>
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
                </form>
                <div id="risultatoContent"><div id="risultato"></div></div>
            </section>
            <section id="canvasContent">
                <div id="svgContent"><?php echo file_get_contents("img/canvas.svg"); ?></div>
                <canvas id="canvas"></canvas>
            </section>
            <section id="howto">
                <header class="row"><h1>Come calcolare la matrice</h1></header>
            </section>
        </div>
        <footer></footer>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="js/init.js"></script>
        <script src="js/function.js"></script>
    </body>
</html>
