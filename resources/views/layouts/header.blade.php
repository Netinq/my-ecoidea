     <header class="top full-w">
        <img id="logo" src="{{asset('images/logo.png') }}">
        <div id="menu" class="left">
            <span id="myecoidea" class="left">My EcoIdea</span>
            <div class="mobile-nav">	
            <a @if(!Request::routeIs('home'))href="{{ route('home') }}" @endif id="home" class="left light">Accueil</a>
            <a @if(!Request::routeIs('idea.create'))href="{{ route('idea.create') }}" @endif id="idea" class="left light">Mon idée</a>
            </div>
        </div>
        @guest
            <a @if(!Request::routeIs('login'))href="{{ route('login') }}" @endif id="login" class="right round to-top">Connexion</a>
        @else
            <a @if(!Request::routeIs('logout'))href="{{ route('logout') }}" @endif id="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="right round to-top"><i class="fas fa-sign-out-alt"></i></a>
            <a @if(!Request::routeIs('profile.edit'))href="{{ route('profile.edit', Auth::user()->name) }}" @endif id="login" class="right round to-top">{{ Auth::user()->name }}</a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
             </form>
        @endguest
         <form action="{{route('search')}}">
            <div class="right round to-top" id="search-box">
                <input id="search-txt" class="left" name="q" placeholder="Rechercher">
                <a class="right icon" id="search-btn">
                    <svg  color="" role="img" aria-hidden="true" viewBox="0 0 512 512" focusable="false" data-prefix="far" data-icon="search"><path fill="currentColor" d="M 508.5 468.9 L 387.1 347.5 c -2.3 -2.3 -5.3 -3.5 -8.5 -3.5 h -13.2 c 31.5 -36.5 50.6 -84 50.6 -136 C 416 93.1 322.9 0 208 0 S 0 93.1 0 208 s 93.1 208 208 208 c 52 0 99.5 -19.1 136 -50.6 v 13.2 c 0 3.2 1.3 6.2 3.5 8.5 l 121.4 121.4 c 4.7 4.7 12.3 4.7 17 0 l 22.6 -22.6 c 4.7 -4.7 4.7 -12.3 0 -17 Z M 208 368 c -88.4 0 -160 -71.6 -160 -160 S 119.6 48 208 48 s 160 71.6 160 160 s -71.6 160 -160 160 Z" /></svg>
                </a>
            </div>
        </form>
        <div class="bottom full-w" id="bar"></div>
    </header>