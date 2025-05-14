<x-layout>
    <div class="main-contenair">
        <div class="contenant">
            <h1>BIENVENU AU GARAGE XYZ</h1>
            <h1>Détails de l'intervention</h1>
        </div>

        <div class="card mt-5">
            <div class="card-header">
                <h2>Détails de la réparation</h2>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Libellé:</strong>
                    {{ $intervention->libelle }}
                </div>
                <div class="mb-3">
                    <strong>Type:</strong>
                    {{ ucfirst($intervention->type) }}
                </div>
                <div class="mb-3">
                    <strong>Date:</strong>
                    {{ $intervention->date->format('d/m/Y') }}
                </div>
                <div class="mb-3">
                    <strong>Véhicule:</strong>
                    {{ $intervention->vehicule->marque ?? 'Aucun véhicule associé' }}
                </div>
                
                <a href="{{ route('interventions.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Retour à la liste
                </a>
            </div>
        </div>
    </div>
</x-layout>