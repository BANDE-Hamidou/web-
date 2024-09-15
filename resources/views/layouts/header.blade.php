
        <div class="sidebar">
    <div class="top">
        <div class="logo">
            <i class="fas fa-tools"></i>
            <span>XYZ</span>
        </div>
        <i class="fas fa-bars" id="btn"></i>
    </div>
    <div class="user">
        <img src="{{'assets/image/bug5.jpg'}}" alt="moi" class="user-img">
        <div>
            <p class="bold">GARAGE</p>
            <p>Administrateur</p>
        </div>
    </div>
    <ul>
        <li>
            <a href="{{ route('home') }}" class="">
                <i class="fas fa-home"></i>
                <span class="nav-item">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>
        <li>
            <a href="{{ route('vehicules.index') }}" class="">
                <i class="fas fa-car"></i>
                <span class="nav-item">Vehicules</span>
            </a>
            <span class="tooltip">Vehicules</span>
        </li>
        <li>
            <a href="{{ route('annexes.index') }}" class="">
                <i class="fas fa-file-alt"></i>
                <span class="nav-item">Annexes</span>
            </a>
            <span class="tooltip">Annexes</span>
        </li>
        <li>
            <a href="{{ route('interventions.index') }}" class="">
                <i class="fas fa-tools"></i>
                <span class="nav-item">Entretiens</span>
            </a>
            <span class="tooltip">Entretiens</span>
        </li>
        <li>
            <a href="{{ route('services.index') }}" class="">
                <i class="fas fa-hand-holding-usd"></i>
                <span class="nav-item">Services</span>
            </a>
            <span class="tooltip">Services</span>
        </li>
        <li>
            <a href="{{ route('factures.index') }}" class="">
                <i class="fas fa-file-invoice-dollar"></i>
                <span class="nav-item">Factures</span>
            </a>
            <span class="tooltip">Factures</span>
        </li>
        <li>
            <a href="{{ route('personnels.index') }}" class="">
                <i class="fas fa-users"></i>
                <span class="nav-item">Personnel</span>
            </a>
            <span class="tooltip">Personnel</span>
        </li>
        <li>
            <a href="{{ route('clients.index') }}" class="">
                <i class="fas fa-user-friends"></i>
                <span class="nav-item">Clients</span>
            </a>
            <span class="tooltip">Clients</span>
        </li>
        <li>
            <a href="{{ route('pieces.index') }}" class="">
                <i class="fas fa-cogs"></i>
                <span class="nav-item">Pièces</span>
            </a>
            <span class="tooltip">Pièces</span>
        </li>
        <li>
            <a href="{{ route('register') }}" class="">
                <i class="fas fa-user-plus"></i>
                <span class="nav-item">S'inscrire</span>
            </a>
            <span class="tooltip">Inscrire</span>
        </li>
        <li>
            @auth
            {{-- {{ Auth::user()}} --}}
            <form action="{{ route('logout') }}" method="POST">
                @method('delete')
                @csrf
                <a href="" class="">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Déconnexion</span>
                </a>
                <span class="tooltip">Déconnexion</span>
            </form>
            @endauth
            @guest
            <a href="{{ route('login') }}" class="">
                <i class="fas fa-sign-in-alt"></i>
                <span class="nav-item">Connexion</span>
            </a>
            <span class="tooltip">Connexion</span>
            @endguest
        </li>
    </ul>
</div>
