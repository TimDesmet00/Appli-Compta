<nav class="navbar">
    <a href="{{ route('accueil.index') }}">Accueil</a>
    <a href="{{ url('/clients') }}">Client</a>
    @if(Auth::check())
        <a href="{{ route('user.show', ['id' => Auth::id()]) }}">Profil</a>
    @endif
    <div class="connect">
        @if(Auth::check())
            <span class="user-name">Bonjour {{ Auth::user()->name }}</span>
            <button class="btn connection" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se Déconnecter</button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <button class="btn connection" onclick="location.href='#'">Se Connecter</button>
        @endif
        
    </div>
</nav>