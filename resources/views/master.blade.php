<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pageview Tracking</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.42/css/uikit.min.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 300;
            height: 100vh;
            margin: 0;
        }
        footer {
            margin: 50px 0;
            text-align: center;
            font-size: .9rem;
        }
    </style>
</head>
<body>
    <div id="app">

        <div class="uk-container">
            @yield('content')
        </div>

        <footer>
            &copy; lucasmoreira.com.br
        </footer>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.42/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.42/js/uikit-icons.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>

    <script>
    var script = document.createElement('script');
    script.src="https://webfoco.app/tracking.js";
    script.id="dd251";
    document.getElementsByTagName('head')[0].appendChild(script);
    </script> 
</body>
</html>
