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

        <!--CDN mdbootstrap flags-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">
    </head>

    <body>

        <header class="d-flex flex-row justify-content-between p-4 mh-7em dk_blue">            
            
            <a href="{{ url('/')}}" class="d-flex flex-row justify-content-between mw-auto gap-4 text-decoration-none">              
                <img class="" src="{{ asset('assets/img/College-de-Maisonneuve.svg') }}" alt="">                
                <h3 class="header_title d-flex align-items-end">{{ config('app.name')}}</h3>            
            </a>  
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
aria-expanded="false" aria-label="Toggle navigation">
 <span class="navbar-toggler-icon"></span>
 </button>

            @php $locale = session()->get('locale') @endphp
            <nav class="d-flex flex-row justify-content-between gap-8 align-items-end mb-2 gap-5"> 

                @guest
                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{ route('login') }}">login</a>
                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{ route('registration') }}">@lang('lang.register_user') </a>             
                
                @else 
                <a class="navbar-brand text-light" href="#">
                    @lang('lang.hello') 
                    @if(Auth::check()) {{Auth::user()->userHasEtudiant->name}} @else Guest @endif
                </a>   
                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{ route('dashboard') }}">@lang('lang.dashboard')</a>         
                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{ route('etudiant.show', Auth::user()->id) }}">@lang('lang.profile') </a>
                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{ route('article.create') }}">@lang('lang.new_article') </a>
                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{ route('logout') }}">logout</a>
                @endguest

                <a class="text-light fw-light hover_blue nav-link @if($locale=='en') border-bottom @endif" href="{{route('lang', 'en')}}">@lang('lang.eng')<i class="flag flag-united-states p-3"></i></a>
                <a class="text-light fw-light hover_blue nav-link @if($locale=='fr') border-bottom @endif" href="{{route('lang', 'fr')}}">@lang('lang.fr')<i class="flag flag-france p-3"></i></a>
                
            </nav>
        </header>
        
        <main class="m-5">
            <!-- not sure what this is for, but if i delete it before implementing bilingual, nothing happens -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success')}}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <!-- ---- see up note ----- -->
            
            @yield('content')
        </main>
    
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>