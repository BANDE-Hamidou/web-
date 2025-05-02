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
                    <label>Nom</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" required>
                    @error('nom')<div class="error">{{ $message }}</div>@enderror
                </div>
                
                <div class="input-group">
                    <label>Coût</label>
                    <input type="number" step="0.01" name="cout" value="{{ old('cout') }}" required>
                    @error('cout')<div class="error">{{ $message }}</div>@enderror
                </div>
                
                <div class="input-group">
                    <label>Quantité</label>
                    <input type="number" name="quantite" value="{{ old('quantite') }}" required>
                    @error('quantite')<div class="error">{{ $message }}</div>@enderror
                </div>

                <div class="input-group">
                    <label>Intervention</label>
                    <select name="intervention_id" required>
                        <option value="">Sélectionnez...</option>
                        @foreach($interventions as $intervention)
                            <option value="{{ $intervention->id }}" {{ old('intervention_id') == $intervention->id ? 'selected' : '' }}>
                                {{ $intervention->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('intervention_id')<div class="error">{{ $message }}</div>@enderror
                </div>

                <div class="input-group">
                    <label>Types de pièce</label>
                    <div class="type-pieces">
                        @foreach($typePieces as $type)
                            <div>
                                <input type="checkbox" name="type_pieces[]" 
                                       value="{{ $type->id }}" id="type_{{ $type->id }}"
                                       {{ in_array($type->id, old('type_pieces', [])) ? 'checked' : '' }}>
                                <label for="type_{{ $type->id }}">{{ $type->nom }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error('type_pieces')<div class="error">{{ $message }}</div>@enderror
                </div>

                <button type="submit" class="btn-submit">Enregistrer</button>
                <a href="{{ route('pieces.index') }}" class="btn-cancel">Annuler</a>
            </form>
        </div>
    </div>
</x-layout>