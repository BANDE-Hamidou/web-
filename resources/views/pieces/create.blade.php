<x-layout>
    <div class="main-contenair">
        <div class="contenant">
            <h1>BIENVENU AU GARAGE XYZ</h1>
            <h1>Ajout de pièce</h1>
        </div>

        <div class="login-container">
            <h2>Ajouter une pièce</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('pieces.store') }}">
                @csrf
                
                <div class="input-group">
                    <input type="text" name="nom" placeholder="Nom" required 
                           value="{{ old('nom') }}" class="@error('nom') is-invalid @enderror">
                    @error('nom')<div class="error-message">{{ $message }}</div>@enderror
                </div>
                
                <div class="input-group">
                    <input type="number" step="0.01" name="cout" placeholder="Coût" required
                           value="{{ old('cout') }}" class="@error('cout') is-invalid @enderror">
                    @error('cout')<div class="error-message">{{ $message }}</div>@enderror
                </div>
                
                <div class="input-group">
                    <input type="number" name="quantite" placeholder="Quantité" required
                           value="{{ old('quantite') }}" class="@error('quantite') is-invalid @enderror">
                    @error('quantite')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <div class="input-group">
                    <label>Intervention</label>
                    <select name="intervention_id" required class="@error('intervention_id') is-invalid @enderror">
                        <option value="">Sélectionnez une intervention</option>
                        @foreach($interventions as $intervention)
                            <option value="{{ $intervention->id }}" {{ old('intervention_id') == $intervention->id ? 'selected' : '' }}>
                                {{ $intervention->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('intervention_id')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <div class="input-group">
                    <label>Types de pièce</label>
                    <div class="type-pieces-container">
                        @foreach($typePieces as $type)
                            <div class="form-check">
                                <input type="checkbox" name="type_pieces[]" 
                                       value="{{ $type->id }}" id="type_{{ $type->id }}"
                                       {{ in_array($type->id, old('type_pieces', [])) ? 'checked' : '' }}>
                                <label for="type_{{ $type->id }}">{{ $type->nom }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error('type_pieces')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <button type="submit" class="butvalid">Enregistrer</button>
                <a href="{{ route('pieces.index') }}" class="btn-cancel">Annuler</a>
            </form>
        </div>
    </div>

    <style>
        .error-message { color: #dc3545; font-size: 0.875em; }
        .is-invalid { border-color: #dc3545; }
        .type-pieces-container { display: grid; grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); gap: 10px; }
        .form-check { display: flex; align-items: center; }
    </style>
</x-layout>