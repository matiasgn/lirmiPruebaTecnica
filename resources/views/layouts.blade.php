<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/favicons.png') }}" type="image/png"/>
    <title>Usuarios</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>
<div id="app">
</div>
<body>
<div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                        <li class="nav-item  {{ (request()->is('document')) ? 'active' : '' }}">
                            <a class="nav-link" href="/document"><i class="nav-icon far fa-folder-open"></i>&nbsp;Documentos</a>
                        </li>
                        <li class="nav-item  {{ (request()->is('request/add')) ? 'active' : '' }}">
                            <a class="nav-link" href="/request/add"><i class="fas fa-link"></i>&nbsp; Solicitar
                                Vinculación</a>
                        </li>
                    </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>

<script src="{{asset('js/loading.js')}}" type="text/javascript"></script>

</html>


