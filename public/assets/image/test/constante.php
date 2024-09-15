<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Les constantes</title>
    </head>
    <body>
        <?php
        $a='En quoinpouvons nous vous aidez ?';
        define('CONFIANCE', '5');
        define('BIENVENU', 'Bienvenus sur le site de BANDE Hamidou <br/>');
        echo BIENVENU;
        define('PERSONNALITE', 'Je m\' appel BANDE Hamidou, je suis étudiant en deuxième année de l\' informatiaue , futur expert en genie logiciel et en securite informatiaque <br/>');
        echo PERSONNALITE;
        function good(){
            // $a='En quoinpouvons nous vous aidez ?';
           // echo $a;
            echo CONFIANCE;

            $c = 86;
            echo $c;
            echo '<br/>' .__FUNCTION__. '<br/>'; 
            echo __LINE__. '<br/>';


        }
          good();
          echo __FILE__. '<br/>';
          echo __DIR__. '<br/>';
          echo __LINE__. '<br/>';

        ?>
    </body>
</html>