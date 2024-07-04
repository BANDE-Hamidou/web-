<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>include & require</title>
        <link rel="stylesheet" type="texte/CSS" href="CSS/formu.css">
    </head>
    <body>
        <?php
           $fiche = fopen("introduction.php" , "r+") ;
           
           fclose($fiche);
        ?>
    </body>
</html>
