<?php
session_start();
require_once('class/fbLogin.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('inc/meta.inc'); ?>
        <title>ArcTool</title>
    </head>
    <body>
        <header id="main">
            <div class="wrap"><h1><i class="fa fa-pie-chart"></i> Arc-Tool</h1></div>
        </header>
        <div class="wrap" id="mainContent">

        </div>
        <?php require_once('inc/footer.php'); ?>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    </body>
</html>
