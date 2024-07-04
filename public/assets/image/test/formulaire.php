<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>formulaire.php</title>
        <link rel="stylesheet" type="texte/CSS" href="CSS/formu.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    </head>
    <body>
        <!--création d'une barre de navigation -->
        <header>
        <nav class="navbar">
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Nos services</a></li>
                <li><a href="#">confidentialités</a></li>
                <li><a href="#">paramètre</a></li>
            </ul>
        </nav>
        </header>
        <div class="formulaire">
            <form method="POST" action="target.php">
                <div class="name">
                <p><label for="prenom">Entrer votre prenom : </label></p>
                    <input type="text" name="prenom" id="prenom" placeholder="Veuiller entrer votre nom">
                </div>
                <div class="adresse">
                    <label for="mail">Entrer votre adresse e-mail : </label>
                    <input type="text" name="mail" id="mail" placeholder="Adesse e-mail">
                    <a href=""><i class="fa-solid fa-message"></i></a>
                </div>
                <p>
                    <input type="submit"  value="envoyer" size="15px" />
                </p>
            </form>
        </div>
        </php

        ?>
    </body>
</html>