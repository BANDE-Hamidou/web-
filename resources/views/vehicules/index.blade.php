<x-layout>
    <div class="main-contenair">
        {{-- <img src="{{'assets/image/fond.jpg'}}" alt=""> --}}
         <div class="contenant">
             <h1>BIENVENU AU GARAGE XYZ </h1>
             <h1>Home</h1>
        </div>

        <h1>Liste des Véhicules</h1>

                <!-- Formulaire de recherche -->
                <form action="{{ route('vehicules.search') }}" method="GET">
                    <input type="text" name="query" placeholder="Rechercher..." value="{{ isset($query) ? $query : '' }}">
                    <button type="submit">Rechercher</button>
                </form>

                @if ($voitures->isEmpty())
                    <p>Aucun véhicule trouvé.</p>
                @else
                    <ul>
                        {{-- @foreach ($voitures as $vehicule)
                            <li>
                                <a href="{{ route('vehicules.show', $vehicule->id) }}">{{ $vehicule->marque }} - {{ $vehicule->couleur }} - {{ $vehicule->annee }}</a>
                            </li>
                        @endforeach --}}
                    </ul>
                @endif
                <div class="contenu2">
                    <div class="createvehi">
                        <a class="btn btn-success btn-sm" href="{{ route('vehicules.create') }}"> <i class="fa fa-plus"></i> Ajouter un véhicule</a>
                    </div>

                        <div class="conten">

                                        @foreach ($voitures as $vehicule)


                                            <div class="card" style="width: 18rem;">
                                                {{-- <a  href="{{ route('vehicules.show', $vehicule->id) }}"><img src="/images/{{ $vehicule->image }}" class="card-img-top" alt="..."></a>
                                                 --}}
                                                 <a href="{{ route('vehicules.show', $vehicule->id) }}">
                                                    <img src="/images/{{ $vehicule->image }}" class="card-img-top vehicle-image" alt="Image du véhicule">
                                                </a>
                                                
                                                <div class="card-body">
                                                <h5 class="card-title">{{$vehicule->marque}}</h5>
                                                <p class="card-text">{{$vehicule->detail}}.</p>
                                                </div>
                                            </div>

                                        @endforeach
                        </div>
                </div>



    </div>





</x-layout>
