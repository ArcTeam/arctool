<header id="main">
    <div class="wrap">
        <h1>
            <div id="logoMainHeader"></div>
            <span class="red">A</span>rc-<span class="red">T</span>ool <?php echo $_SESSION['utente']; ?>
        </h1>
        <nav id="mainNav">
            <a href="index.php" class="prevent loginButt" title="home page"><i class="fa fa-home"></i></a>
            <?php if(isset($_SESSION['id'])){ ?>
            <a href="addService.php" class="prevent loginButt" title="aggiungi un servizio"><i class="fa fa-plus"></i></a>
            <a href="loginCheck.php?action=logout" class="prevent loginButt" title="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
            <?php }else{ ?>
            <a href="login.php" class="prevent loginButt signin" title="login"><i class="fa fa-user"></i></a>
            <?php } ?>
        </nav>
    </div>
</header>
