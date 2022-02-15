<?php
session_start();
$Bdd = mysqli_connect('localhost', 'hugo-chabertMC', 'chabertMC', 'hugo-chabert_moduleconnexion');
mysqli_set_charset($Bdd, 'utf8');
$Requete = mysqli_query($Bdd, "SELECT * FROM `utilisateurs`");
$Users = mysqli_fetch_all($Requete, MYSQLI_ASSOC);
if($_SESSION['login'] != 'admin'){
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="css/profil.css" rel="stylesheet">
    <link href="css/header&footer.css" rel="stylesheet">
    <title>Admin</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="HCFibre">HCFibre</div>
            <div class="links">
                <a href="index.php" class="linkHeader">ACCUEIL</a>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="text1">Voici les données des utilisateurs inscris au site :</div>
            <table class="tableau">
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Password</th>
                </tr>
                <tr><?php
                    foreach($Users as $User){
                    echo '<tr><td>'.$User['id'].'</td>';
                    echo '<td>'.$User['login'].'</td>';
                    echo '<td>'.$User['prenom'].'</td>';
                    echo '<td>'.$User['nom'].'</td>';
                    echo '<td>'.$User['password'].'</td>';
                    }?>
                </tr>
            </table>
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