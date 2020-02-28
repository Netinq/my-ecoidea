@extends('layouts.default')

@section('title', 'Mon idée')
@section('css', 'create_idea.css')

@section('content')
    <script
        src="https://code.jquery.com/jquery-1.11.0.min.js"
        integrity="sha256-spTpc4lvj4dOkKjrGokIrHkJgNA0xMS98Pw9N7ir9oI="
        crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery.wysibb.js')}}"></script>
    <script>
        $(document).ready(function() {
            let wbbOpt = {
                lang: "fr"
            };
            $("#desc").wysibb(wbbOpt);
        });
    </script>
    <main>
        <div class="form">
            <h2>Partager son idée</h2>
            <form method="post" action="{{ route('idea.store') }}" >
                @csrf
                <p>3 mots clé qui représent l'idée (Lors d'une recherche ce sont eux qui permettent de la trouver)<br>
                    <input type="text" name="keyword1" value="{{ old('keyword1') }}" maxlength="15" required>
                    <input type="text" name="keyword2" value="{{ old('keyword2') }}" maxlength="15" required>
                    <input type="text" name="keyword3" value="{{ old('keyword3') }}" maxlength="15" required></p>
                @if ($errors->has('keyword1'))
                    <strong class="error">{{ $errors->first('keyword1') }}</strong>
                @endif
                @if ($errors->has('keyword2'))
                    <strong class="error">{{ $errors->first('keyword2') }}</strong>
                @endif
                @if ($errors->has('keyword3'))
                    <strong class="error">{{ $errors->first('keyword3') }}</strong>
                @endif
                <p>Description courte (Description qui sera affichée sur l'accueil)<br>
                    <textarea name="preview" rows="2" minlength="15" maxlength="180" required>{{ old('preview') }}</textarea></p>
                @if ($errors->has('preview'))
                    <strong class="error">{{ $errors->first('preview') }}</strong>
                @endif
                <p>Description (N'hésitez pas à faire une rédaction si c'est un gros projet, plus c'est complet mieux c'est) <br>
                    <textarea id="desc" name="content" style="resize: vertical;" rows="20">{{ old('content') }}</textarea></p>
                @if ($errors->has('content'))
                    <strong class="error">{{ $errors->first('content') }}</strong>
                @endif
                <input type="submit" value="Partager" />
            </form>
        </div>
    </main>

@endsection
