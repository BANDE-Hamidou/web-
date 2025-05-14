<x-layout>
    <div class="main-contenair">
        <div class="contenant">
            <h1>BIENVENU AU GARAGE XYZ</h1>
            <h1>Home</h1>
        </div>

        <div class="login-container">
            <div class="logo-container">
                <!-- <img src="logo.png" alt="Logo"> -->
            </div>
            <h2>Ajouter un type de piece</h2>
            <form method="POST" action="{{ route('typepieces.store')}}">
                @csrf
                <div class="input-group">
                    <input type="text" name="nom" placeholder="Nom" required>
                    @error('nom')
                        {{ $message }}
                    @enderror
                </div>
                {{-- <div class="input-group">
                    <input type="number" name="quantite" placeholder="Quantite" required>
                    @error('quantite')
                        {{ $message }}
                    @enderror
                </div> --}}
                <button type="submit" class="butvalid">Valider</button>
            </form>
        </div>
    </div>
</x-layout>