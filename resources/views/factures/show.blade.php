<x-layout>
    <div class="main-contenair">
        <div class="contenant">
            <h1>BIENVENU AU GARAGE XYZ</h1>
            <h1>Détails de la Facture</h1>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="mb-3">
                    <strong>Numéro de facture:</strong> 
                    {{ $facture->numero_facture ?? 'Non généré' }}
                </div>
                <div class="mb-3">
                    <strong>Marque du vehicule:</strong> 
                    {{ $facture->marque }}
                </div>
                <div class="mb-3">
                    <strong>Couleur:</strong> 
                    {{ $facture->couleur }}
                </div>
                <div class="mb-3">
                    <strong>Année de fabrication:</strong> 
                    {{ $facture->annee->format('d/m/Y') }}
                </div>
                <div class="mb-3">
                    <strong>Libellé:</strong> 
                    {{ $facture->libelle ?? 'Non spécifié' }}
                </div>
                <div class="mb-3">
                    <strong>Prix:</strong> 
                    {{ $facture->prix ? number_format($facture->prix, 2, ',', ' ').' FCFA' : '0,00 FCFA' }}
                </div>
                
                <!-- Bouton pour télécharger le PDF -->
                <div class="mt-4">
                    <a href="{{ route('factures.pdf', $facture->id) }}" class="btn btn-primary">
                        <i class="fas fa-download"></i> Télécharger la Facture en PDF
                    </a>
                    <a href="{{ route('factures.index') }}" class="btn btn-secondary ml-2">
                        <i class="fas fa-arrow-left"></i> Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>