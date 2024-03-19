@extends('layouts.layout')
@section('content')

<!-- ---- * Placement and color of content (directly on top of <main>) * ---- -->
<div class="h-100 p-5 pt-0">
    <!-- ---- * Placement of card component * ---- -->
    <div class="row justify-content-center m-6 mb-8">
        <!-- ---- * CARD COMPONENT * ---- -->
        <article class="card col-md-6 dk_blue text-light p-3">
            <!-- ---- * Success dialog if account created * ---- -->    
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
             
            <!-- ---- * Card Body Content * ---- -->
            <form method="post" class="w-100">
                @csrf
                <header class="section_title text-primary py-3">
                    @lang('lang.new_user_title')
                </header>

                <section class="card-body px-5 d-flex flex-column gap-4">
                    <!-- ---- * Input Field + Error Validation * ---- -->
                    <article class="control-group col-12">
                        <label for="name">@lang('lang.name')</label>
                        <input type="text" id="name" name="name" class="form-control mt-2"  value="{{old('name')}}">
                    
                        @if ($errors->has('name'))
                        <div class="text-danger mt-2">
                            {{$errors->first('name')}}
                        </div>
                        @endif
                    </article>

                    <!-- ---- * Input Field + Error Validation * ---- -->
                    <article class="control-group col-12">
                        <label for="email">@lang('lang.email')</label>
                        <input type="email" id="email" name="email" class="form-control mt-2"  value="{{old('email')}}">

                        @if ($errors->has('email'))
                        <div class="text-danger mt-2">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                    </article>

                    <!-- ---- * Input Field + Error Validation * ---- -->
                    <article class="control-group col-12">
                        <label for="password">@lang('lang.password')</label>
                        <input type="password" id="password" name="password" class="form-control mt-2" >

                        @if ($errors->has('password'))
                        <div class="text-danger mt-2">
                            {{$errors->first('password')}}
                        </div>
                        @endif
                    </article>

                    <!-- ---- * Input Field (not required) * ---- -->
                    <article class="control-group col-12">
                        <label for="phone">@lang('lang.phone')</label>
                        <input type="tel" id="phone" name="phone" class="form-control mt-2">
                    </article>

                    <!-- ---- * Input Field (not required) * ---- -->
                    <article class="control-group col-12">
                        <label for="address">@lang('lang.address')</label>
                        <input type="text" id="address" name="address" class="form-control mt-2">
                    </article>
                    
                    <!-- ---- * Input Field + Error Validation * ---- -->
                    <article class="control-group col-12">
                        <label for="birthday">@lang('lang.birthdate')</label>
                        <input type="date" id="birthday" name="birthday" class="form-control mt-2">

                        @if ($errors->has('birthday'))
                        <div class="text-danger mt-2">
                            {{$errors->first('birthday')}}
                        </div>
                        @endif
                    </article>

                    <!-- ---- * Input Field + Error Validation * ---- -->
                    <article class="control-group col-12">
                        <label for="ville">@lang('lang.city')</label>
                        <select id="ville_id" name="ville_id" class="form-control mt-2">                    
                            <option value=null>@lang('lang.select_city')</option> 
                            @foreach($villes as $ville)
                            <option value="{{ $ville->id }}">{{ $ville->name }}</option>                       
                            @endforeach                    
                        </select>

                        @if ($errors->has('ville_id'))
                        <div class="text-danger mt-2">
                            {{$errors->first('ville_id')}}
                        </div>
                        @endif
                    </article>
                </section>
                
                <!-- ---- * Card Footer * ---- -->
                <footer class="card-footer text-center pt-2 pb-4 border-top-0">
                    <input type="submit" value="@lang('lang.save_b')" class="btn btn-primary hover_light hover_blue">
                </footer>
            </form>
        </article> 
        <!-- ---- * END Card Component * ---- -->
    </div>
</div>

@endsection