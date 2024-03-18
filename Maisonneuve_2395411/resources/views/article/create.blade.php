@extends('layouts.layout')
@section('content')

<!-- ---- * Placement and color of content (directly on top of <main>) * ---- -->
<div class="h-100 p-5 pt-0">
    <!-- ---- * Placement of card component * ---- -->
    <div class="row justify-content-center m-6 mb-8">
        <!-- ---- * Card component * ---- -->
        <article class="card col-md-6 dk_blue text-light p-3">
            <!-- ---- * Success dialog if article created * ---- -->     
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
                                    
            <form method="post" class="w-100">
                @csrf
                <header class="section_title text-primary py-2">
                    @lang('lang.new_art_title')
                </header>

                <section class="card-body px-5 d-flex flex-column gap-4">
                    <!-- ---- * Input Field + Error Validation * ---- -->
                    <article class="control-group col-12">
                        <label for="title">@lang('lang.art_title')</label>
                        <input type="text" id="title" name="title" class="form-control mt-2" value="{{old('title')}}">
                    
                        @if ($errors->has('title'))
                        <div class="text-danger mt-2">
                            {{$errors->first('title')}}
                        </div>
                        @endif
                    </article>

                    <!-- ---- * Text Field + Error Validation * ---- -->
                    <article class="control-group col-12">
                        <label for="art_body">@lang('lang.art_body')</label>
                        <textarea type="text" id="art_body" name="art_body" class="form-control mt-2" rows="10" style="height: 300px;"> {{old('art_body')}}</textarea>

                        @if ($errors->has('art_body'))
                        <div class="text-danger mt-2">
                            {{$errors->first('art_body')}}
                        </div>
                        @endif
                    </article>
                </section>
                
                <!-- ---- * Card footer * ---- -->
                <footer class="card-footer text-center pt-2 pb-4 border-top-0 d-flex gap-4 justify-content-center">
                    <input type="submit" value="@lang('lang.post_b')" class="btn btn-primary hover_light hover_blue">

                    <button class="btn btn-primary hover_light hover_blue">
                        <a class="text-light text-decoration-none fw-light" href="{{route('dashboard')}}">@lang('lang.cancel_b')</a>
                    </button>   
                </footer>
            </form>
        </article>
    </div>
</div> 

@endsection