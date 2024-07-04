<x-layout>

    <div class="main-contenair">
        {{-- <img src="{{'assets/image/fond.jpg'}}" alt=""> --}}
         <div class="contenant">
             <h1>BIENVENU AU GARAGE XYZ </h1>
             <h1>Home</h1>
         </div>

                <div class="login-container">
                <div class="logo-container">
                    <!-- <img src="logo.png" alt="Logo"> -->
                </div>
                <h2>Connexion</h2>
                <p>rendu facile!</p>
                <form  method="POST" action="{{ route('logins')}}">
                @csrf
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="email" id="email" name="email" placeholder="Votre adresse mail" required value="{{ old("email")}}">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Mot de passe">
                        @error('password')
                        {{ $message }}
                    @enderror
                    </div>
                    <button type="submit" class="butvalid">Se connecter</button>
                    <p class="forgot-signup">Mot de passe oublié ? <a href="{{ route('register')}}">S'inscrire</a></p>
                </form>
            </div>
     </div>


</x-layout>


