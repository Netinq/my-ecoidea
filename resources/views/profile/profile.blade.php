@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ Auth::user()->name }}</div>
                <div class="card-body">
                    <h2>Changer mon Avatar</h2>
                    <img src="{{ url('api/upload/avatars/'.Auth::user()->avatar) }}" height="150px"  alt="{{ Auth::user()->name }} Avatar"/>
                    <form action="{{ route('profile.avatar_update') }}" method="post" enctype="multipart/form-data" style="margin-top: 15px">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp" accept="image/png, image/jpeg">
                            <small id="fileHelp" class="form-text text-muted">Veuillez choisir une image. La taille de l'image ne doit pas dépasser 2 Mo.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregister</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
