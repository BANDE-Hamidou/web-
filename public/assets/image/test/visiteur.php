<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Code en POO</title>
    </head>
    <body>
        <?php
            include('visiteur.class.php');

            $visiteur1 = new visiteur;

            $visiteur1 -> set_prenom('HAMIDOU');
            $visiteur1 -> set_nom(' BANDE');


            echo 'ton nom est  ' . $visiteur1-> nom . '<br/>'; 
            echo 'ton prenom est ' . $visiteur1-> prenom;

        ?>
    </body>
</html>