<!doctype html>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Quiz App') }}
                </a>
               
                <div class="navbar-nav ml-auto">
                    @if(!Auth::user())
                        <a class="btn btn-auth mr-2" href="{{ route('get.login') }}">Login</a>
                        <a class="btn btn-auth" href="{{ route('get.register') }}" >Register</a>
                    @else
                        <a class="btn btn-success mr-2" href="{{ route('myQuizes') }}">Welcome {{ Auth::user()->name }}</a>
                        <a class="btn btn-primary mr-2" href="{{ route('categoriesPage') }}" >Categories</a>
                        <a class="btn btn-primary mr-2" href="{{ route('createQuizQuestion') }}" >Create Quiz</a>
                        <a class="btn btn-primar     <a class="btn btn-auth mr-2" href="{{ route('logout') }}" >Logout</a>y mr-2" href="{{ route('showQuizesICreated') }}" >Quizes I Created</a>
                   
                    @endif
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        {{-- End of main --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        {{-- footer --}}
        <footer class="footer" style="position: fixed; bottom: 0; width: 100%; background-color: #fff; ">
            <div class="container">
              <div class="text-muted">
                <ul style="list-style: none; display: flex;">
                  <li class="mr-3"><a href="{{ route("aboutUs") }}" class ="btn btn-secondary">About Us</a></li>
                  <li><a href="{{ route("contactUs") }}"class ="btn  btn-secondary">Contact Us</a></li>
                  <a class="btn btn-primary" href="" style="position: fixed;bottom: 5px;right: 15px;z-index: 9999;">Enter Code</a>
                </ul>
              </div>
              
            </div>
          </footer> 
        {{-- end of footer --}}
    </div>
</body>
</html>
