@extends('layouts.default')

@section('title', 'Quel est notre concept ?')
@section('css', 'concept.css')

@section('content')
    <main>
        <div class="page-header">
            <h1>Quel est notre concept ?</h1>
        </div>
        <img class="feuille" src="{{ asset('images/feuille.png') }}">
        <img class="feuille f2" src="{{ asset('images/feuille.png') }}">
        <img class="feuille f3" src="{{ asset('images/feuille.png') }}">
        <img class="feuille f4" src="{{ asset('images/feuille.png') }}">
        <div class="plante p1"></div>
        <div class="plante_rervese p2"></div>
        <div class="plante p3"></div>
        <div class="plante_rervese p4"></div>
        <div class="projet-informations">
            <div id="id1">
                <div class="box content-right">
                    <h3 id="sub_title">Une idée populaire</h3>
                    <p id="text">De nombreux mouvements internationaux ont fait surface afin de préserver notre environnement. Des associations, des groupes de discussions, des marches, des défis… Aujourd’hui, nous nous basons sur une idée venant de Twitter : Publier des idées pour améliorer notre éco-citoyenneté. De nos jours, nous assistons une prise de conscience importante de la population pour l’écologie.</p>
                </div>
            </div>
            <div id="id2">
                <div class="box content-left">
                    <h3 id="sub_title">Une démarche écologique</h3>
                    <p id="text">Avant toutes choses, nous désirons adapter une démarche écologique à tout point de vue. Nous travaillons avec l’aide de nombreux acteurs de l’écologie afin de respecter au maximum la planète. Malgré le fait qu’un data-center (lieu ou est stocké le site) ne soit pas forcément écologique, nous tentons de favoriser une limitation de la consommation électrique en diminuant les requêtes.</p>
                </div>
            </div>
            <div id="id3">
                <div class="box content-right">
                    <h3 id="sub_title">L'éco-citoyenneté</h3>
                    <p id="text">Nous vous avons parlé de l’éco-citoyenneté, mais qu’est ce que c’est ? Selon le dictionnaire : c’est le comportement d’une personne ou d’un groupe de personnes qui repose sur le respect des règles et des principes visant à respecter l’environnement. Cela peut se traduire par des actions de tous les jours, mais également une nouvelle approche des entreprises et des structures face à l’écologie.</p>
                </div>
            </div>
            <div id="id1">
                <div class="box content-left">
                    <h3 id="sub_title">Comment utiliser My Eco Idea ?</h3>
                    <p id="text">My EcoIdea est un projet regroupant vos idées pour l'écologie. Dans une démarche éco-citoyenne, nous aimerions partager vos idées afin d'améliorer le quotidien des gens, mais également changer les habitudes des entreprises.
                        Un titre, une description, et votre idée devient publics.
                        <i>- Partagez</i> vos idées au monde entier.
                        <i>- Partagez</i> les idées que vous aimez.
                        <i>- Likez</i> les idées qui vous plaisent.
                        <i>- Adhérez</i> aux idées, recevez les actualités et les notifications de celles-ci.</p>
                </div>
            </div>
        </div>
    </main>
@endsection
