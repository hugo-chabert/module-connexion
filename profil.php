<?php
session_start();

if(isset($_POST['deconnexion'])){
    session_destroy();
    header('Location: index.php');
}

if(!isset($_SESSION['login'])){
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="css/profil.css" rel="stylesheet">
    <link href="css/header&footer.css" rel="stylesheet">
    <title>Profil</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="HCFibre">HCFibre</div>
            <div class="links">
                <a href="index.php" class="linkHeader">ACCUEIL</a>
                <?php if($_SESSION['login'] == 'admin'){echo '<a href="admin.php" class="linkHeader">ADMIN</a>';} ?>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="heureux">Heureux de voir revoir <?php echo $_SESSION['login']; ?></div>
            <form method="post" action="">
                <div align="center">
                    <button type="submit" name="deconnexion">Deconnexion</button>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <div class="footer">
            <div class="footer1">
                <a href="https://github.com/hugo-chabert/module-connexion"><img class="socialMedia2"  src="images/GitHub-Logo.png"></a>
            </div>
            <div class="footer2">
                Copyright © 2021 Hugo. All Rights Reserved
            </div>
            <div class="footer3">
                <a href="https://twitter.com/"><img class="socialMedia"  src="images/Twitter.png"></a>
                <a href="https://facebook.com/"><img class="socialMedia" src="images/Facebook.png"></a>
                <a href="https://instagram.com/"><img class="socialMedia" src="images/Instagram.png"></a>
                <a href="https://youtube.com/"><img class="socialMedia" src="images/Youtube.png"></a>
            </div>
        </div>
    </footer>
</body>
</html>