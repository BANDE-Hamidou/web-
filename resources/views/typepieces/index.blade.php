<x-layout>
    <div class="main-contenair">
        {{-- <img src="{{'assets/image/fond.jpg'}}" alt=""> --}}
         <div class="contenant">
             <h1>BIENVENU AU GARAGE XYZ </h1>
             <h1>Home</h1>
         </div>
    <div class="custom-container">
        <div class="voitures">
            <div class="vehic">
                <a class="btn btn-success btn-sm" href="{{ route('typepieces.create') }}"> <i class="fa fa-plus"></i> Ajouter un service</a>
            </div>

            <table class="custom-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nom</th>
                        <th>Quantité</th>
                        <th width="400px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($typepieces as $typepiece)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $typepiece->nom }}</td>
                        <td>{{ $typepiece->quantite }}</td>
                        <td>
                            <form action="{{ route('typepieces.destroy', $typepiece->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('typepieces.show', $typepiece->id) }}"><i class="fa-solid fa-list"></i> Voir</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('typepieces.edit', $typepiece->id) }}"><i class="fa-solid fa-pen-to-square"></i> Modifier</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Supprimer</button>
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
