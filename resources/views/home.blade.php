<x-layout>
   <div class="main-content">
     <div class="hero">
        <div class="text">
            <h4>Puissant, Amusant et</h4>
            <h1>Impitoyable à <br> <span>Conduire</span></h1>
            <h4>Bienvenue chez Garage XYZ là où la passion<br>
                    rencontre la précision.<br>
                    Découvrez des véhicules puissants conçus<br>
                    pour des trajets exaltants. Faites l'expérience <br>
                    d'une véritable prestance,<br>
                    d'une puissance réelle et <br>
                    de performances exceptionnelles.</h4>
            <a href="{{ route('vehicules.index') }}" class="btn">Commencez votre aventure dès aujourd'hui avec un essai routier.</a>
        </div>
    </div>


    <script>
        let heroBg = document.querySelector('.hero');

        setInterval(() => {
            heroBg.style.backgroundImage = "url(assets/image/bg-light.jpg)"

            setTimeout(() => {
                heroBg.style.backgroundImage = "url(assets/image/bg.jpg)"
            }, 1000);
        }, 2200);
    </script>
 </div>
</x-layout>
