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
               <h2>Ajouter un personnel</h2>
               <form method="POST" action="{{ route('personnels.store')}}" enctype="multipart/form-data">
               @csrf
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
                   {{-- <div class="input-group"> --}}
                    {{-- <label for="service_id">Service</label> --}}
                        {{-- <select name="service_id" id="service_id" class="form-control">
                            @foreach(App\Models\Service::all() as $service)
                                <option value="{{ $service->id }}" {{ old('service_id', $personnel->service_id ?? '') == $service->id ? 'selected' : '' }}>
                                    {{ $service->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}
                   <button type="submit" class="butvalid">Soumettre</button>
               </form>
           </div>
    </div>
</x-layout>
