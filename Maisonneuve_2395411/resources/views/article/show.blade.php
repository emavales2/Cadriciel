@extends('layouts.layout')
@section('content')

  <div class="col-md-6 d-flex flex-column align-items-center border border-dark-subtle p-5 rounded-5 mt-5 mw-40em m-auto">      
    <header class="m-5 mt-0">
        <h2 class="text-center fw-bold fs-3em text-primary">{{ $article->title }}</h2>
    </header>
    <section>
      <p>{{ $article->art_body }}</p>
    </section>
    
    @auth
      @if(auth()->user()->id === $article->user_id)
      <aside class="d-flex flex-row gap-5 pt-4">
        <a href="{{ route('article.edit', $article->id)}}" class="btn btn-primary">@lang('lang.edit_b')</a>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">
        @lang('lang.delete_b')
        </button> 
        <button class="btn btn-primary">
          <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{route('dashboard')}}">@lang('lang.back_b')</a>
        </button>       
      </aside>
      @endif
  @endauth
  </div>
  

  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
  </div>
  @endsection