<x-layout>
    <div class="main-contenair">
        <div class="contenant">
            <h1>BIENVENU AU GARAGE XYZ</h1>
            <h1>Ajouter une intervention</h1>
        </div>

        <div class="login-container">
            <div class="logo-container">
                <!-- <img src="logo.png" alt="Logo"> -->
            </div>
            <h2>Ajouter une réparation</h2>
            <form method="POST" action="{{ route('interventions.store')}}">
                @csrf
                <div class="input-group">
                    <input type="text" id="libelle" name="libelle" placeholder="Libellé" required value="{{ old('libelle') }}">
                    @error('libelle')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <select name="type" id="type"  required>
                        <option value="">Sélectionnez un type</option>
                        <option value="interne" {{ old('type') == 'interne' ? 'selected' : '' }}>Interne</option>
                        <option value="externe" {{ old('type') == 'externe' ? 'selected' : '' }}>Externe</option>
                    </select>
                    @error('type')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="date" id="date" name="date" placeholder="Date" required value="{{ old('date') }}">
                    @error('date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <select name="vehicule_id" id="vehicule_id" class="form-control">
                        <option value="">Sélectionnez un véhicule</option>
                        @foreach($vehicules as $vehicule)
                            <option value="{{ $vehicule->id }}" {{ old('vehicule_id') == $vehicule->id ? 'selected' : '' }}>
                                {{ $vehicule->marque }} - {{ $vehicule->modele }}
                            </option>
                        @endforeach
                    </select>
                    @error('vehicule_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="butvalid">Soumettre</button>
            </form>
        </div>
    </div>
</x-layout>