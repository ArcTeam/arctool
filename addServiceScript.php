<?php
session_start();
require_once("inc/db.php");
foreach ($_POST['categoria'] as $key => $value) { $cat .= $value." "; }
$cat = trim($cat);
$query = "BEGIN;";
$query .= "insert into main.app(nome, team, categoria, link, code, licenza, descrizione, img) values('".pg_escape_string($_POST['nome'])."', '".pg_escape_string($_POST['team'])."', '".$cat."', '".pg_escape_string($_POST['link'])."', '".pg_escape_string($_POST['code'])."', ".$_POST['licenza'].", '".pg_escape_string($_POST['descrizione'])."', '".pg_escape_string($_POST['img'])."');";
$query .= "insert into main.log(tabella, record, operazione, utente) values('app', currval('main.app_id_seq'), 'I', ".$_SESSION['id'].");";
$query .= "commit;";
$exec = pg_query($atoolconn, $query);
if (!$exec) {
    $class = 'error';
    $result = "Salvataggio fallito!<br/>L'errore è: ".pg_last_error($atoolconn);
}else {
    $class = 'success';
    $result = "Salvataggio avvento correttamente!<br/>Tra 5 secondi verrai reindirizzato nella home page.";
}

$uploaddir = 'img/screenshot/';
$file = $uploaddir . basename($_FILES['img']['name']);
if (!isset($_FILES['img']) || !is_uploaded_file($_FILES['img']['tmp_name'])) {
    $class2 = 'alert';
    $result2 = "L'immagine non è stata modificata.<br/>";
}else if(move_uploaded_file($_FILES['img']['tmp_name'], $file)) {
    chmod($file, 0777);
    $class2 = 'success';
    $result2 = "L'immagine è stata caricata con successo.<br/>";
} else {
    $class2 = 'error';
	$result2 = "errore upload foto: ".$_FILES["img"]["error"]."<br/>";
}
header ("Refresh: 5; URL=index.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('inc/meta.inc'); ?>
        <title>ArcTool</title>
        <style>
            #result{min-height: 85%;margin:50px 0px}
            #result div{ margin-bottom: 20px; padding: 20px; text-align: center; border-radius: 3px;}
        </style>
    </head>
    <body>
        <?php require("inc/header.php"); ?>
        <section class="" id="result">
            <div class='wrap rowButton <?php echo $class; ?>'><?php echo $result; ?></div>
            <div class='wrap rowButton <?php echo $class2; ?>'><?php echo $result2; ?></div>
        </section>
        <?php require_once('inc/footer.php'); ?>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    </body>
</html>
