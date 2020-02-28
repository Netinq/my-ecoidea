@section('description', 'De nombreux mouvements internationaux ont fait surface afin de préserver notre environnement. Des associations, des groupes de discussions,
    des marches, des défis… Aujourd’hui, nous nous basons sur une idée venant de Twitter : Publier des idées pour améliorer notre éco-citoyenneté. De nos jours, nous assistons
    une prise de conscience importante de la population pour l’écologie.')

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="keywords" content="myecoidea, eco, idea">
        <meta name="description" content="@yield('description')">
        <meta name="author" content="Quentin Sar, Spileur, Iqhwe">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="reply-to" content="contact@sarquentin.fr">
        <meta name='subject' content="subject_empty">
        <meta name='language' content='FR'>
        <meta name='owner' content='Quentin Sar'>
        <meta name='url' content='url_empty'>
        <meta name='identifier-URL' content='url_empty'>
        <meta name='target' content='all'>
        <meta name="theme-color" content="#35BF54">

        <link rel='shortcut icon' type='image/ico' href='{{ asset('images/logo.png') }}'>
        <link rel='logo' type='image/png' href='{{ asset('images/logo.png') }}'>

        <meta property="og:title" content="@hasSection('title') {{Config::get('app.name')}} - @yield('title') @else {{Config::get('app.name')}} @endif" />
        <meta property="og:description" content="@yield('description')" />
        <meta property="og:image" content="image_empty" />
        <meta property="og:site_name" content="@hasSection('title') {{Config::get('app.name')}} - @yield('title') @else {{Config::get('app.name')}} @endif" />
        <meta property="og:type" content="website" />
        <meta property="og:video" content="video_empty" />
        <meta property="og:locale" content="fr_FR" />

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@K_Dev_" />
        <meta name="twitter:title" content="@hasSection('title') {{Config::get('app.name')}} - @yield('title') @else {{Config::get('app.name')}} @endif" />
        <meta name="twitter:description" content="@yield('description')" />
        <meta name="twitter:image" content="/public/images/logo.svg" />

        <title>@hasSection('title') {{Config::get('app.name')}} - @yield('title') @else {{Config::get('app.name')}} @endif</title>

        <meta http-equiv="content-language" content="fr">

        <!-- Javascript -->

        <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('js/toastr.js') }}"></script>
        <script>
            const token = '{{ Session::token() }}';
        </script>

        <!-- Stylesheet -->
        <link rel="stylesheet" type="text/css" media="(min-width: 640px)" href="{{ asset('css/layouts/header.css') }}">
        <link rel="stylesheet" type="text/css" media="only screen and (max-width: 640px)" href="{{ asset('css/layouts/m_header.css') }}">
        @hasSection('noMaster') @else
        <link rel="stylesheet" type="text/css" href="{{ asset('css/master.css') }}">
        @endif
        <link rel="stylesheet" type="text/css" href="{{ asset('css/layouts/footer.css') }}">
        <link rel="stylesheet" href="{{asset('css/wysibb/wbbtheme.css')}}" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Sriracha" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        @hasSection('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/'.View::getSections()['css']) }}">
        @endif


        <!-- Cookies Checker  -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cookieconsent.min.css') }}" />
        <script src="{{ asset('js/cookieconsent.min.js') }}"></script>
        <script>
        window.addEventListener("load", function(){
        window.cookieconsent.initialise({
        "palette": {
            "popup": {
            "background": "#efefef",
            "text": "#404040"
            },
            "button": {
            "background": "#35BF54",
            "text": "#ffffff"
            }
        },
        "theme": "classic",
        "position": "bottom-right",
        "content": {
            "message": "Ce site utilise des cookies pour vous garantir la meilleure expérience.",
            "dismiss": "Accepter",
            "link": "En savoir plus",
            "href": "https://my-ecoidea.org/cgu"
        }
        })});
        </script>
    </head>
    <body>
    @hasSection('load')
    <div class="load">
        <div id="load_circle"></div>
        <div id="load_circle_2"></div>
        <div id="load_circle_reverse"></div>
    </div>
    <style>
        .disable { display: none; }
        header { display: none; }
        main { display: none; }
    </style>
    <script>
        $(function() {
            $(".load").fadeOut("slow", function() {
                $("header").fadeIn("slow");
                $("footer").fadeIn("slow");
                $("main").fadeIn("slow");
            });
        });
    </script>
    @endif
    @if(session('error'))
        <script language="javascript">
            $(function() {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1500",
                    "timeOut": "5000",
                    "extendedTimeOut": "1500",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr["error"]("{{ session('error') }}");
            });
        </script>
    @endif
    @if(session('success'))
        <script language="javascript">
            $(function() {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1500",
                    "timeOut": "5000",
                    "extendedTimeOut": "1500",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr["success"]("{{ session('success') }}");
            });
        </script>
    @endif
    @include('layouts.header')
    @yield('content')
    </body>
</html>
