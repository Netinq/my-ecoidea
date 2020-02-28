<?php
$idea_text = "http://my-ecoidea.org est en maintenance !
\n Une idée écologique à partager?\n Une envie de découvrir des idées écologique ?\n c'est chez nous !\n";
?>
<html lang="fr">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='shortcut icon' type='image/ico' href='/public/images/logo.png'>
    <link rel='logo' type='image/svg' href='/public/images/logo.png'>


    <title>My EcoIdea | Maintenance</title>

    <meta http-equiv="content-language" content="fr">

    <script src="public/js/jquery-3.3.1.min.js"></script>
</head>
<body>
<main style="margin-top:100px;">
    <h3>On travaille, désolé...</h3>
    <h2>Maintenance</h2>
    <p><div class="share-plugin">
        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="<?php echo($idea_text) ?>" data-via="My_EcoIdea" data-hashtags="MyEcoidea" data-show-count="false">Tweet</a>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fmy-ecoidea.sarquentin.fr/&layout=button_count&size=large&width=100&height=28&appId" width="100" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
    </div></p>
    </div>
</main>
</body>
</html>
<style type="text/css">
    h2
    {
        margin-left: 50px;
        font-weight: bold;
        font-size: 10em;
    }
    h3
    {
        position: fixed;
        z-index: -1;
        font-size: 8em;
        opacity: .1;
        margin-top: 150px;
    }
    p
    {
        left: 50%;
        transform: translate(-50%);
        position: absolute;
        bottom: 25px;
    }

    /*
    ########################
    #    My-EcoIdea.org    #
    #      master.css      #
    ########################
    */

    :root
    {
        /* Declaration des couleurs */
        --green : #35BF54;
        --green-02 : #237F38;
        --gray : #707070;
        --white : #ffffff;
        --blue: #63a4ff;
        --blue-01 : #36a5f9;

        /* Declaration des ombres */
        --shdw-btn-li: #bbb 0px 3px 10px ;     /*Bouton light*/
        --shdw-btn: #999 0px 3px 10px ;     /*Bouton*/
        --shdw-btn-hov: #777 0px 4px 10px;  /*Bouton hover*/
        --shdw-df: #eee 0px 5px 10px;       /*Defaut*/
        --shdw-df-hov: #ccc 0px 5px 10px;   /*Defaut hover*/
        --shdw-01: #aaa 0px 0px 10px;       /*Inconnu au bataillon*/
        --shdw-idea: 0px 1px 10px #ccc;     /* Idea form*/
        --shdw-idea-hov: 0px 1px 14px #777; /* Idea form hover */

        /* Declaration des bordures */
        --border-01: #ccc 1px solid;
        --border-01f: #666 1px solid;
        --border-01-blue: var(--blue) 1px solid;
        --border-02-blue: var(--blue) 2px solid;

        /* Couleurs par defaut */
        color : var(--gray);
        background-color : var(--white);

        /* Remise à zero de toutes les positions */
        padding: 0;
        margin: 0;
        outline: 0;
        border: none;

        /* Selection de la police d'ecriture */
        font-family: Arial;
        /* Ajustement de la taille des box */
        box-sizing: border-box;

        overflow-x: hidden;
    }

    body
    {
        width: 100%;
        margin: 0;
    }

    a, a:hover, a:active, a:visited
    {
        text-decoration: none;
        cursor: pointer;
    }
    main
    {
        margin-top: calc(8vh + 50px);
        margin-right: 0;
        margin-left: 0;

        padding-left: 5vw;
        padding-right: 5vw;

        height: auto;
        width: 90vw;
    }
</style>
