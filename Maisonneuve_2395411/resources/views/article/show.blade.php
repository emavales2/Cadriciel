@extends('layouts.layout')
@section('content')

<!-- ---- * Placement and color of content (directly on top of <main>) * ---- -->
<div class="h-100 p-5 pt-0">
    <!-- ---- * Placement of card component * ---- -->
    <div class="row justify-content-center m-6 mb-8">
        <!-- ---- * CARD COMPONENT * ---- -->
        <article class="card p-5 w-100 gap-4 border border-dark-subtle">  
            <header class="py-3 d-flex flex-column align-self-center text-center">
                <h2 class="section_title text-primary py-2">{{ $article->title }}</h2>
                <h3 class="fs-6 text-black-50 text-center fst-italic">@lang('lang.author_min') {{ $article->articleHasUser->userHasEtudiant->name }}</h3>
            </header>

            <!-- ---- * Card Body Content * ---- -->
            <div>
                <p>{{ $article->art_body }}</p>
            </div>
            
            <!-- ---- * Card footer: only visible to authorised user * ---- --> 
            @auth
            @if(auth()->user()->id === $article->user_id)
            <footer class="card-footer text-center pt-2 pb-4 border-top-0 d-flex gap-4 justify-content-center">
                <a href="{{ route('article.edit', $article->id)}}" class="btn btn-primary hover_dk_blue">@lang('lang.edit_b')</a>

                <button type="button" class="btn btn-primary hover_dk_blue" data-bs-toggle="modal" data-bs-target="#deleteModal">
                @lang('lang.delete_b')
                </button> 

                <button class="btn btn-primary hover_dk_blue">
                <a class="nav-link text-light text-decoration-none fw-light" href="{{route('dashboard')}}">@lang('lang.back_b')</a>
                </button>       
            </footer>
            @endif
        @endauth
        </article>
        <!-- ---- * END Card Component * ---- -->

        <!-- ---- * DELETE MODAL * ---- -->
        <!-- ---- * To confirm delete from authorised user * ---- --> 
        <dialog class="bg-transparent modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            
            <div class="modal-dialog">

                <article class="modal-content">
                    <header class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.del_record_tit')</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </header>

                    <p class="modal-body">
                        @lang('lang.del_rec_conf')
                    </p>

                    <footer class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.no_b')</button>
                        <form method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Effacer" class="btn btn-danger">
                        </form>
                    </footer>
                </article>
            </div>
        </dialog>
        <!-- ---- * END Delete Modal * ---- -->
    </div>
</div>

@endsection