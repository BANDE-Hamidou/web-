<x-layout>
    <div class="main-contenair">
        <div class="contenant">
            <h1>BIENVENU AU GARAGE XYZ</h1>
            <h1>Modifier une intervention</h1>
        </div>

        <div class="login-container">
            <div class="logo-container">
                <!-- <img src="logo.png" alt="Logo"> -->
            </div>
            <h2>Modifier la réparation</h2>
            <form method="POST" action="{{ route('interventions.update', $intervention->id) }}">
                @csrf
                @method('PUT')
                <div class="input-group">
                    <input type="text" id="libelle" name="libelle" placeholder="Libellé" required 
                           value="{{ old('libelle', $intervention->libelle) }}">
                    @error('libelle')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <select name="type" id="type" class="form-control" required>
                        <option value="interne" {{ old('type', $intervention->type) == 'interne' ? 'selected' : '' }}>Interne</option>
                        <option value="externe" {{ old('type', $intervention->type) == 'externe' ? 'selected' : '' }}>Externe</option>
                    </select>
                    @error('type')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="date" id="date" name="date" placeholder="Date" required 
                           value="{{ old('date', $intervention->date->format('Y-m-d')) }}">
                    @error('date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <select name="vehicule_id" id="vehicule_id" >
                        <option value="">Sélectionnez un véhicule</option>
                        @foreach($vehicules as $vehicule)
                            <option value="{{ $vehicule->id }}" >
                                {{ $vehicule->marque }} - {{ $vehicule->modele }}
                            </option>
                        @endforeach
                    </select>
                    @error('vehicule_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="butvalid">Mettre à jour</button>
            </form>
        </div>
    </div>
</x-layout>