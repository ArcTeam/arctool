<?php
/*$dbhost = 'localhost';
$dbusername = 'beppe';
$password='alfaomega';
$database_name = 'arcteam';
$connection = pg_connect("host=$dbhost user=$dbusername password=$password dbname=$database_name") or die ("Impossibile connettersi al server");*/

$athost = getenv('ATHOST');
$atuser = getenv('ATUSR');
$atpwd = getenv('ATPWD');
$atdb = getenv('ATDB');

$atoolhost = getenv('ATOOLHOST');
$atooluser = getenv('ATOOLUSR');
$atoolpwd = getenv('ATOOLPWD');
$atooldb = getenv('ATOOLDB');
$atconn = pg_connect("host=$athost user=$atuser password=$atpwd dbname=$atdb")or die ("Impossibile connettersi al server");
$atoolconn = pg_connect("host=$atoolhost user=$atooluser password=$atoolpwd dbname=$atooldb")or die ("Impossibile connettersi al server");
?>
