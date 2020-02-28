@extends('layouts.default')


@section('title', 'Erreur 404')

@section('content')
    <main>
        <h3>erreur 404</h3>
        <p>La page que vous cherchez est introuvable ou a été supprimé</p>
        <h2>Et c'est le bug...</h2>
    </main>
@endsection
<style type="text/css">
    h2
    {
        margin-top: 150px;
        margin-left: 50px;
        margin-bottom: 0;
        font-weight: bold;
        font-size: 6em;
    }
    h3
    {
        position: fixed;
        z-index: -1;
        font-size: 15em;
        opacity: .1;
        margin: 0;
    }
    p
    {
        left: 50%;
        transform: translate(-50%);
        position: absolute;
        bottom: 25px;
    }
</style>
