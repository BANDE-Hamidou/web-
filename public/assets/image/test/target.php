<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>target.php</title>
    </head>
    <body>

    
        <?php
        $prenom = $mail = '';
            function securité($données){
            $données =trim ($données);
            $données =stripslashes ($données);
            $données =strip_tags ($données);
            return $données;

            }
            $prenom = securité($_POST["prenom"]);
             $mail = securité($_POST["mail"]);

             echo 'Ton nom est :' .$prenom. ' <br/>';
             echo ' Ton adresse mail est :' .$mail. ' <br/>'
           // echo 'Bonjour comment vas tu ? ' .trim($_POST["prenom"]). ' <br/> Entrez votre adresse mail pour recevoir plus de nouvelles sur nos services, veuillez envoyer un mail a cette adresse  ' .trim($_POST["mail"]);
        ?>
    <p><a href="formulaire.php"> Cliquez ici pour retaper votre prenom</a></p> 

    </body>
</html>