<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="css/inscription.css" rel="stylesheet">
    <title>Inscription</title>
</head>
<body>
    <header>
        <div class="header">
            <div class="HCFibre">HCFibre</div>
            <div class="links">
                <a href="index.php" class="linkHeader">ACCUEIL</a>
                <a href="inscription.php" class="linkHeader">INSCRIPTION</a>
                <a href="connexion.php" class="linkHeader">CONNEXION</a>
                <a href="admin.php" class="linkHeader">ADMIN</a>
            </div>
        </div>        
    </header>

    <main>
        <div class="container">
            <form method="post" action="./index.php">        
                <h1>Connexion</h1>                
                <div class="inputs">
                    <input type="text" name="login" placeholder="Login" />
                    <input type="password" name="password" placeholder="Mot de passe">
                </div>
                <div align="center">
                    <button type="submit">Connexion</button>
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