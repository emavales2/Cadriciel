<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name')}}</title>
        
        <!-- CSS -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>

    <body class="container-fluid">

        <header class="d-flex flex-row justify-content-between p-4 mh-7em dk_blue">            
            @php $locale = session()->get('locale') @endphp
            <a class="navbar-brand text-light text-decoration-none " href="#">@lang('lang.text_hello') {{Auth::user() ? Auth::user()->name : "Guest"}}</a>

            <a href="{{ url('/')}}" class="d-flex flex-row justify-content-between mw-auto gap-4 text-decoration-none">              
                <img class="" src="{{ asset('assets/img/College-de-Maisonneuve.svg') }}" alt="">                
                <h3 class="header_title d-flex align-items-end">{{ config('app.name')}}</h3>            
            </a>  
            
            <nav class="d-flex flex-row justify-content-between gap-8 align-items-end mb-2 gap-5">   
                @guest
                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{route('login')}}">login</a>
                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{route('registration')}}">créer compte</a>             
                
                @else
                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{ route('etudiant.index')}}">voir etudiants</a>
                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{route('article.create')}}">créer article</a>
                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{route('logout')}}">Logout</a>
                @endguest
                
            </nav>
        </header>
        
        <main class="m-5">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success')}}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @yield('content')
        </main>
    
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>