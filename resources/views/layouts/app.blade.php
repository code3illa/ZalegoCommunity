@if(!Auth::guest())
    @if(Auth::user()->admin==1)
        <script type="text/javascript">
            window.location = "{{ url('/zc-admin') }}"
        </script>
    @else

    @endif
        @endif
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" style="font-family: 'Century Schoolbook L'; color: #1d68a7;">
                <strong>{{ config('app.name', 'Laravel') }}</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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

                        <li class="nav-item btn btn-outline-info">
                            <a class="nav-link" href="{{ route('login') }}" style="font-family: 'Century Schoolbook L';"><strong>{{ __('Login') }}</strong></a>
                        </li>&nbsp;


                        @if (Route::has('register'))
                            <li class="nav-item btn btn-outline-primary">
                                <a class="nav-link" href="{{ route('register') }}" style="font-family: 'Century Schoolbook L'"><strong>{{ __('Register') }}</strong></a>
                            </li>
                        @endif
                    @else

                        <li class="nav-item">
                            <a class="nav-link" href="" data-toggle="modal" data-target="#quizModal">Add Question</a>
                        </li>


                        <!-- Modal -->
                        <div id="quizModal" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-primary" style="padding-left: 21px;">Question</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" action="{{ url('/ask-question') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <div class="form-group">
                                                <label class="">Title:</label>
                                                <input type="text" class="form-control col-md-6" name="title" required />
                                            </div>

                                            <div class="form-group">
                                                <label class="">Question:</label>
                                                <textarea rows="7" class="form-control" name="question" required  placeholder="Post a Question..."></textarea>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>

                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>


                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user-profile', Auth::user()->id) }}">
                                    Profile

                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">

            @yield('content')
        </div>
    </main>
</div>





</body>
</html>
