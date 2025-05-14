<x-layout>
    <div class="main-contenair">
        <div class="contenant">
            <h1>BIENVENU AU GARAGE XYZ</h1>
            <h1>Détails de la pièce</h1>
        </div>

        <div class="card mt-5">
            <div class="card-header">
                <h2>Fiche technique</h2>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Nom:</strong>
                    {{ $piece->nom ?? 'Non renseigné' }}
                </div>
                <div class="mb-3">
                    <strong>Référence:</strong>
                    {{ $piece->reference ?? 'Non renseignée' }}
                </div>
                <div class="mb-3">
                    <strong>Coût unitaire:</strong>
                    {{ $piece->cout ? number_format($piece->cout, 2).' FCFA' : 'Non renseigné' }}
                </div>
                <div class="mb-3">
                    <strong>Quantité en stock:</strong>
                    {{ $piece->quantite ?? '0' }}
                </div>
                <div class="mb-3">
                    <strong>Intervention associée:</strong>
                    {{ $piece->intervention->libelle ?? 'Aucune intervention associée' }}
                </div>
                
                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('pieces.index') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Retour à la liste
                    </a>
                    <a href="{{ route('pieces.edit', $piece->id) }}" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i> Modifier
                    </a>
                    <form action="{{ route('pieces.destroy', $piece->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette pièce?')">
                            <i class="fa-solid fa-trash"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>