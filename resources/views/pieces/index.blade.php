<x-layout>
    <div class="main-contenair">
        <div class="contenant">
            <h1>BIENVENU AU GARAGE XYZ</h1>
            <h1>Gestion des pièces</h1>
        </div>
        <div class="card mt-5">
            <h2 class="card-header">Liste des pièces</h2>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                    <a class="btn btn-success btn-sm" href="{{ route('pieces.create') }}">
                        <i class="fa fa-plus"></i> Ajouter une pièce
                    </a>
                </div>
                @if($pieces->isEmpty())
                    <div class="alert alert-info">
                        Aucune pièce enregistrée. Veuillez en ajouter.
                    </div>
                @else
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nom</th>
                                <th>Coût</th>
                                <th>Quantité</th>
                                <th width="400px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pieces as $piece)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $piece->nom }}</td>
                                    <td>{{ number_format($piece->cout, 2) }} €</td>
                                    <td>{{ $piece->quantite }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a class="btn btn-info btn-sm" href="{{ route('pieces.show', $piece->id) }}">
                                                <i class="fa-solid fa-eye"></i> Voir
                                            </a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('pieces.edit', $piece->id) }}">
                                                <i class="fa-solid fa-pen-to-square"></i> Modifier
                                            </a>
                                            <form action="{{ route('pieces.destroy', $piece->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">
                                                    <i class="fa-solid fa-trash"></i> Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-layout>