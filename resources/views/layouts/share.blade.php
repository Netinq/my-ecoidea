    <div class="share-plugin">
        <a onclick="window.open('https://twitter.com/intent/tweet?hashtags=MyEcoidea&text={{ $idea->preview }}&url={{ urlencode(route('idea.show', $idea->id)) }}&via=My_EcoIdea&original','popup','width=650,height=500'); return false;" style="box-shadow: none;"><img src="{{asset('images/icons/twitter.png') }}" alt="Twitter"  height="40" /></a>
        <a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('idea.show', $idea->id)) }}','popup','width=650,height=500'); return false;" style="box-shadow: none;"><img src="{{asset('images/icons/facebook.png') }}" alt="Facebook"  height="40" /></a>
    </div>
