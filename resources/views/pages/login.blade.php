@extends('components.app')
@section('title', 'succu | Login')
@section('meta_description', '')
@section('meta_keywords','')
@section('content')
<style>
    .login-form{
        display: flex;
        flex-direction: column;
        align-items: center;
        background: #dfdbdb2e;
        border-radius: 10px;
        box-shadow: 1px 2px 13px #ccc;
        margin: 50px;
        margin-bottom: 100px;
    }
    .text-red{
        color: red;
        font-weight: 600;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        <div class="login-container">
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <h2>Login</h2>
                <p><a href="{{ route('register') }}">Create new account</a></p>
                <div class="input-group">
                    <input type="email" id="email" name="email" placeholder="Username" value="{{old('email')}}" required autofocus autocomplete="username">                    
                </div>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="password" required autocomplete="current-password" >
                </div>
                @if($errors->has('email'))
                    <div class="mt-2 text-red">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                @if($errors->has('password'))
                    <div class="mt-2 text-red">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <button type="submit" >{{ __('Log in') }}</button>
                @if (Route::has('password.request'))
                    <div class="bottom-text">
                        <!-- <p>Don't have an account? <a href="#">Sign Up</a></p> -->
                        <p><a href="{{ route('password.request') }}">Forgot password?</a></p>
                    </div>
                @endif
            </form>
        </div>
        </div>
    </div>
</div>
 
@endsection