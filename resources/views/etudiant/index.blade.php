@extends('layouts.layout')
@section('content')

<div class="d-flex flex-column align-items-center">
    <header class="m-5">
        <h2 class="text-center pt-5 fw-bold fs-3em text-primary">Liste d'Étudiant|es</h2>
    </header>

    <div class=" border border-dark-subtle p-5 rounded-5 d-flex flex-column align-items-center">
        <table class="table table-hover m-5 mt-0 pt-5 mw-40em">
            <thead>
                <tr>
                    <th class="px-1">Étudiant</th>
                    <th >Ville</th>
                </tr>
            </thead>
            <tbody>
                @forelse($etudiants as $etudiant)
                    <tr class="p-2">
                        <td class="px-1"><a href="{{ route('etudiant.show', $etudiant->id)}}" class="text-decoration-none">{{ $etudiant->name }}</a></td>                             
                        <!-- Ma version de PHP est trop vieille pour pouvoir utiliser le null-safe -->
                        <!-- Idéalement, écrire etudiantHasVille?->name -->
                        <td>{{ $etudiant->etudiantHasVille->name }}</td>                       
                    </tr>
                    @empty
                    <tr>
                        <td class="text-danger">Aucun etudiant!</td>                           
                    </tr>
                @endforelse
            </tbody>
        </table>

        <aside class="nowrap">    
            <!-- This changes the default tailwind pagination for whatever i choose out of the vendor/pagination folder. I did have to create a pagination.php in the config folder to change the default, though -->
            {{ $etudiants->links('vendor.pagination.bootstrap-4') }}
        </aside>
    </div>

</div>
@endsection