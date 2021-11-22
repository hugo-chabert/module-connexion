<?php
session_start();

if(!$_SESSION['login']){
    header('Location: index.php');
}

$erreur = '';

$username = $_SESSION['login'];
if(!empty($_POST['APrenom']) && !empty($_POST['NPrenom']) && !empty($_POST['CNPrenom'])){
    $Prenom = $_POST['APrenom'];
    $NPrenom = $_POST['NPrenom'];
    $CNPrenom = $_POST['CNPrenom'];
    if($_POST['NPrenom'] == $_POST['CNPrenom']){
        $Bdd = mysqli_connect('localhost', 'hugo-chabert', 'Chabert13', 'hugo-chabert_moduleconnexion') or die('Erreur');
        $Requete = mysqli_query($Bdd, "SELECT * FROM `utilisateurs` WHERE login = '$username' AND prenom = '$Prenom'");
        $Rows = mysqli_num_rows($Requete);
        if($Rows == 1){
            $Requete2 = mysqli_query($Bdd, "UPDATE `utilisateurs` SET prenom = '$NPrenom' WHERE login = '$username'");
            die("Votre prénom à bien été changé ! <a href='profil.php'>Retournez à votre profil</a>");
        }
        else{
            $erreur = "<div class='erreur'>Votre ancien prénom n'est pas bon</div>";
        }
    }
    else{
        $erreur = "<div class='erreur'>Vos nouveau prénoms ne sont pas identiques</div>";
    }
}
else if(isset($_POST['APrenom']) || isset($_POST['NPrenom']) || isset($_POST['CNPrenom'])){
    $erreur = "<div class='erreur'>Veuillez entrer tout les champs</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="css/change.css" rel="stylesheet">
    <title>Changement de Prenom</title>
</head>
<body>
    <main>
        <form method="post" action="">
            <h1>Changement de prénom</h1>
            <div class="inputs">
                <input type="text" name="APrenom" placeholder="Ancien prenom">
                <input type="text" name="NPrenom" placeholder="Nouveau prenom">
                <input type="text" name="CNPrenom" placeholder=" Confirmez le nouveau prenom">
            </div>
            <div align="center">
                <button type="submit" name="change">Changer</button>
            </div>
            <?php echo $erreur;?>
        </form>
    </main>
</body>
</html>