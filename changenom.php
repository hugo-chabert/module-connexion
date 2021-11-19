<?php
session_start();

if(!$_SESSION['login']){
    header('Location: index.php');
}

$erreur = '';

$username = $_SESSION['login'];
if(!empty($_POST['ANom']) && !empty($_POST['NNom']) && !empty($_POST['CNNom'])){
    $Nom = $_POST['ANom'];
    $NNom = $_POST['NNom'];
    $CNNom = $_POST['CNNom'];
    if($_POST['NNom'] == $_POST['CNNom']){
        $Bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion') or die('Erreur');
        $Requete = mysqli_query($Bdd, "SELECT * FROM `utilisateurs` WHERE login = '$username' AND nom = '$Nom'");
        $Rows = mysqli_num_rows($Requete);
        if($Rows == 1){
            $Requete2 = mysqli_query($Bdd, "UPDATE `utilisateurs` SET nom = '$NNom' WHERE login = '$username'");
            die("Votre nom à bien été changé ! <a href='profil.php'>Retournez à votre profil</a>");
        }
        else{
            $erreur = "<div class='erreur'>Votre ancien nom n'est pas bon</div>";
        }
    }
    else{
        $erreur = "<div class='erreur'>Vos nouveau noms ne sont pas identiques</div>";
    }
}
else if(isset($_POST['ANom']) || isset($_POST['NNom']) || isset($_POST['CNNom'])){
    $erreur = "<div class='erreur'>Veuillez entrer tout les champs</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="css/change.css" rel="stylesheet">
    <title>Changement de nom</title>
</head>
<body>
    <main>
        <form method="post" action="">
            <h1>Changement de nom</h1>
            <div class="inputs">
                <input type="text" name="ANom" placeholder="Ancien nom">
                <input type="text" name="NNom" placeholder="Nouveau nom">
                <input type="text" name="CNNom" placeholder=" Confirmez le nouveau nom">
            </div>
            <div align="center">
                <button type="submit" name="change">Changer</button>
            </div>
            <?php echo $erreur;?>
        </form>
    </main>
</body>
</html>