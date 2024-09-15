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
               <h2>Modifier un client</h2>
               <form method="POST" action="{{ route('clients.update',$client->id)}}" enctype="multipart/form-data">
               @csrf
               @method('PUT')
                   <div class="input-group">
                       <input type="text" id="email" name="nom" placeholder="Nom" required value="{{ old("nom")}}">
                       @error('nom')
                       {{ $message }}
                       @enderror
                   </div>
                   <div class="input-group">
                    <input type="text" id="prenom" name="prenom" placeholder="Prénom" required value="{{ old("prenom")}}">
                    @error('prenom')
                    {{ $message }}
                    @enderror
                </div>
                <div class="input-group">
                    <input type="number" id="email" name="age" placeholder="age" required value="{{ old("age")}}">
                    @error('age')
                    {{ $message }}
                    @enderror
                </div>
                   <div class="input-group">
                       <input type="text" name="adresse" id="password" placeholder="adresse">
                       @error('adresse')
                       {{ $message }}
                   @enderror
                   </div>
                   <button type="submit" class="butvalid">Soumettre</button>
                   {{-- <p class="forgot-signup"><a href="{{ route('register')}}">S'inscrire</a></p> --}}
               </form>
           </div>
    </div>
</x-layout>
