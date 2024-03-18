@extends('layouts.layout')
@section('content')

<!-- ---- * Placement and color of content (directly on top of <main>) * ---- -->
<div class="h-100 p-5">
    <!-- ---- * Placement of index card + header elements * ---- -->
    <div class="d-flex flex-column gap-4 align-items-center mb-8">
        <header>
            <h2 class="section_title text-primary">@lang('lang.art_index_title')</h2>
        </header>

        <button class="btn btn-primary mb-4 hover_dk_blue">
            <a class="nav-link text-light text-decoration-none fw-light" href="{{route('article.create')}}">@lang('lang.new_art_b')</a>
        </button>

        <!-- ---- * INDEX CARD (table + pagination) * ---- -->
        <article class="border border-dark-subtle p-5 rounded-5 d-flex flex-column align-items-center">
            <table class="table table-hover m-5 mt-0 pt-5">
                <thead>
                    <tr>
                        <th class="px-1 fw-bold col-30ch text_dk_blue">@lang('lang.art_title')</th>
                        <th class="fw-bold col-20ch px-2 text_dk_blue">@lang('lang.author')</th>
                        <th class="fw-bold px-2 text-center text_dk_blue">@lang('lang.date')</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($articles as $article)
                        <tr class="p-2">
                            <td class="col-30ch ps-1 pe-2">
                                <a href="{{ route('article.show', $article->id)}}" class="text-decoration-none">{{ $article->title }}</a>
                            </td>                             
                            <!-- Ma version de PHP est trop vieille pour pouvoir utiliser le null-safe -->
                            <!-- Idéalement, écrire etudiantHasVille?->name -->
                            <td class="col-20ch px-2">{{ $article->articleHasUser->userHasEtudiant->name }}</td>   
                            <td class="px-2 text-center">{{ $article->created_at->format('d/m/Y') }}</td> 
                        </tr>

                        @empty
                        <tr>
                            <td class="text-danger">@lang('lang.no_art')</td>                           
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- ---- * Pagination * ---- -->
            <footer>    
                <!-- This changes the default tailwind pagination for whatever i choose out of the vendor/pagination folder. I did have to create a pagination.php in the config folder to change the default, though -->
                {{ $articles->links('vendor.pagination.simple-bootstrap-4') }}
            </footer>
        </article>
        <!-- ---- * END Index Card * ---- -->
    </div>
</div>

@endsection