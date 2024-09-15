<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>les fonctions</title>
    </head>
    <body>
        <?php
        
        function premier(){
            $i=0; $y=0; $z=0;
            for($i=0 ; $i<=10; $i++){
                
                if($i%2==0){
                    $y+=1;
                    echo $i.' est un nombre premier .<br/>';
                    
                }
                else {
                    $z++;
                    echo $i.' n est pas un nombre premier .<br/>';
                    
                }
            }
            echo'Il existe ' .$y.' nombres premier et ' .$z. ' nombres non premier .<br/>';
        }
       /* $parite = premier();*/
        echo ' parite des nombres compris entre 0 et 30  ' .premier(). ' .<br/>';

        
        ?>
    </body>
</html>