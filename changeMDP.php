<?php
session_start();

if(!$_SESSION['login']){
    header('Location: index.php');
}

$erreur = '';

$username = $_SESSION['login'];
if(!empty($_POST['AMDP']) && !empty($_POST['NMDP']) && !empty($_POST['CNMDP'])){
    $MDP = $_POST['AMDP'];
    $NMDP = $_POST['NMDP'];
    $CNMDP = $_POST['CNMDP'];
    if($_POST['NMDP'] == $_POST['CNMDP']){
        $Bdd = mysqli_connect('localhost', 'hugo-chabertMC', 'Chabert13', 'hugo-chabert_moduleconnexion') or die('Erreur');
        $Requete = mysqli_query($Bdd, "SELECT * FROM `utilisateurs` WHERE login = '$username' AND password = '$MDP'");
        $Rows = mysqli_num_rows($Requete);
        if($Rows == 1){
            $Requete2 = mysqli_query($Bdd, "UPDATE `utilisateurs` SET password = '$NMDP' WHERE login = '$username'");
            die("Votre mot de passe à bien été changé ! <a href='profil.php'>Retournez à votre profil</a>");
        }
        else{
            $erreur = "<div class='erreur'>Votre ancien mot de passe n'est pas bon</div>";
        }
    }
    else{
        $erreur = "<div class='erreur'>Vos nouveau mots de passe ne sont pas identiques</div>";
    }
}
else if(isset($_POST['AMDP']) || isset($_POST['NMDP']) || isset($_POST['CNMDP'])){
    $erreur = "<div class='erreur'>Veuillez entrer tout les champs</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="css/change.css" rel="stylesheet">
    <title>Changement de mot de passe</title>
</head>
<body>
    <main>
        <form method="post" action="">
            <h1>Changement de mot de passe</h1>
            <div class="inputs">
                <input type="text" name="AMDP" placeholder="Ancien mot de passe">
                <input type="text" name="NMDP" placeholder="Nouveau mot de passe">
                <input type="text" name="CNMDP" placeholder=" Confirmez le nouveau mot de passe">
            </div>
            <div align="center">
                <button type="submit" name="change">Changer</button>
            </div>
            <?php echo $erreur;?>
        </form>
    </main>
</body>
</html>