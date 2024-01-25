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
        @lang('lang.new_user_title')
        </header>

        <section class="d-flex flex-column gap-4 py-4">
            <article class="control-group col-12">
                <label for="name">@lang('lang.name')</label>
                <input type="text" id="name" name="name" class="form-control mt-2"  value="{{old('name')}}">
            
                @if ($errors->has('name'))
                <div class="text-danger mt-2">
                    {{$errors->first('name')}}
                </div>
                @endif
            </article>

            <article class="control-group col-12">
                <label for="email">@lang('lang.email')</label>
                <input type="email" id="email" name="email" class="form-control mt-2"  value="{{old('email')}}">

                @if ($errors->has('email'))
                <div class="text-danger mt-2">
                    {{$errors->first('email')}}
                </div>
                @endif
            </article>

            <article class="control-group col-12">
                <label for="password">@lang('lang.password')</label>
                <input type="password" id="password" name="password" class="form-control mt-2" >

                @if ($errors->has('password'))
                <div class="text-danger mt-2">
                    {{$errors->first('password')}}
                </div>
                @endif
            </article>

            <article class="control-group col-12">
                <label for="phone">@lang('lang.phone')</label>
                <input type="tel" id="phone" name="phone" class="form-control mt-2">
            </article>

            <article class="control-group col-12">
                <label for="address">@lang('lang.address')</label>
                <input type="text" id="address" name="address" class="form-control mt-2">
            </article>
                            
            <article class="control-group col-12">
                    <label for="birthday">@lang('lang.birthdate')</label>
                    <input type="date" id="birthday" name="birthday" class="form-control mt-2">
                </article>

            <article class="control-group col-12">
                <label for="ville">@lang('lang.city')</label>
                <select id="ville" name="ville_id" class="form-control mt-2">                    
                    <option value=null>@lang('lang.select_city')</option> 
                    @foreach($villes as $ville)
                    <option value="{{ $ville->id }}">{{ $ville->name }}</option>                       
                    @endforeach                    
                </select>
            </article>
        </section>
        
        <footer class="card-footer text-center pt-2">
            <input type="submit" value="@lang('lang.save_b')" class="btn btn-primary">
        </footer>
    </form>
</div> 

@endsection