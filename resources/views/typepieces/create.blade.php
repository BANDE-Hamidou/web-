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
             <h2>Ajouter un type de piece</h2>
         </div>
         <div class="new_form">
             <form method="POST" action="{{ route('typepieces.store')}}" >
                 @csrf
                 <div class="new_formul">

                     <div class="form-control">
                         <label for="nom">Nom</label>
                         <input type="text" class="elemntsInput" name="nom" placeholder="nom" required >

                     </div>


                     <div class="form-control">
                         <label for="quantite">Quantite</label>
                         <input type="number" class="elemntsInput" name="quantite" placeholder="quantite" required >
                     </div>

                 </div>
                     <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Valider </button>
             </form>
         </div>
     </div>
     </div>
    </div>
</x-layout>
