<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require('../inc/meta.inc'); ?>
        <title>geTTexture - ArcTool</title>
        <style>
            input[name=us]{width:50px;}
        </style>
    </head>
    <body>
        <header id="main">
            <div class="ribbon-wrapper">
                <div class="ribbon"></div>
            </div>
            <div class="wrap"><h1><i class="fa fa-pie-chart"></i> geTTexture</h1></div>
        </header>
        <div class="wrap">
            <section id="valori">
                <header class="row">
                    <h1>Calcola la matrice del suolo</h1>
                    <p>Inserisci la percentuale di sabbia e argilla, il sistema calcolerà la quantità di limo e il tipo di texture del suolo</p>
                    <p>Se non sai come ottenere le percentuali dei vari componenti del suolo, <a href="#howto">leggi questo breve how-to</a></p>
                    <p>Il sistema tiene in memoria i dati inseriti finché non aggiorni o cambi pagina, se vuoi puoi scaricarli liberamente in formato csv</p>
                    <p>In alternativa puoi registrarti al servizio per salvare i tuoi dati in maniera permanente. In questo modo potrai creare il tuo archivio personale aggiungendo anche il nome del sito, e scaricare i dati ogni volta che vuoi</p>
                </header>
                <form name="valori" action="#" method="post">
                    <div class="row">
                        <label>US</label>
                        <input name="us" type="text" value="0" class="perc">
                    </div>
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
                        <button name="csvLink" type="button" style="display:none">guarda dati</button>
                    </div>
                </form>
                <div id="risultatoContent"><div id="risultato"></div></div>
                <div id='dataContent'>
                    <table id=data>
                        <thead>
                            <tr>
                                <th></th><th>US</th><th>% Sabbia</th><th>% Argilla</th><th>% Limo</th><th>Matrice</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <a href="#" id="closeDiv">chiudi</a>
                    <a href="#" id="csv">scarica csv</a>
                </div>
            </section>
            <section id="canvasContent">
                <div id="svgContent"><?php echo file_get_contents("img/canvas.svg"); ?></div>
                <canvas id="canvas"></canvas>
            </section>
            <section id="howto">
                <header class="row"><h1>Come calcolare la matrice</h1></header>
            </section>
        </div>
        <?php require_once('../inc/footer.php'); ?>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="js/initGetTexture.js"></script>
        <script src="js/function.js"></script>
    </body>
</html>
