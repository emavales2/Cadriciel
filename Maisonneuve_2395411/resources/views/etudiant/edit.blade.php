@extends('layouts.layout')
@section('content')

<!-- ---- * Placement and color of content (directly on top of <main>) * ---- -->
<div class="h-100 p-5 pt-0">
    <!-- ---- * Placement of card component * ---- -->
    <div class="row justify-content-center m-6 mb-8">
        <!-- ---- * CARD COMPONENT * ---- -->
        <article class="card col-md-6 dk_blue text-light p-3">
            <!-- ---- * Success dialog if article edited * ---- -->  
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
                
            <form method="post" class="w-100">
                @method('put')
                @csrf
                <header class="section_title text-primary py-2">
                    @lang('lang.mod_profile')
                </header>

                <!-- ---- * Card Body Content * ---- -->
                <section class="card-body px-5 d-flex flex-column gap-4">
                    <!-- ---- * Input Field + Error Validation * ---- -->
                    <article class="control-group col-12">
                        <label for="name">@lang('lang.name')</label>
                        <input type="text" id="name" name="name" class="form-control mt-2" value="{{ $etudiant->name}}">

                        @if ($errors->has('title'))
                        <div class="text-danger mt-2">
                            {{$errors->first('name')}}
                        </div>
                        @endif
                    </article>

                    <!-- ---- * Input Field * ---- -->
                    <article class="control-group col-12">
                        <label for="address">@lang('lang.address')</label>
                        <input type="text" id="address" name="address" class="form-control mt-2" value="{{ $etudiant->address}}">
                    </article>

                    <!-- ---- * Input Field * ---- -->
                    <article class="control-group col-12">
                        <label for="phone">@lang('lang.phone')</label>
                        <input type="tel" id="phone" name="phone" class="form-control mt-2" value="{{ $etudiant->phone}}">
                    </article>

                    <!-- ---- * Input Field + Error Validation * ---- -->
                    <article class="control-group col-12">
                        <label for="email">@lang('lang.email')</label>
                        <input type="email" id="email" name="email" class="form-control mt-2" value="{{ $etudiant->etudiantHasUser->email }}">

                        @if ($errors->has('title'))
                        <div class="text-danger mt-2">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                    </article>

                    <!-- ---- * Input Field * ---- -->
                    <article class="control-group col-12">
                        <label for="birthday">@lang('lang.birthdate')</label>
                        <input type="date" id="birthday" name="birthday" class="form-control mt-2" value="{{ $etudiant->birthday}}">
                    </article>
                    
                    <!-- ---- * Input Field * ---- -->
                    <article class="control-group col-12">
                        <label for="ville">@lang('lang.city')</label>
                        <select id="ville" name="ville_id" class="form-control mt-2">                    
                            <option value=null>@lang('lang.select_city')</option> 
                            @foreach($villes as $ville)
                            <option value="{{ $ville->id }}" {{ $etudiant->ville_id == $ville->id ? 'selected' : '' }}>{{ $ville->name }}</option>                    
                            @endforeach                    
                        </select>
                    </article>
                </section>

                <!-- ---- * Card footer * ---- -->
                <footer class="card-footer text-center pt-2 pb-4 border-top-0 d-flex gap-4 justify-content-center">
                    <input type="submit" value="@lang('lang.save_b')" class="btn btn-primary hover_light hover_blue">

                    <button class="btn btn-primary hover_light hover_blue">
                        <a class="nav-link text-light text-decoration-none fw-light" href="{{route('dashboard')}}">@lang('lang.cancel_b')</a>
                    </button>
                </footer>
            </form> 
        </article>
        <!-- ---- * END Card Component * ---- -->
    </div>           
</div>
@endsection