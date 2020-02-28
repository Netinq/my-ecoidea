@extends('layouts.default')

@section('title', $user->name)
@section('css', 'profil_styles.css')

@section('content')
    <main>
        <div class="main">
            <script>
                $(function() {
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1500",
                        "timeOut": "10000",
                        "extendedTimeOut": "10000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };
                    toastr["error"]("Des problèmes sont présents ce qui suspend temporairement la modification des profils<br>Notre équipe travaille dessus");
                });
            </script>
            <h2>Modifier son profil</h2>
            <form id="image" class="feed" method="post" action="{{ route('profile.update', $user->name) }}">
                @csrf
                <img height="150" alt="test Avatar" src="{{ url('api/upload/avatars/'.$user->avatar) }}">
                <label for="avatarFile">Changer d'avatar<input name="avatarFile" class="disable" id="avatarFile" aria-describedby="fileHelp" type="file" accept="image/png, image/jpeg" onchange="document.getElementById('image').submit();"></label>
            </form>
            <form id="form" class="feed" method="post" action="{{ route('profile.update', $user->name) }}">
                @csrf
                <input type="hidden" name="_method" value="patch" />
                <input class="flow" name="pseudo" id="pseudo" value="{{ $user->name }}" placeholder="Pseudo" required>
                <input class="flow" name="email" id="email" type="email" value="{{ $user->email }}" placeholder="Email" required>
                <div id="reset-password">
                    <input class="flow button" type="button" value="Modifier le mot de passe">
                    <input class="flow" name="oldPassword" id="oldPassword" type="password" placeholder="Ancien mot de passe" value="{{ old('password') }}" required>
                    <input class="flow" name="password" id="password" type="password" placeholder="Mot de passe" value="{{ old('password') }}" required>
                    <input class="flow" type="password" placeholder="Confirmer le mot de passe" required>
                </div>
                <input class="flow bottom" id="save" type="submit" value="Enregistrer" onclick="document.getElementById('form').submit();">
            </form>
        </div>
    </main>
@endsection
