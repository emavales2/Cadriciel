<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name')}}</title>
        
        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    </head>

    <body class="m-6">
 

            <header class="flex flex-row justify-between max-h-20">            
                <span class="flex flex-row justify-between gap-4">
                    <!-- <figure> -->
                        <img class="max-h-full" src="{{ asset('assets/img/College-de-Maisonneuve.svg') }}" alt="">
                    <!-- </figure>                    -->
                    <h3 class="text-3xl">{{ config('app.name')}}</h3>
                </span>  
                
                <nav class="flex flex-row justify-between gap-8">                
                    <button type="button">
                        <a href="{{ route('etudiant.index')}}" class="font-normal hover:font-bold">Voir etudiants</a>
                    </button>

                    <button type="button">
                        <a href="{{ route('etudiant.create')}}">Ajouter etudiant</a>
                    </button>               
                </nav>
            </header>
            
            <main class="m-8">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success')}}</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @yield('content')
            </main>

       
    </body>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</html>