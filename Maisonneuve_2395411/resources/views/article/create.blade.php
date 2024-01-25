@extends('layouts.layout')
@section('content')

<div class="col-md-6 d-flex flex-column align-items-center border border-dark-subtle p-5 rounded-5 mt-5 mw-40em m-auto">
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
                            
    <form  method="post">
        @csrf
        <header class="text-center py-2 fw-bold fs-2em text-primary">
        @lang('lang.new_art_title')
        </header>

        <section class="d-flex flex-column gap-4 py-4">
            <article class="control-group col-12">
                <label for="title">@lang('lang.art_title')</label>
                <input type="text" id="title" name="title" class="form-control mt-2" value="{{old('title')}}">
            
                @if ($errors->has('title'))
                <div class="text-danger mt-2">
                    {{$errors->first('title')}}
                </div>
                @endif
            </article>

            <article class="control-group col-12">
                <label for="art_body">@lang('lang.art_body')</label>
                <textarea type="text" id="art_body" name="art_body" class="form-control mt-2 rows="10" style="height: 300px;"> {{old('art_body')}}</textarea>

                @if ($errors->has('art_body'))
                <div class="text-danger mt-2">
                    {{$errors->first('art_body')}}
                </div>
                @endif
            </article>
        </section>
        
        <footer class="card-footer text-center pt-2">
            <input type="submit" value="@lang('lang.post_b')" class="btn btn-primary">
        </footer>
    </form>
</div> 

@endsection