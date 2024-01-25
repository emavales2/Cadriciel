@extends('layouts.layout')
@section('content')

    <div class="col-md-6 d-flex flex-column align-items-center border border-dark-subtle p-5 rounded-5 mt-5 mw-40em m-auto">
                
        <form method="post">
            @method('put')
            @csrf
            <header class="text-center py-2 fw-bold fs-2em text-primary">
            @lang('lang.mod_profile')
            </header>
            <section class="d-flex flex-column gap-4 py-4">
                <article class="control-group col-12">
                    <label for="name">@lang('lang.name')</label>
                    <input type="text" id="name" name="name" class="form-control mt-2" value="{{ $etudiant->name}}">
                </article>

                <article class="control-group col-12">
                    <label for="address">@lang('lang.address')</label>
                    <input type="text" id="address" name="address" class="form-control mt-2" value="{{ $etudiant->address}}">
                </article>

                <article class="control-group col-12">
                    <label for="phone">@lang('lang.phone')</label>
                    <input type="tel" id="phone" name="phone" class="form-control mt-2" value="{{ $etudiant->phone}}">
                </article>

                <article class="control-group col-12">
                    <label for="email">@lang('lang.email')</label>
                    <input type="email" id="email" name="email" class="form-control mt-2" value="{{ $etudiant->etudiantHasUser->email }}">
                </article>

                <article class="control-group col-12">
                    <label for="birthday">@lang('lang.birthdate')</label>
                    <input type="date" id="birthday" name="birthday" class="form-control mt-2" value="{{ $etudiant->birthday}}">
                </article>
                
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

            <footer class="card-footer text-center pt-2">
                <input type="submit" value="@lang('lang.save_b')" class="btn btn-primary">
                <button class="btn btn-primary">
                    <a class="nav-link text-light text-decoration-none fw-light hover_blue" href="{{route('dashboard')}}">@lang('lang.cancel_b')</a>
                </button>
            </footer>
        </form>            
    </div>
@endsection