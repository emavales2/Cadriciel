@extends('layouts.layout')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form action="{{ route('login.authentication') }}" method="post">
                    @csrf
                    <div class="card-header display-6 text-center">
                    Login
                    </div>
                    <div class="card-body">
                        @if(!$errors->isEmpty())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>    
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="control-group col-12">
                            <label for="username">@lang('lang.username')</label>
                            <input type="email" id="username" name="email" class="form-control" value="{{ old('email')}}">
                            @if($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="control-group col-12">
                            <label for="password">@lang('lang.password')</label>
                            <input type="password" id="password" name="password" class="form-control">
                            @if($errors->has('password'))
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" value="@lang('lang.sign_in_b')" class="btn btn-success">
                        <div class="mt-1">
                            <a href="{{ route('forgot.password')}}">@lang('lang.forgot_pass')</a>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection