@extends('layouts.default')

@section('title', 'Connexion')
@section('css', 'auth.css')

@section('content')
    <main>
        <div class="login main">
            <form class="feed" method="POST" action="{{ route('login') }}">
                @csrf
                <h1>@yield('title')</h1>
                <input class="flow" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                @if ($errors->has('email'))
                    <span class="errPwd" role="alert">
                        {{ $errors->first('email') }}
                    </span>
                @endif
                <input class="flow" id="password" type="password" name="password" placeholder="Mot de passe" required>
                @if ($errors->has('password'))
                    <span class="errPwd" role="alert">
                        {{ $errors->first('password') }}
                    </span>
                @endif
                <label for="stayLogged">Se souvenir de moi<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}></label>
                <input class="flow" type="submit" value="Se connecter">
                <span><a href="{{ route('register') }}">S'inscrire</a></span>
            </form>
        </div>
        <script type="text/javascript">
            $(function() {
                $("header").fadeIn("slow");
            });

            $(".flow").blur(function() {
                if ($(this).val() === "") {
                    $(this).removeClass("valid");
                    $(this).addClass("empty");
                    var placeholder = $(this).attr("placeholder");
                    if (!placeholder.includes(" (Obligatoire)")) {
                        placeholder += " (Obligatoire)";
                        $(this).attr("placeholder", placeholder);
                    }
                } else {
                    $(this).removeClass("empty");
                    $(this).addClass("valid");
                }
            });

        </script>
    </main>
@endsection
