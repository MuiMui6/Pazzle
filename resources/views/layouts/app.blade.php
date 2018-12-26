<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link">
                            Cart
                        </a>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link">
                                History Cart
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                AdminMenu <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="#" class="dropdown-item">Address Management</a>
                                <a href="#" class="dropdown-item">Item Management</a>
                                <a href="#" class="dropdown-item">Item Comment Management</a>
                                <a href="#" class="dropdown-item">Order Management</a>
                                <a href="#" class="dropdown-item">Peas Management</a>
                                <a href="#" class="dropdown-item">Size Management</a>
                                <a href="#" class="dropdown-item">Spot Management</a>
                                <a href="#" class="dropdown-item">Spot Comment Management</a>
                                <a href="#" class="dropdown-item">Tag Management</a>
                                <a href="#" class="dropdown-item">User Management</a>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <form method="get" action="/">
                    @csrf
                    <input type="text" aria-placeholder="Keyword Search!" class="form-control m-3" name="keyword">
                </form>
            </div>
            <div class="col-2">
                <ul class="list-group mt-3 mb-3">
                    <li class="list-group-item"><h4>Peas</h4></li>
                    @foreach($peas as $peases)
                        <li class="list-group-item">
                            <form method="get" action="/">
                                <input type="submit" class="btn btn-link" value="{{$peases->cnt}}" name="keyword">
                            </form>
                        </li>
                    @endforeach
                </ul>


                <ul class="list-group mt-3 mb-3">
                    <li class="list-group-item"><h4>Size</h4></li>
                    @foreach ($size as $sizes)
                        <li class="list-group-item">
                            <form method="get" action="/">
                                <input type="hidden" value="{{$sizes->height}}" name="key_height">
                                <input type="hidden" value="{{$sizes->width}}" name="key_width">
                                <input type="submit" class="btn btn-link" value="{{$sizes->height}}×{{$sizes->width}}">
                            </form>
                        </li>
                    @endforeach
                </ul>


                <ul class="list-group mt-3 mb-3">
                    <li class="list-group-item"><h4>Tag</h4></li>
                    @foreach($tag as $tags)
                        <li class="list-group-item">
                            <form method="get" action="/">
                                <input type="submit" class="btn btn-link" value="{{$tags->name}}" name="keyword">
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-10">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</div>
</body>
</html>
