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
            <a class="navbar-brand" href="{{ url('/Spotindex') }}">
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
                            <form action="/Edit_New_Article" method="get">
                                @csrf
                                <button class="btn btn-link" value="{{Auth::user()->id}}" name="userid" type="submit">
                                    {{--アイコンの色：rgb(166, 226, 137)--}}
                                    <img src="img/write.png" height="20px" width="20px"> New Article
                                </button>
                            </form>
                        </li>


                        <li class="nav-item">
                            <form action="/All_Article" method="get">
                                @csrf
                                <button type="submit" value="{{Auth::user()->id}}" name="userid" class="btn btn-link">
                                    My Article
                                </button>
                            </form>
                        </li>


                        <li class="nav-item">
                            <form action="/Edit_User" method="get">
                                @csrf
                                <button type="submit" value="{{Auth::user()->id}}" name="userid" class="btn btn-link">
                                    Setting
                                </button>
                            </form>
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
                                <a href="/admin/All_Address" class="dropdown-item">Address Management</a>
                                <a href="/admin/All_Item" class="dropdown-item">Item Management</a>
                                <a href="/admin/All_ItemComment" class="dropdown-item">Item Comment Management</a>
                                <a href="/admin/All_Order" class="dropdown-item">Order Management</a>
                                <a href="/admin/All_Peas" class="dropdown-item">Peas Management</a>
                                <a href="/admin/All_Size" class="dropdown-item">Size Management</a>
                                <a href="/admin/All_Spot" class="dropdown-item">Spot Management</a>
                                <a href="/admin/All_SpotComment" class="dropdown-item">Spot Comment Management</a>
                                <a href="/admin/All_User" class="dropdown-item">User Management</a>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 m-3">
                <form method="get" action="/Spotindex">
                    @csrf
                    {{--<input type="text" class="form-control m-3" placeholder="Keyword Search Enter!" name="keyword">--}}
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Spot Name / Creater Name / Address etc..."
                               aria-describedby="button-addon2" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search!</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-10">
                <main>
                    @yield('content')
                </main>
            </div>

            <div class="col-lg-2">
                <div class="row">

                    <a href="/">
                        <img src="img/gopazzle.png">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
