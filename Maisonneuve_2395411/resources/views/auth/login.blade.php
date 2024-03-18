@extends('layouts.layout')
@section('content')

<!-- ---- * Placement and color of content (directly on top of <main>) * ---- -->
<div class="h-100 p-5 pt-0">
    <!-- ---- * Placement of card component * ---- -->
    <div class="row justify-content-center m-6 mb-8">
        <!-- ---- * CARD COMPONENT * ---- -->
        <article class="card col-md-6 dk_blue text-light p-3">
            <form action="{{ route('login.authentication') }}" method="post">
                <!-- ---- * csrf generates token for form security on submission * ---- -->
                @csrf
                <header class="card-header section_title text-primary border-bottom-0">
                    Login
                </header>

                <section class="card-body px-5 d-flex flex-column gap-4">
                    <!-- ---- * Error Validation * ---- -->
                    @if(!$errors->isEmpty())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>    
                        @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- ---- * Card Body Content * ---- -->
                    <article class="control-group col-12">
                        <label for="username" class="pb-2">@lang('lang.username')</label>
                        <input type="email" id="username" name="email" class="form-control" value="{{ old('email')}}">
                        @if($errors->has('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </article>
                    <article class="control-group col-12">
                        <label for="password" class="pb-2">@lang('lang.password')</label>
                        <input type="password" id="password" name="password" class="form-control">
                        @if($errors->has('password'))
                            <span class="text-danger">{{$errors->first('password')}}</span>
                        @endif
                    </article>
                </section>

                <!-- ---- * Card Footer * ---- -->
                <footer class="card-footer py-3 text-center d-flex flex-column gap-3 border-top-0">
                    <input type="submit" value="@lang('lang.sign_in_b')" class="btn btn-primary mx-auto hover_light hover_blue">
                    <a class="mt-1" href="{{ route('forgot.password')}}">
                        <small>@lang('lang.forgot_pass')</small>
                    </a>                
                </footer>
                
            </form>
        </article>
        <!-- ---- * END Card Component * ---- -->
    </div>
</div>

@endsection