<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>les tableaux en php</title>
    </head>
    <body>
        <?php
            $prenoms= array('Hamidou', 'james', 'karim');

            /* $prenoms[0] = 'Hamidou';
            $prenoms[1] = 'james';
            $prenoms[2] = 'karim'; 

            $age = array(
                'Hamidou' => 23,
                'james'   => 24,
                'karim'   => 'inconnu'
            );

            echo $prenoms[0]. ' ' .$age['Hamidou']. ' ans <br/>';
            */
            for($x = 0; $x<=2; $x++){
                echo $prenoms[$x]. '<br/>';
            }
            $age = array(
                'Hamidou' => 23,
                'james'   => 24,
                'karim'   => 'inconnu'
            );
            foreach($age as $valeur){
                echo $valeur. ' <br/>';
            }


        ?>
    </body>
</html>