<?php
session_start();
$Bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
mysqli_set_charset($Bdd, 'utf8');
$erreur = '';

if(isset($_SESSION['login'])){
    header('Location: index.php');
}




if(!empty($_POST['login']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['password']) && !empty($_POST['Cpassword'])){
    $Login  = $_POST['login'];
    $Prenom = $_POST['prenom'];
    $Nom = $_POST['nom'];
    $MDP = $_POST['password'];
    $CMDP = $_POST['Cpassword'];
    $Requete = mysqli_query($Bdd, "SELECT * FROM `utilisateurs` WHERE login = '".$Login."'");
    $Rows = mysqli_num_rows($Requete);
    if($Rows == 1){
        $erreur = '<div class="erreur">Ce login est deja existant.</div>';
    }
    else if($_POST['password'] == $_POST['Cpassword']){
        $Requete2 = mysqli_query($Bdd, "INSERT INTO utilisateurs(login, prenom, nom, password) VALUES ('$Login','$Prenom','$Nom','$MDP')");
        header('Location: connexion.php');
    }
    else
        $erreur = '<div class="erreur">Les mots de passe sont différents.</div>';
}
else if(isset($_POST['login']) || isset($_POST['prenom']) || isset($_POST['nom']) || isset($_POST['password']) || isset($_POST['Cpassword'])){
    $erreur = '<div class="erreur">Veuillez entrer tout les champs.</div>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="css/inscription.css" rel="stylesheet">
    <link href="css/header&footer.css" rel="stylesheet">
    <title>Inscription</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="HCFibre">HCFibre</div>
            <div class="links">
                <a href="index.php" class="linkHeader">ACCUEIL</a>
                <a href="connexion.php" class="linkHeader">CONNEXION</a>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <form method="post" action="">
                <h1>Inscription</h1>
                <div class="inputs">
                    <input type="text" name="login" placeholder="Login">
                    <input type="text" name="prenom" placeholder="Prenom">
                    <input type="text" name="nom" placeholder="Nom">
                    <input type="password" name="password" placeholder="Mot de passe">
                    <input type="password" name="Cpassword" placeholder="Confirmez le mot de passe">
                </div>
                <?php
                    echo $erreur;
                ?>
                <div align="center">
                    <button type="submit">Inscription</button>
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