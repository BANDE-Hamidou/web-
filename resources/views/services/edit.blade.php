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
       <h2>Ajouter un service</h2>
       <form method="POST" action="{{ route('services.update',$service->id)}}" enctype="multipart/form-data">
       @csrf
       @method('PUT')
           <div class="input-group">
                <input type="text" id="email" name="nom" placeholder="Nom" required value="{{ old("nom")}}">
                @error('nom')
                {{ $message }}
                @enderror
           </div>
           <div class="input-group">
               <input type="date" name="date" id="password" placeholder="Date">
               @error('date')
                    {{ $message }}
               @enderror
           </div>
           <div class="input-group">
                <select name="service_id"  required>
                    <option value="">Sélectionner une service</option>
                    @foreach(App\Models\Service::all() as $service)
                      <option value="{{ $service->id }}" {{ old('service_id', $personnel->service_id ?? '') == $service->id ? 'selected' : '' }}>{{ $service->nom }}</option>
                    @endforeach
                  </select>
                @error('service_id')
                {{ $message }}
                @enderror
            </div>
            <button type="submit" class="butvalid">Soumettre</button>
       </form>
   </div>
</div>
</x-layout>
