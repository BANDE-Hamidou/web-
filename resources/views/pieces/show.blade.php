<x-layout>
    <div class="main-container">
        <div class="header">
            <h1>BIENVENUE AU GARAGE XYZ</h1>
            <h2>Détails de la pièce</h2>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Fiche technique</h3>
                    <div class="action-buttons">
                        <a href="{{ route('pieces.edit', $piece->id) }}" class="btn btn-light btn-sm">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="detail-item">
                            <h5>Informations de base</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="fw-bold">ID :</span>
                                    <span>{{ $piece->id }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="fw-bold">Nom :</span>
                                    <span>{{ $piece->nom }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="fw-bold">Coût unitaire :</span>
                                    <span>{{ number_format($piece->cout, 2) }} €</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="fw-bold">Quantité en stock :</span>
                                    <span>{{ $piece->quantite }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="detail-item">
                            <h5>Informations complémentaires</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="fw-bold">Date création :</span>
                                    <span>{{ $piece->created_at->format('d/m/Y H:i') }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="fw-bold">Dernière modification :</span>
                                    <span>{{ $piece->updated_at->format('d/m/Y H:i') }}</span>
                                </li>
                                @if($piece->intervention)
                                <li class="list-group-item">
                                    <span class="fw-bold">Intervention associée :</span>
                                    <div class="mt-2">
                                        {{ $piece->intervention->nom }} ({{ $piece->intervention->date_intervention }})
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                @if($piece->typePieces->isNotEmpty())
                <div class="mt-4">
                    <h5>Types associés</h5>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($piece->typePieces as $type)
                            <span class="badge bg-secondary">{{ $type->nom }}</span>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <div class="card-footer bg-light">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('pieces.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Retour à la liste
                    </a>
                    
                    <form action="{{ route('pieces.destroy', $piece->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('Confirmer la suppression de cette pièce ?')">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .detail-item {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .detail-item h5 {
            color: #0d6efd;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 1px solid #eee;
        }
        .list-group-item {
            padding: 12px 15px;
        }
    </style>
</x-layout>