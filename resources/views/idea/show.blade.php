@extends('layouts.default')

@section('title', 'Idée')
@section('css', 'show_idea.css')

@section('content')
    <body>
    <main>
        @if(!$idea->isPublished())
            <div style="color: orange;">L'idée est actuellement en cours de vérification par un moderateur</div>
            @if(Auth::user()->isModerator())
                <button name="reject" style="float: right" onclick="reject()">Refuser</button>
                <button name="accept" style="float: right" onclick="accept()">Accepter</button>
                <script>
                    function reject() {
                        if(confirm("Vous allez supprimer l'idée n°{{ $idea->id }} de {{ $idea->user()->name }}")){
                            $.ajax({
                                method: 'DELETE',
                                url: "{{ route("idea.destroy", $idea->id) }}",
                                data: {_token: token}
                            });
                            setInterval(() => {
                                window.location.replace("{{ route('home') }}");
                            }, 1000);
                        }
                    }

                    function accept() {
                        if(confirm("Vous allez rendre publique l'idée n°{{ $idea->id }} de {{ $idea->user()->name }}")){
                            $.ajax({
                                method: 'PUT',
                                url: "{{ route("idea.update", $idea->id) }}",
                                data: {setPublic: 'true', _token: token}
                            });
                            setInterval(() => {
                                location.reload();
                            }, 1000);

                        }
                    }
                </script>
            @endif
        @else
            @can('delete', $idea)
                <button id="accept" name="delete" style="float: right">Supprimer l'idée</button>
                <script>
                    $('#accept').click(function () {
                        if (confirm("Vous allez supprimer l'idée n°{{ $idea->id }} de {{ $idea->user()->name }}")) {
                            $.ajax({
                                method: 'DELETE',
                                url: "{{ route("idea.destroy", $idea->id) }}",
                                data: {_token: token}
                            });
                            setInterval(() => {
                                window.location.replace("{{ route('home') }}");
                            }, 1000);
                        }
                    });
                </script>
            @endcan
        @endif
        <div class="idea">
            <div class="user-info">
                <img src="{{ $idea->user()->avatarURL() }}" class="authorLogo" height="50px" alt="{{ $idea->user()->name }} Avatar">
                <p id="user_name">{{ $idea->user()->name }}</p>
                <p id="post_date">posté le {{ $idea->created_at->format('d/m/Y') }}</p>
            </div>
            <div class="idea_header">
                <h3>{{ $idea->keyword1 }}, {{ $idea->keyword2 }}, {{ $idea->keyword3 }}</h3>
            </div>
            <div class="idea_content" style="text-align: center;">
                <p>{!! $idea->contentHTML() !!}</p>
            </div>

            <div class="idea_info"><i id="likes">{{ count($idea->reacts()->where('like', true)->get()) }} J'aime</i><i id="adhesions">{{ count($idea->reacts()->where('join', true)->get()) }} Adhésions</i></div>
        </div>
        <input id="adherer" class="xcenter" type="button" name="adherer" value="Adhérer" data-idea-id="{{ $idea->id }}" @guest disabled @endif
                @if(Auth::check() && !empty(Auth::user()->reacts()->where('idea_id', $idea->id)->get()->first()) && Auth::user()->reacts()->where('idea_id', $idea->id)->get()->first()->join) disabled @endif>
        <div class="share">
            <h3>Partager cette idée</h3>
            @include('layouts.share')
        </div>

    </main>
    <script src="{{ asset('js/icon.js') }}"></script>
    <script> const reactURL = '{{ route('idea.index') }}'; </script>
    </body>
@endsection
