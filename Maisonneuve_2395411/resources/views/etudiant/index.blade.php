@extends('layouts.layout')
@section('content')

<div class="row">
    <div >

        
            <table class="table-auto">
                <thead>
                    <tr>
                        <th>Étudiant</th>
                        <th>Ville</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($etudiants as $etudiant)
                        <tr>
                            <td><a href="{{ route('etudiant.show', $etudiant->id)}}" class="text-decoration-none">{{ $etudiant->name }}</a></td>                             
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
            {{ $etudiants}}
        

    </div>
</div>
@endsection