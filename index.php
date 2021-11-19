<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/header&footer.css" rel="stylesheet">
    <title>Accueil</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="HCFibre">HCFibre</div>
            <div class="links">
                <a href="index.php" class="linkHeader">ACCUEIL</a>
                <?php if(!isset($_SESSION['login'])){echo '<a href="inscription.php" class="linkHeader">INSCRIPTION</a>';} ?>
                <?php if(!isset($_SESSION['login'])){echo '<a href="connexion.php" class="linkHeader">CONNEXION</a>';} ?>
                <?php if(isset($_SESSION['login'])){echo '<a href="profil.php" class="linkHeader">PROFIL</a>';} ?>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="title">Bienvenue <?php if(isset($_SESSION['login'])){echo $_SESSION['login'];}?> sur le site de HCFibre</div>
            <p>Le fournisseur d'accès internet le plus rapide de France !!</p>
            <p>
                Obtenez votre fibre à 1Gb/s pour SEULEMENT 25€/mois.
            </p>
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