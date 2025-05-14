<x-layout>
    <div class="main-contenair">
        <div class="contenant">
            <h1>BIENVENU AU GARAGE XYZ</h1>
            <h1>Détails de l'intervention</h1>
        </div>

        <div class="card mt-5">
            <div class="card-header">
                <h2>Détails de l'employé</h2>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Nom de l'employé:</strong>
                    {{ $personnel->nom }}
                </div>
                <div class="mb-3">
                    <strong>Prénom de l'employé:</strong>
                    {{ $personnel->prenom }}
                </div>
                <div class="mb-3">
                    <strong>L'adresse de l'employé:</strong>
                    {{ $personnel->adresse }}
                </div>
                <div class="mb-3">
                    <strong>Service:</strong>
                    {{ $personnel->service ? $personnel->service->nom : 'Non attribué' }}
                </div>
                
                <a href="{{ route('interventions.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Retour à la liste
                </a>
            </div>
        </div>
    </div>
</x-layout>