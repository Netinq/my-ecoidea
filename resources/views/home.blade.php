@extends('layouts.default')

@section('load', true)
@section('css', 'index.css')

@section('content')
    <main>
        <div class="page-header">
            <h1>Découvrez des idées</h1>
        </div>

        <div id="ideas-container"><!-- container Idées-->
            @foreach($ideas as $idea)
                <div class="idea" data-idea-id="{{ $idea->id }}"><!-- Idée -->
                    <div class="header"><!-- Head -->
                        <img src="{{ $idea->user()->avatarURL() }}" class="authorLogo" alt="{{ $idea->user()->name }} Avatar">
                        <span class="authorName">{!! $idea->user()->formatName() !!}</span>
                        @if(!$idea->isPublished())
                            <spam style="color: red;">L'idée est a valider</spam>
                        @endif
                    </div>
                    <div class="content"><!-- Preview -->
                        <span>{{ $idea->preview }}</span>
                    </div>
                    <div class="action"><!-- Div d'action -->
                        <input type="button" href="{{ route('idea.show', $idea->id) }}" class="discover" value="Découvrir">
                        <div id="@if(Auth::check() && !empty(Auth::user()->reacts()->where('idea_id', $idea->id)->get()->first()) && Auth::user()->reacts()->where('idea_id', $idea->id)->get()->first()->like){{"heart-fill" }}@else{{"heart" }}@endif" class="ic medium fl" @if(!isset($reacts)) data-no-user="1" @endif></div><p id="like-count-{{ $idea->id }}">{{ count($idea->reacts()->where('like', true)->get()) }}</p>
                    </div>
                </div>
            @endforeach
        </div><!-- End container idées-->
    </main>
    <script src="{{ asset('js/icon.js') }}"></script>
    <script>

        const reactURL = '{{ route('idea.index') }}';

        $('.discover').click(function () {
            window.location.replace($(this).attr('href'));
        });


        let updateChirpStats = {
            Like: function (chirpId) {
                document.querySelector('#likes-count-' + chirpId).textContent++;
            },

            Unlike: function(chirpId) {
                document.querySelector('#likes-count-' + chirpId).textContent--;
            }
        };


        let toggleButtonText = {
            Like: function(button) {
                button.textContent = "Unlike";
            },

            Unlike: function(button) {
                button.textContent = "Like";
            }
        };

        let actOnChirp = function (event) {
            var chirpId = event.target.dataset.chirpId;
            var action = event.target.textContent;
            toggleButtonText[action](event.target);
            updateChirpStats[action](chirpId);
            axios.post('/idea/' + chirpId + '/act',
                { action: action });
        };

    </script>

    @include('layouts.footer')
@endsection
