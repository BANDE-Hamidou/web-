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
                    <select name="intervention_id" required class="@error('intervention_id') is-invalid @enderror">
                        <option value="">Sélectionnez une intervention</option>
                        @foreach($interventions as $intervention)
                            <option value="{{ $intervention->id }}" {{ old('intervention_id') == $intervention->id ? 'selected' : '' }}>
                                {{ $intervention->libelle }}
                            </option>
                        @endforeach
                    </select>
                    @error('intervention_id')<div class="error-message">{{ $message }}</div>@enderror
                </div>

                <div class="input-group">
                    {{-- <select name="type_piece_id" required class="@error('type_piece_id') is-invalid @enderror"> --}}
                        {{-- <option value="">Sélectionnez un type de pièce</option> --}}
                        {{-- @foreach($typePieces as $type)
                            <option value="{{ $type->id }}" {{ old('type_piece_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->nom }}
                            </option>
                        @endforeach --}}
                        <select name="type_pieces[]" multiple required>
                            @foreach($typePieces as $type)
                                <option value="{{ $type->id }}">{{ $type->nom }}</option>
                            @endforeach
                        </select>
                    {{-- </select> --}}
                    @error('type_piece_id')<div class="error-message">{{ $message }}</div>@enderror
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