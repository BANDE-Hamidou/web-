<x-layout>
    <div class="main-contenair">
        <div class="contenant">
            <h1>BIENVENU AU GARAGE XYZ </h1>
            <h1>Home</h1>
        </div>
               <div class="login-container">
               <div class="logo-container">
                   <!-- <img src="logo.png" alt="Logo"> -->
               </div>
               <h2>Ajouter uue voiture</h2>
               <form method="POST" action="{{ route('voiture.store',$vehicule->id)}}" enctype="multipart/form-data">
               @csrf
               @method('PUT')
                   <div class="input-group">
                       <input type="text" id="marque" name="marque" placeholder="Marque" required value="{{ old("marque")}}">
                       @error('marque')
                       {{ $message }}
                       @enderror
                   </div>
                   <div class="input-group">
                    <input type="text" id="couleur" name="couleur" placeholder="Couleur" required value="{{ old("couleur")}}">
                    @error('couleur')
                    {{ $message }}
                    @enderror
                </div>
                <div class="input-group">
                    <input type="date" id="email" name="annee" placeholder="Annee" required value="{{ old("annee")}}">
                    @error('annee')
                    {{ $message }}
                    @enderror
                </div>
                <div class="input-group">
                    <select name="annexe_id"  required>
                        <option value="">Sélectionner une annexe</option>
                        @foreach($annexes as $annexe)
                          <option value="{{ $annexe->id }}">{{ $annexe->nom }}</option>
                        @endforeach
                      </select>
                    @error('annexe_id')
                    {{ $message }}
                    @enderror
                </div>
                <div class="input-group">
                    <input type="text" id="email" name="prix" placeholder="prix" required value="{{ old("prix")}}">
                    @error('prix')
                    {{ $message }}
                    @enderror
                </div>
                   <div class="input-group">
                       <input type="text" name="detail" id="password" placeholder="Detail">
                       @error('detail')
                       {{ $message }}
                   @enderror
                   </div>
                   <div class="input-group">
                        <input type="file" name="image" id="password" placeholder="Image">
                        @error('image')
                        {{ $message }}
                        @enderror
                </div>
                   <button type="submit" class="butvalid">Soumettre</button>
               </form>
           </div>
    </div>
</x-layout>
