<x-layout>
    <div class="main-contenair">
        {{-- <img src="{{'assets/image/fond.jpg'}}" alt=""> --}}
         <div class="contenant">
             <h1>BIENVENU AU GARAGE XYZ </h1>
             <h1>Home</h1>
        </div>
    <div class="card mt-5">
        <h2 class="card-header">Liste des Factures</h2>
        <div class="card-body">

              @session('success')
                  <div class="alert alert-success" role="alert"> {{ $value }} </div>
              @endsession

              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <a class="btn btn-success btn-sm" href="{{ route('factures.create') }}"> <i class="fa fa-plus"></i> Ajouter une facture</a>
              </div>

              <table class="table table-bordered table-striped mt-4">
                  <thead>
                      <tr>
                        <th width="80px">No</th>
                        <th>Marque</th>
                        <th>couleur</th>
                        <th>Annee</th>
                        <th>prix</th>
                        <th>Libellé</th>
                          <th width="400px">Action</th>
                      </tr>
                  </thead>

                  <tbody>
                    @foreach ($factures as $facture)
                    <tr>
                        <td>{{ $facture->id }}</td>
                        <td>{{ $facture->marque }}</td>
                        <td>{{ $facture->couleur }}</td>
                        <td>{{ $facture->annee->format('d/m/Y') }}</td>
                        <td>{{ $facture->prix }}</td>
                        <td>{{ $facture->libelle }}</td>
                        <td>
                            <a href="{{ route('factures.show', $facture->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('factures.edit', $facture->id) }}" class="btn btn-primary btn-sm">Éditer</a>
                            <a href="{{ route('factures.pdf', $facture->id) }}" class="btn btn-warning btn-sm">Télécharger PDF</a>
                              <form action="{{ route('factures.destroy',$facture->id) }}" method="POST" style="display:inline-block;">
                                  @csrf
                                  @method('DELETE')

                                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Supprimer</button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
                  </tbody>

              </table>

              {{-- {!! $products->withQueryString()->links('pagination::bootstrap-5') !!} --}}

        </div>
      </div>
</div>
</x-layout>
