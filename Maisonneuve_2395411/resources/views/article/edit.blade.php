@extends('layouts.layout')
@section('content')

<div class="col-md-6 d-flex flex-column align-items-center border border-dark-subtle p-5 rounded-5 mt-5 mw-40em m-auto">
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
                            
    <form method="post">
        @method('put')
        @csrf
        <header class="text-center py-2 fw-bold fs-2em text-primary">
        @lang('lang.mod_article')
        </header>

        <section class="d-flex flex-column gap-4 py-4">
            <article class="control-group col-12">
                <label for="title">@lang('lang.art_title')</label>
                <input type="text" id="title" name="title" class="form-control mt-2" placeholder="Title" value="{{ $article->title }}">
            
                @if ($errors->has('title'))
                <div class="text-danger mt-2">
                    {{$errors->first('title')}}
                </div>
                @endif
            </article>

            <article class="control-group col-12">
                <label for="art_body">@lang('lang.art_body')</label>
                <input type="art_body" id="art_body" name="art_body" class="form-control mt-2" placeholder="content" value="{{ $article->art_body }}">

                @if ($errors->has('art_body'))
                <div class="text-danger mt-2">
                    {{$errors->first('art_body')}}
                </div>
                @endif
            </article>
        </section>
        
        <footer class="card-footer text-center pt-2">
            <input type="submit" value="@lang('lang.save_b')" class="btn btn-primary">
            <button class="btn btn-primary">
                <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{route('dashboard')}}">@lang('lang.cancel_b')</a>
            </button>
        </footer>
    </form>
</div> 

@endsection