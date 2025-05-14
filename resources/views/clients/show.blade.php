<x-layout>
    <div class="main-contenair">
        <div class="contenant">
            <h1>BIENVENU AU GARAGE XYZ</h1>
            <h1>Détails du client</h1>
        </div>

        <div class="card mt-5">
            <div class="card-header">
                <h2>Informations du client</h2>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Nom:</strong>
                    {{ $client->nom ?? 'Non renseigné' }}
                </div>
                <div class="mb-3">
                    <strong>Prénom:</strong>
                    {{ $client->prenom ?? 'Non renseigné' }}
                </div>
                <div class="mb-3">
                    <strong>Âge:</strong>
                    {{ $client->age ?? 'Non renseigné' }}
                </div>
                <div class="mb-3">
                    <strong>Adresse:</strong>
                    {{ $client->adresse ?? 'Non renseignée' }}
                </div>
                
                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Retour à la liste
                    </a>
                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i> Modifier
                    </a>
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client?')">
                            <i class="fa-solid fa-trash"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>