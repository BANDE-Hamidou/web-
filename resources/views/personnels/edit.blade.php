<x-layout>
    <div class="main-contenair">
        {{-- <img src="{{'assets/image/fond.jpg'}}" alt=""> --}}
         <div class="contenant">
             <h1>BIENVENU AU GARAGE XYZ </h1>
             <h1>Home</h1>
         </div>

    <div class="containeur">

        <div class="conte_form">
            <div class="titre1">
                <h2>Ajouter un personnel</h2>
            </div>
            <div class="new_form">
                <form method="POST" action="{{ route('personnels.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="new_formul">

                        <div class="form-control">
                            <label for="nom">Nom</label>
                            <input type="text" class="elemntsInput" name="nom" placeholder="nom" required >

                        </div>

                        <div class="form-control">
                            <label for="prenom">prenom</label>
                            <input type="text" class="elemntsInput" name="prenom" placeholder="prenom" required >

                        </div>

                        <div class="form-control">
                            <label for="adresse">adresse</label>
                            <input type="text" class="elemntsInput" name="adresse" placeholder="adresse" required >
                        </div>

                    </div>
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Valider </button>
                </form>
            </div>
        </div>
        </div>
    </div>

    <div class="main-contenair">
        <div class="contenant">
            <h1>BIENVENU AU GARAGE XYZ </h1>
            <h1>Home</h1>
        </div>

               <div class="login-container">
               <div class="logo-container">
                   <!-- <img src="logo.png" alt="Logo"> -->
               </div>
               <h2>Ajouter un personnel</h2>
               <form method="POST" action="{{ route('personnels.update',$personnel->id)}}" enctype="multipart/form-data">
               @csrf
               @method('PUT')
                   <div class="input-group">
                       <i class="fas fa-user"></i>
                       <input type="text" id="email" name="nom" placeholder="Nom" required value="{{ old("nom")}}">
                       @error('nom')
                       {{ $message }}
                       @enderror
                   </div>
                   <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="prenom" name="prenom" placeholder="Prénom" required value="{{ old("prenom")}}">
                    @error('prenom')
                    {{ $message }}
                    @enderror
                </div>
                   <div class="input-group">
                       <i class="fas fa-lock"></i>
                       <input type="text" name="adresse" id="password" placeholder="adresse">
                       @error('adresse')
                       {{ $message }}
                   @enderror
                   </div>
                   <button type="submit" class="butvalid">Soumettre</button>
               </form>
</x-layout>
