<?php
session_start();
require_once("inc/db.php");
//lista licenze
$l = "select * from liste.licenze order by licenza asc;";
$lq = pg_query($atoolconn,$l);
$licenze = "<option selected disabled>scegli licenza</option>";
while($licenza = pg_fetch_array($lq)){$licenze .= "<option value='".$licenza['id']."'>".$licenza['sigla']."</option>";}

?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('inc/meta.inc'); ?>
        <title>ArcTool</title>
        <style>
            .label{display:inline-block;min-width:150px;width:20%;}
            .data{display:inline-block;width:79%;}
            .data textarea, .data input:not([type="checkbox"]){width:99%;}
            .data textarea[name="descrizione"]{height:200px;}
        </style>
    </head>
    <body>
        <?php require("inc/header.php"); ?>
        <section class="wrap">
            <header class="main">Aggiungi un nuovo servizio, tutti i campi sono obbligatori!</header>
            <form name="loginForm" action="addServiceScript.php" method="post" enctype="multipart/form-data">
                <div class="rowButton">
                    <span class="label">Nome servizio:</span>
                    <span class="data"><textarea name="nome" required></textarea></span>
                </div>
                <div class="rowButton">
                    <span class="label"><i class="fa fa-info pointer" aria-hidden="true" title="Se disponibile inserire il link di riferimento alla pagina del team di sviluppo o dello sviluppatore, in alternativa inserire il nome"></i> Team di sviluppo:</span>
                    <span class="data"><textarea name="team" required></textarea></span>
                </div>
                <div class="rowButton">
                    <span class="label"><i class="fa fa-info pointer" aria-hidden="true" title="E' possibile scegliere più di una categoria nel caso in cui l'applicazione sia disponibie per più device"></i> Categoria:</span>
                    <span class="data">
                        <label for="web" class="pointer"><input type="checkbox" name="categoria[]" value="web" id="web" required> web</label>
                        <label for="mobile" class="pointer"><input type="checkbox" name="categoria[]" value="mobile" id="mobile" required> mobile</label>
                        <label for="desktop" class="pointer"><input type="checkbox" name="categoria[]" value="desktop" id="desktop" required> desktop</label>
                    </span>
                </div>
                <div class="rowButton">
                    <span class="label"><i class="fa fa-info pointer" aria-hidden="true" title="Inserire il link alla pagina di riferimento dell'applicazione"></i> Link applicazione:</span>
                    <span class="data"><input type="url" name="link" required></span>
                </div>
                <div class="rowButton">
                    <span class="label"><i class="fa fa-info pointer" aria-hidden="true" title="Se disponibile, inserire il link da dove è possibile scaricare il codice sorgente. Se non si possiede tale dato lasciare il valore 'assente'"></i> Link codice:</span>
                    <span class="data"><textarea name="code" required>Assente</textarea></span>
                </div>
                <div class="rowButton">
                    <span class="label">Licenza:</span>
                    <span class="data">
                        <select name="licenza" required>
                            <?php echo $licenze; ?>
                        </select>
                    </span>
                </div>
                <div class="rowButton">
                    <span class="label">Descrizione:</span>
                    <span class="data"><textarea name="descrizione" required></textarea></span>
                </div>
                <div class="rowButton">
                    <span class="label">Aggiungi screenshot:</span>
                    <span class="data"><input type="file" name="img" id="img" required></span>
                </div>
                <div class="rowButton">
                    <button type="submit" name="newService" value="newService" class="azzurro transition"><i class="fa fa-plus fa-fwi"></i> Aggiungi servizio</button>
                </div>
            </form>
        </section>
        <?php require_once('inc/footer.php'); ?>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="js/function.js"></script>
    </body>
</html>
