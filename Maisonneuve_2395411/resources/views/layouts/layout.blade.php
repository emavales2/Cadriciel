<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name')}}</title>
        
        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

        <!-- CDN mdbootstrap flags -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">

        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Borel&display=swap" rel="stylesheet">
    </head>


    <body class="container h-100 bg-primary bg-gradient">
        <div class="container-fluid h-100 d-flex flex-column">
            
            <!-- ------ * NAVIGATION * ------ -->
            <nav class="navbar navbar-expand-lg dk_blue px-2 py-3">
                <div class="container-fluid d-flex gap-4">
                    
                <!-- ------ * Logo + name * ------ -->
                    <a href="{{ url('/')}}" class="align-items-center d-flex flex-row gap-4 text-decoration-none">              
                        <img class="mh-4em" src="{{ asset('assets/img/College-de-Maisonneuve.svg') }}" alt="">                
                        <h3 class="logo_title d-flex align-items-end">{{ config('app.name')}}</h3>            
                    </a> 
                    
                    <!-- ------ * Toggle button (responsive menu) * ------ -->
                    <button class="custom-toggler navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- ------ * php $locale manages language of page content * ------  -->
                    @php $locale = session()->get('locale') @endphp

                    <!-- ------ * AUTH-DEPENDENT NAV COMPONENTS * ------ -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav w-100 mb-2 justify-content-end gap-5 mb-lg-0 align-items-end">

                            <!-- ------ * Visible before sign-in * ------ -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{ route('login') }}">login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{ route('registration') }}">@lang('lang.register_user') </a> 
                            </li>

                            <!-- ------ * Visible if sign-in is successful * ------ -->
                            @else 
                            <li class="nav-item">
                                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{ route('dashboard') }}">@lang('lang.dashboard')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{ route('etudiant.show', Auth::user()->id) }}">@lang('lang.profile') </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{ route('article.create') }}">@lang('lang.new_article') </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{ route('logout') }}">logout</a>
                            </li>
                            @endguest

                            <!-- ------ * Visible at all times * ------ -->
                            <li class="nav-item">
                                <a class="text-light fw-light hover_blue nav-link @if($locale=='en') border-bottom @endif" href="{{route('lang', 'en')}}">@lang('lang.eng')<i class="flag flag-uk p-3"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="text-light fw-light hover_blue nav-link @if($locale=='fr') border-bottom @endif" href="{{route('lang', 'fr')}}">@lang('lang.fr')<i class="flag flag-france p-3"></i></a> 
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- ------ * END Navigation * ------ -->
            
            <main class="container-fluid h-100 bg-white">
                <!-- ------ * SUCCESS ALERT: will appear when user is successfully signed in * ------ -->
                <div class="m-7 mb-0 ">
                    @if(session('success'))
                    <aside class="alert alert-success alert-dismissible fade show mb-6" role="alert">
                        <strong>{{ session('success')}}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </aside>
                    @endif

                    <!-- ------ * User-specific greeting * ------ -->
                    @auth
                    <h1 class="greeting">@lang('lang.hello') {{Auth::user()->userHasEtudiant->name}}!</h1>
                    @endauth
                </div>
                
                <!-- ------ * INJECTION OF MAIN CONTENT (SPECIFIC TO PAGE) * ------ -->
                @yield('content')
            </main>

            <footer class="text-light d-flex align-self-center pt-2 pb-2">
                <small>@lang('lang.footer')</small>
            </footer>
        </div>

        <!-- ------ * Bootstrap script * ------ -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>   
</html>