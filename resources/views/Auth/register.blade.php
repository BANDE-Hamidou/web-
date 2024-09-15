<x-layout>
    <div class="login-container">
        <h2>Inscription</h2>
        <form method="post" action="{{ route('create_user')}}">
            @csrf
            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" name="nom" placeholder="Nom et prénom d'utilisateur" required>
            </div>
            {{-- <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" name="prenom" placeholder="prenom d'utilisateur" required>
            </div>
            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="number" name="age" placeholder="age d'utilisateur" required>
            </div> --}}
            {{-- <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" name="adresse" placeholder="adresse d'utilisateur" required>
            </div> --}}
            <div class="input-group">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Mot de passe" required>
            </div>
            {{-- <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
            </div> --}}
            <button type="submit" class="butvalid">Créer un compte</button>
        </form>
        <div class="forgot-signup">
            <p>Déjà un compte ? <a href="{{ route('login')}}">Connexion</a></p>
        </div>
    </div>
</x-layout>
    
        
