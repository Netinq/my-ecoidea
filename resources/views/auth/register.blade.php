@extends('layouts.default')

@section('title', 'Inscription')
@section('css', 'auth.css')

@section('content')
    <main>
        <div class="register main">
            <form class="feed" method="POST" action="{{ route('register') }}">
                @csrf
                <h1>@yield('title')</h1>
                <input class="flow {{ $errors->has('name') ? 'empty' : '' }}" type="text" name="name" id="pseudo" placeholder="Pseudo" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="errPwd" role="alert">
                        {{ $errors->first('name') }}
                    </span>
                @endif
                <input class="flow {{ $errors->has('email') ? 'empty' : '' }}" type="email" name="email" value="{{ old('email') }}" id="mail" placeholder="Email" required>
                @if ($errors->has('email'))
                    <span class="errPwd" role="alert">
                        {{ $errors->first('email') }}
                    </span>
                @endif
                <input class="flow {{ $errors->has('password') ? 'empty' : '' }}" type="password" name="password" min="8" placeholder="Mot de passe" required>
                @if ($errors->has('password'))
                    <span class="errPwd" role="alert">
                        {{ $errors->first('password') }}
                    </span>
                @endif
                <input class="flow" type="password" name="password_confirmation" min=8 placeholder="Confirmer le mot de passe" required>
                <label for="cguConfirm">J'accepte les <a href="{{ route('cgu') }}">CGU</a><input type="checkbox" id="cguConfirm" name="cgu" {{ old('cgu') ? 'checked' : '' }} required></label>
                @if ($errors->has('cgu'))
                    <span class="errPwd" role="alert">
                        {{ $errors->first('cgu') }}
                    </span>
                @endif
                <span id="errPwd" class="disable">Les mots de passe ne correspondent pas</span>
                <input class="flow" type="submit" value="S'inscrire">
                <span><a href="{{ route('login') }}">Se connecter</a></span>
            </form>

            </form>
        </div>
        <script type="text/javascript">
            $(function() {
                $("header").fadeIn("slow");
            });


            $(".flow").blur(function() {
                if ($(this).val() == "") {
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

            $("input[type='password']").change(function() {
                if ($("input[type='password']:first").val()!= $("input[type='password']:last").val()) {
                    $("#errPwd").removeClass("disable");
                } else {
                    $("#errPwd").addClass("disable");
                }
            });
        </script>
    </main>
@endsection
