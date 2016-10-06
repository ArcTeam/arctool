<?php
session_start();
require_once("inc/db.php");
$listQuery = "select * from main.app a, main.log log, liste.licenze l where log.record=a.id and a.licenza = l.id and log.tabella = 'app' and log.operazione = 'I' order by log.data desc, a.nome asc;";
$listExec = pg_query($atoolconn, $listQuery);
while($app = pg_fetch_array($listExec)){
    $data = explode(" ",$app['data']);
    if(isset($_SESSION['id'])){
        $modClass = 'pointer';
        $modButton="<span style='float:right;'><i class='fa fa-wrench' aria-hidden='true'></i></span>";
    }else{
        $modButton="";
        $modClass='';
    }
    $list .= "<div class='scheda'>";
    $list .=    "<header class='success $modClass'>".$app['nome']." ".$modButton."</header>";
    $list .=    "<div class='imgContent'><img src='img/screenshot/".$app['img']."'></div>";
    $list .=    "<article>";
    $list .=        "<div class='rowButton'><span class='label'>Sviluppo:</span><span class='data'>".$app['team']."</span></div>";
    $list .=        "<div class='rowButton'><span class='label'>Categoria:</span><span class='data'>".$app['categoria']."</span></div>";
    $list .=        "<div class='rowButton'><span><a href='".$app['link']."' title='[Link esterno] Sito di riferimento del servizio' target='_blank'>Home page applicazione</a></span></div>";
    if($app['code'] != 'Assente'){
        $list .= "<div class='rowButton'><span><a href='".$app['code']."' title='[Link esterno] Sito di riferimento del servizio' target='_blank'>Link al codice</a></span></div>";
    }
    $list .=        "<div class='rowButton'><span class='label'>Licenza:</span><span class='data'><a href='".$app['url']."' title='[Link esterno] Pagina specifica della licenza' target='_blank'>".$app['sigla']."</a></span></div>";
    $list .=        "<div class='rowButton descrizione'><span class='label'>Descrizione:</span><span class='data'>".nl2br($app['descrizione'])."</span></div>";
    $list .=    "</article>";
    $list .=    "<footer>";
    $list .=        "<small>Aggiunto il ".$data[0]."</small>";
    $list .=    "</footer>";
    $list .= "</div>";
}

$steam = "select distinct team from main.app order by team asc;";
$steamExec = pg_query($atoolconn, $steam);
$team = "<option selected>sviluppo</option>";
while($t = pg_fetch_array($steamExec)){$team .= "<option value = '".$t['team']."'>".$t['team']."</option>";}

$slicenza = "select distinct l.sigla from liste.licenze l, main.app a where a.licenza = l.id order by sigla asc;";
$slicenzaExec = pg_query($atoolconn, $slicenza);
$licenza = "<option selected>licenza</option>";
while($l = pg_fetch_array($slicenzaExec)){$licenza .= "<option value = '".$l['sigla']."'>".$l['sigla']."</option>";}

?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('inc/meta.inc'); ?>
        <link href="css/index.css" rel="stylesheet" media="all" >
        <title>ArcTool</title>
    </head>
    <body>
        <?php require("inc/header.php"); ?>
        <section class="" id="mainContent">
            <div class="wrap">
                <p>Arc-Tool ha come obiettivo quello di offrire servizi utili al lavoro quotidiano degli archeologi.<br/>I servizi sono divisi in 3 categorie principali: web, mobile e desktop.</p>
                <p>Le <strong>web app</strong> possono essere utilizzate direttamente dal vostro browser. Alcune prevedono l'autenticazione per utilizzare funzioni avanzate, altre possono essere utilizzate senza alcuna autenticazione.</p>
                <p>Le app per <strong>mobile</strong> e <strong>desktop</strong> prevedono l'installazione su tutti i dispositivi Android o su pc.</p>
                <p>Ogni servizio ha una scheda tecnica in cui sono descritte nel dettaglio le caratteristiche principali quali: il team di sviluppo, i link al servizio e/o al codice, una breve descrizione e le licenze con le quali il software è distribuito.</p>
                <p>L'elenco dei servizi è in costante aggiornamento, seguici sui canali social.<br/>Se vuoi contribuire anche tu, effettua il login e aggiungi un nuovo servizio</p>
            </div>
        </section>
        <section class="" id="serviceList">
            <div class='rowButton toolbar'>
                <div class="wrap" style="text-align:center">
                    <span style="vertical-align:middle">Filtri di ricerca: </span>
                    <select name="sTeam"> <?php echo $team; ?> </select>
                    <select name="sCat">
                        <option selected>categoria</option>
                        <option value='web'>web</option>
                        <option value='mobile'>mobile</option>
                        <option value='desktop'>desktop</option>
                    </select>
                    <select name="sLicenza"> <?php echo $licenza; ?> </select>
                </div>
            </div>
            <?php echo $list; ?>
        </section>
        <?php require_once('inc/footer.php'); ?>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    </body>
</html>
