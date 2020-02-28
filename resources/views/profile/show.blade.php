@extends('layouts.default')

@section('title', $user->name)
@section('css', 'profil_styles.css')

@section('content')
    <main>
        <code>Id : {{ $user->id }}</code><br>
        <code>Pseudo : {{ $user->name }}</code><br>
        <code>Role : {{ $user->roleName() }}</code><br>
        <code>Email : {{ $user->email }}</code><br>
        <code>Bio : {{ $user->bio }}</code><br>
        <code>Crée le : {{ $user->created_at->format('d/m/y') }}</code><br>
        <code>Image de profil : </code><br><br>
        <img src="{{ url('api/upload/avatars/'.$user->avatar) }}" alt="{{ $user->name }} Avatar"  height="150px" /><br>
        <button onclick="window.location.replace({{ route('profile.edit', $user->name) }})">Modifer le compte</button>
        <form method="post" action="{{ route('profile.destroy', $user->name) }}">
            @csrf
            <button>Supprimer le compte</button>
        </form>
    </main>
@endsection
