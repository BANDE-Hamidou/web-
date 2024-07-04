<x-layout>
    <div class="main-contenair">
        {{-- <img src="{{'assets/image/fond.jpg'}}" alt=""> --}}
         <div class="contenant">
             <h1>BIENVENU AU GARAGE XYZ </h1>
             <h1>Home</h1>
         </div>

             <h1>Détails de la Facture</h1>
             <p>Marque: {{ $facture->marque }}</p>
             <p>Couleur: {{ $facture->couleur }}</p>
             <p>Annee: {{ $facture->annee }}</p>
             <p>Adresse: {{ $facture->adresse }}</p>
             <p>Libellé: {{ $facture->libelle }}</p>
             <p>prix: {{ $facture->prix }}</p>

             <!-- Bouton pour télécharger le PDF -->
             <a href="{{ route('factures.pdf', $facture->id) }}" class="btn btn-primary">Télécharger la Facture en PDF</a>

        </div>
</x-layout>
