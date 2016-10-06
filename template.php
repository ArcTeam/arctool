<?php
session_start();
require_once("inc/db.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('inc/meta.inc'); ?>
        <title>ArcTool</title>
    </head>
    <body>
        <?php require("inc/header.php"); ?>
        <div class="wrap" id="mainContent">

        </div>
        <?php require_once('inc/footer.php'); ?>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    </body>
</html>
