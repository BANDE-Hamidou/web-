<x-layout>
    {{-- @if (auth()->check())
                    $user = auth()->user();
                    @if ($user->is_admin) --}}

         <div class="main-contenair">
             <div class="contenant">
                 <h1>BIENVENU AU GARAGE XYZ </h1>
                 <h1>Home</h1>
             </div>

                    <div class="login-container">
                    <div class="logo-container">
                    </div>
                    <h2>Modifier une annexe</h2>
                    <form method="POST" action="{{ route('annexes.update',$annexe->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="input-group">
                            <input type="text" id="email" name="nom" placeholder="Nom" required value="{{ old("nom")}}">
                            @error('nom')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="input-group">
                            <input type="text" name="localisation" id="password" placeholder="Localisation">
                            @error('localisation')
                            {{ $message }}
                        @enderror
                        </div>
                        <button type="submit" class="butvalid">Soumettre</button>
                    </form>
                </div>
         </div>
    {{-- @endif
        @endif --}}
</x-layout>
