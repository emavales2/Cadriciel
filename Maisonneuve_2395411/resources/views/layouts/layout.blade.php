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

    <body class=".container-fluid">

        <header class="d-flex flex-row justify-content-between p-4 mh-7em dk_blue">            
            <!-- <span class="d-flex flex-row justify-content-between mw-auto gap-4"> -->
            <a href="{{ url('/')}}" class="d-flex flex-row justify-content-between mw-auto gap-4 text-decoration-none">
                <!-- <aside class="mh-100"> -->
                    <img class="" src="{{ asset('assets/img/College-de-Maisonneuve.svg') }}" alt="">
                <!-- </aside>                    -->
                <h3 class="header_title d-flex align-items-end">{{ config('app.name')}}</h3>
            <!-- </span> -->
            </a>  
            
            <nav class="d-flex flex-row justify-content-between gap-8 align-items-end mb-2 gap-5">   
            <a class="text-light text-decoration-none fw-light hover_blue" href="{{route('login')}}">Login</a>             
                <!-- <button type="button"> -->
                    <a href="{{ route('etudiant.index')}}" class="text-light text-decoration-none fw-light hover_blue">Voir etudiants</a>
                <!-- </button>
                <button type="button"> -->
                    <a href="{{ route('etudiant.create')}}" class="text-light text-decoration-none fw-light hover_blue">Ajouter etudiant</a>
                <!-- </button>                -->
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