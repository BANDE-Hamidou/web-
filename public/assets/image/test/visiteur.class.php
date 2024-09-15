<?php
        class visiteur{
            private $prenom;
            public $nom;

            public function set_prenom($nouveau_prenom){
                $this -> prenom = $nouveau_prenom;
            }
            public function set_nom($nouveau_nom){
                $this -> nom = $nouveau_nom;
            }
            public function get_prenom(){
               return $this -> prenom ;
        }

    }

 ?>