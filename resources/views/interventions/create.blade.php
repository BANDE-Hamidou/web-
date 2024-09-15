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
               <h2>Ajouter une réparation</h2>
               <form method="POST" action="{{ route('interventions.store')}}" enctype="multipart/form-data">
               @csrf
                   <div class="input-group">
                       <input type="text" id="email" name="libelle" placeholder="Libelle" required value="{{ old("libelle")}}">
                       @error('libelle')
                       {{ $message }}
                       @enderror
                   </div>
                   <div class="input-group">
                    <input type="date" id="prenom" name="date" placeholder="Date" required value="{{ old("date")}}">
                    @error('date')
                    {{ $message }}
                    @enderror
                </div>
                   <button type="submit" class="butvalid">Soumettre</button>
               </form>
           </div>
    </div>
</x-layout>
