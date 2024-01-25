@extends('layouts.layout')
@section('content')


<div class="d-flex flex-column align-items-center">
    <header class="m-5">
        <h2 class="text-center pt-5 fw-bold fs-3em text-primary">@lang('lang.art_index_title')</h2>
    </header>

    <button class="btn btn-primary mb-4">
        <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{route('article.create')}}">@lang('lang.new_art_b')</a>
    </button>

    <div class="border border-dark-subtle p-5 rounded-5 d-flex flex-column align-items-center">
        <table class="table table-hover m-5 mt-0 pt-5 mw-40em">
            <thead>
                <tr>
                    <th class="px-1">@lang('lang.art_title')</th>
                    <th>@lang('lang.author')</th>
                    <th>@lang('lang.date')</th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $article)
                    <tr class="p-2">
                        <td class="px-1"><a href="{{ route('article.show', $article->id)}}" class="text-decoration-none">{{ $article->title }}</a></td>                             
                        <!-- Ma version de PHP est trop vieille pour pouvoir utiliser le null-safe -->
                        <!-- Idéalement, écrire etudiantHasVille?->name -->
                        <td>{{ $article->articleHasUser->userHasEtudiant->name }}</td>   
                        <td>{{ $article->created_at->format('d/m/Y') }}</td> 
                         
                    </tr>
                    @empty
                    <tr>
                        <td class="text-danger">@lang('lang.no_art')</td>                           
                    </tr>
                @endforelse
            </tbody>
        </table>

        <aside class="nowrap">    
            <!-- This changes the default tailwind pagination for whatever i choose out of the vendor/pagination folder. I did have to create a pagination.php in the config folder to change the default, though -->
            {{ $articles->links('vendor.pagination.bootstrap-4') }}
        </aside>
    </div>

</div>

@endsection