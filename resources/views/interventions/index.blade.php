<x-layout>
    <div class="main-contenair">
        <div class="contenant">
            <h1>BIENVENU AU GARAGE XYZ</h1>
            <h1>Liste des interventions</h1>
        </div>
        <div class="card mt-5">
            <h2 class="card-header">Liste des réparations effectuées</h2>
            <div class="card-body">

                @session('success')
                    <div class="alert alert-success" role="alert"> {{ $value }} </div>
                @endsession

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-success btn-sm" href="{{ route('interventions.create') }}"> 
                        <i class="fa fa-plus"></i> Ajouter une réparation
                    </a>
                </div>

                <table class="table table-bordered table-striped mt-4">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Libellé</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Véhicule</th>
                            <th width="400px">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($interventions as $intervention)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $intervention->libelle }}</td>
                            <td>{{ ucfirst($intervention->type) }}</td>
                            <td>{{ $intervention->date->format('d/m/Y') }}</td>
                            <td>{{ $intervention->vehicule->marque ?? 'Aucun véhicule' }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('interventions.show', $intervention->id) }}">
                                    <i class="fa-solid fa-list"></i> Voir
                                </a>
                                <a class="btn btn-primary btn-sm" href="{{ route('interventions.edit', $intervention->id) }}">
                                    <i class="fa-solid fa-pen-to-square"></i> Modifier
                                </a>
                                <form action="{{ route('interventions.destroy',$intervention->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>