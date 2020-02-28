<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=US-ASCII">
    <title>My Eco Idea | Confirmation de l'adresse mail</title>
</head>
<body>
<h1>My Eco Idea</h1>
<h2>Vous devez confirmer ce compte !</h2>
<p>Est ce que c'est compte vous appartient ?</p>
<div class="account">
    <p id="account_name">Nom du compte : <i>{{$notifiable->name}}</i></p>
    <p id="account_createdAt">Date de création : <i>{{ $notifiable->created_at->format('d/m/Y H:i') }}</i></p>
</div>
<div class="confirmation"><a href="{{url('/confirm/'.$notifiable->id.'/'.$notifiable->confirmation_token)}}">Confirmer le compte</a></div>
<p>Si le bouton ci-dessus ne marche pas, copier-coller le lien ci-dessous dans votre navigateur, afin de confirmer votre compte : <a href="{{url('/confirm/'.$notifiable->id.'/'.$notifiable->confirmation_token)}}">{{url('/confirm/'.$notifiable->id.'/'.$notifiable->confirmation_token)}}</a></p>
<p>Si le compte ne vous appartient pas, merci de le signaler à notre équipe. Si vous ne confirmez pas le compte, il ne sera pas utilisable.</p>
</body>
</html>
<style type="text/css">
    :root
    {
        --green : #35BF54;
        --green-02 : #237F38;
        --green-03 : #2b8c43;
        --gray : #707070;
        --white : #ffffff;

        color : var(--gray);
        background-color : var(--white);

        padding: 0;
        margin: 0;
        outline: 0;
        border: none;
        box-sizing: border-box;

        font-family: Arial;
    }
    body
    {
        text-align: justify;
    }
    h1
    {
        color: var(--green);
        font-size: 300%;
        font-weight: bold;
    }
    .account
    {
        left: 5px;
        width: 300px;
        padding: 10px;
        box-shadow: #eee 0px 5px 10px;
    }
    .account:hover
    {
        box-shadow: #777 0px 0px 10px;
    }
    .confirmation
    {
        left: 5px;
        width: 300px;
        padding: 10px;
        box-shadow: #eee 0px 5px 10px;
        margin-top: 10px;
        border-radius: 5Px;
        background: var(--green);
        color: white;
        cursor: pointer;
    }
    .confirmation a, .confirmation a:visited
    {
        color: white;
        text-decoration: none;
        text-align: center;
    }
    .confirmation:hover
    {
        box-shadow: #777 0px 0px 10px;
    }
</style>
