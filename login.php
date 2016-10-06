<?php
session_start();
require("inc/db.php");
if($_POST['submit'] && $_POST['submit']=="login"){
  $a = "select u.id, r.id as rubrica, r.utente, r.tipo, r.email, u.pwd, u.salt, u.img from main.usr u, main.rubrica r where u.rubrica = r.id and u.attivo = 1 and r.email = '".$_POST['email']."'";
  $b = pg_query ($atconn,$a);
  $row = pg_num_rows($b);
  $arr= pg_fetch_array($b);
  if($row > 0){
    $pass = $_POST['password'];
    $salt = $arr['salt'];
    $pwd =hash('sha512',$pass . $salt);
    if($pwd === $arr['pwd']){
        $nome = explode(" ", $arr['utente']);
      $_SESSION['id']=$arr['id'];
      $_SESSION['usr']=$arr['utente'];
      $_SESSION['class']=$arr['tipo'];
      $_SESSION['rubrica']=$arr['rubrica'];
      $_SESSION['email']=$arr['email'];
      $_SESSION['salt']=$arr['salt'];
      $_SESSION['img']="img/usr/".$arr['img'];
      if ( isset($_SERVER['HTTP_CLIENT_IP']) && ! empty($_SERVER['HTTP_CLIENT_IP'])) {
       $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) && ! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
       $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
       $ip = (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
      }

      $ip = filter_var($ip, FILTER_VALIDATE_IP);
      $ip = ($ip === false) ? '0.0.0.0' : $ip;
      $login = ("insert into main.login(utente, ip, sito)values(".$arr['id'].", '$ip', 'arctool');");
      $result2=pg_query($atconn, $login);
      header("Location:index.php");
      //if(!$result2){die("errore: ".pg_last_error($atconn));}else{$msgLogin = "ok, sei entrato come: ".$_SESSION['utente'];}
    }else{
      $msgLogin = "Attenzione, la password non è corretta!";
      $class='error';
    }
  }else{
    $msgLogin = "Attenzione, login fallito!<br>Riprova facendo attenzione a digitare correttamente l'email o la password.<br>Se il problema persiste il tuo account potrebbe essere non attivo, contatta il responsabile web all'indirizzo:<br>beppenapo@arc-team.com.";
    $class='error';
  }
}
if($_GET['action']){
  session_destroy();
  header("Location:index.php");
}
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
            <section class="content form">
                <header class="main">Bentornato utente!</header>
                <form name="loginForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="rowButton">
                        <i class="fa fa-envelope fa-fw iForm"></i>
                        <input type="email" name="email" class="bForm" placeholder="inserisci la tua email" required >
                    </div>
                    <div class="rowButton">
                        <i class="fa fa-key fa-fw iForm"></i>
                        <input type="password" name="password" class="bForm" placeholder="inserisci la tua password" required >
                    </div>
                    <div class="rowButton">
                        <button type="submit" name="submit" value="login" class="azzurro transition"><i class="fa fa-unlock-alt fa-fwi"></i> Login</button>
                        <button type="button" name="lostPwd" value="lostPwd" class="giallo transition"><i class="fa fa-exclamation-triangle fa-fwi" aria-hidden="true"></i> password dimenticata?</button>
                    </div>
                    <div id="msgLogin" class='<?php echo $class; ?>'><?php echo $msgLogin; ?></div>
                </form>
                <header class="main">Login tramite account</header>
                <div class="rowButton">
                    <ul id="socialList">
                        <li><a href="" class="socialLog prevent radius" id="facebookLogin" title="Login via Facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
                        <li><a href="" class="socialLog prevent radius" id="twitterLogin" title="Login via Twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
                        <li><a href="" class="socialLog prevent radius" id="googleLogin" title="Login via Google"><i class="fa fa-google-plus" aria-hidden="true"></i> Google</a></li>
                        <li><a href="" class="socialLog prevent radius" id="githubLogin" title="Login via GitHub"><i class="fa fa-github" aria-hidden="true"></i>  GitHub</a></li>
                        <li><a href="" class="socialLog prevent radius" id="linkedinLogin" title="Login via LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i> LinkedIn</a></li>
                    </ul>
                </div>
                <header class="main">Crea account su Arc-Tool</header>
                <div class="rowButton">
                    <p>Se preferisci puoi creare un account sul nostro sito. Non ti verranno richiesti dati sensibili e la mail verrà utilizzata esclusivamente per l'invio della password o per importanti comunicazioni nel rispetto delle leggi sulla privacy.</p>
                    <form name="newForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="rowButton">
                            <i class="fa fa-envelope fa-fw iForm"></i>
                            <input type="newEmail" name="newEmail" class="bForm" placeholder="inserisci la tua email" required >
                        </div>
                        <div class="rowButton">
                            <button type="submit" name="newsubmit" value="newAccount" class="azzurro transition"><i class="fa fa-unlock-alt fa-fwi"></i> Crea account</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <?php require_once('inc/footer.php'); ?>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    </body>
</html>
