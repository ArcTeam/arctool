<?php
session_start();
define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/class/facebook-sdk-v5/');
require_once __DIR__ . '/class/facebook-sdk-v5/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '498077220384026',
  'app_secret' => '79ebf5d0be20a1fd44213ec63216f4e2',
  'default_graph_version' => 'v2.7',
]);


$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'public_profile']; // optional
$loginUrl = $helper->getLoginUrl('http://localhost/callback.php', $permissions);
?>


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
                <div class="wrap" style="display:none">
                    <?php echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>'; ?>
                </div>
            </section>
        </div>
        <footer>
            <div id="footerWrap">
                <div>
                    <span>Powered by:</span><span><a href="www.arc-team.com" title="Arc-Team web site" target="_blank"><img src="img/arcteam_small.png" id="logoAT" class="logoImg"></a></span>
                </div>
                <div>
                    <span>Licensed by: </span><span><a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Licenza Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/80x15.png"  class="logoImg"></a></span>
                </div>
                <div>
                    <span>Available on: </span><span> <a href="www.arc-team.com" title="Get Code" target="_blank"><img src="img/github_small.png" id="logoGH" class="logoImg"></a> </span>
                </div>
            </div>
        </footer>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="js/init.js"></script>
        <script src="js/function.js"></script>
    </body>
</html>
