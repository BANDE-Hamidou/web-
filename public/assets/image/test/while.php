<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>les boucles avec php</title>
    </head>
    <body>
        <?php
          /*  $a=1;
            do{
                echo ''.$a.' est un nombre impaire <br/>';
                $a+=2;
            }while($a<=30)*/

            for($i=0; $i<=15; $i+=2){
                echo'' .$i.' est un nombre paire <br/>';
            }
            for($i=15; $i>0; $i-=2){
                echo'' .$i.' est un nombre impaire <br/>';
            }


        ?>
    </body>
</html>