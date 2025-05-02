<x-layout>
    <div class="main-contenair">
        {{-- <img src="{{'assets/image/fond.jpg'}}" alt=""> --}}
         <div class="contenant">
             <h1>BIENVENU AU GARAGE XYZ </h1>
             <h1>Home</h1>
         </div>


    <div class="card mt-5">
        <h2 class="card-header">Liste de toutes les annexes</h2>
        <div class="card-body">

              @session('success')
                  <div class="alert alert-success" role="alert"> {{ $value }} </div>
              @endsession

              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <a class="btn btn-success btn-sm" href="{{ route('annexes.create') }}"> <i class="fa fa-plus"></i> Ajouter une annexe</a>
              </div>

              <table class="table table-bordered table-striped mt-4">
                  <thead>
                      <tr>
                          <th width="80px">No</th>
                          <th>Nom</th>
                          <th>Localisation</th>
                          <th width="400px">Action</th>
                      </tr>
                  </thead>

                  <tbody>
                  @forelse ($annexes as $annexe)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{$annexe->nom }}</td>
                          <td>{{$annexe->localisation }}</td>
                          <td>

                                <a class="btn btn-info btn-sm" href="{{ route('annexes.show',$annexe->id) }}"><i class="fa-solid fa-list"></i> Voir</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('annexes.edit',$annexe->id) }}"><i class="fa-solid fa-pen-to-square"></i> Modifier</a>
                              <form action="{{ route('annexes.destroy',$annexe->id) }}" method="POST" style="display:inline-block;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Supprimer</button>
                              </form>
                          </td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="5">La liste est vite ! Veuillez ajouter !.</td>
                      </tr>
                  @endforelse
                  </tbody>

              </table>

              {{-- {!! $products->withQueryString()->links('pagination::bootstrap-5') !!} --}}

        </div>
      </div>
     </div>


    {{-- {{$annexes->links()}} --}}
</x-layout>
