<nav class="navbar">
    <a href="{{ route('') }}">Accueil</a>
    <a href="{{ route('') }}">Ajoutez</a>
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
            <button class="btn connection" onclick="location.href='{{ route('user.login') }}'">Se Connecter</button>
            <!-- <a href="{{ route('user.login') }}" class="btn btn1 connection">Se Connecter</a> -->
        @endif
        
    </div>
</nav>