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
       <h2>Ajouter une pièce</h2>
       <form method="POST" action="{{ route('pieces.store')}}" enctype="multipart/form-data">
       @csrf
           <div class="input-group">
               <input type="text" id="email" name="nom" placeholder="Nom" required value="{{ old("nom")}}">
               @error('nom')
               {{ $message }}
               @enderror
           </div>
           <div class="input-group">
            <input type="number" id="prenom" name="cout" placeholder="cout" required value="{{ old("cout")}}">
            @error('cout')
            {{ $message }}
            @enderror
        </div>
           <div class="input-group">
               <input type="number" name="quantite" id="password" placeholder="quantite" value="{{ old("cout")}}" required>
               @error('quantite')
               {{ $message }}
           @enderror
           </div>
           <button type="submit" class="butvalid">Soumettre</button>
       </form>
   </div>
</div>
</x-layout>
