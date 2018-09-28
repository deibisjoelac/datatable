<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        
        <title>Laravel</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark  bg-primary">
            <a class="navbar-brand" href="#">Laravel DataTables VueJs</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" 
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <span class="navbar-text">
                    DataTables Server Side
                </span>
            </div>
        </nav>
        <div class="container" id="app">
            
            <div class="col-md-10">
                <table-usuarios></table-usuarios>
            </div>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
