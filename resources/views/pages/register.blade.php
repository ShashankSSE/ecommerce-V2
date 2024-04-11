@extends('components.app')
@section('title', 'Patakha | Create new account')
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
        margin-bottom: 100px!important;
    }
    .errors{
        padding: 10px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="login-container">
                <form class="login-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <h2>Create new account</h2>
                    <p><a href="{{ route('login') }}">Already have an account, login here</a></p>
                    <div class="input-group">
                        <input type="text" id="name" name="name" placeholder="Full name" required autofocus autocomplete="name">                                        
                    </div>
                    <div class="input-group">
                        <input type="text" id="email" name="email" placeholder="Email" required autofocus autocomplete="email">                    
                    </div>
                    <div class="input-group">
                        <input type="text" id="password" name="password" placeholder="Password" required autofocus autocomplete="new-password">                    
                    </div>
                    <div class="input-group">
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required >                    
                    </div>
                    <div class="errors">
                        <p style="color:red;">
                            @if($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                    <span>{{ $error }}</span>
                                @endforeach
                            @endif
                        </p>
                        <p style="color:red;">
                            @if($errors->has('email'))
                                @foreach($errors->get('email') as $error)
                                    <span>{{ $error }}</span>
                                @endforeach
                            @endif
                        </p>
                        <p style="color:red;">
                            @if($errors->has('password'))
                                @foreach($errors->get('password') as $error)
                                    <span>{{ $error }}</span>
                                @endforeach
                            @endif
                        </p>
                        <p style="color:red;">
                            @if($errors->has('password_confirmation'))
                                @foreach($errors->get('password_confirmation') as $error)
                                    <span>{{ $error }}</span>
                                @endforeach
                            @endif
                        </p>
                    </div>
                    <button type="submit" >{{ __('Register Yourself') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
 
@endsection