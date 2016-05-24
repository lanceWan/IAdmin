@extends('layouts.login')

@section('content')
@if (isset($errors) && count($errors) > 0 )
<div class="alert alert-danger">
    <!-- <button class="close" data-close="alert"></button> -->
    @foreach($errors->all() as $error)
        <span class="help-block"><strong>{{ $error }}</strong></span>
    @endforeach
</div>
@endif
<form class="login-form" action="{{url('/login')}}" method="post">
    {!! csrf_field() !!}
    <h3 class="form-title">Sign In</h3>
    
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">{{trans('auth.email')}}</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" placeholder="email" name="email" value="{{old('email')}}" /> </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">{{trans('auth.password')}}</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="password" placeholder="Password" name="password" /> 
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">{{trans('auth.captcha')}}</label>
        <div class="input-group">
            <input id="newpassword" class="form-control" type="text" name="captcha" placeholder="captcha">
            <span class="input-group-btn">
                <img style="cursor: pointer;" src="{{captcha_src()}}" onclick="this.src='{{captcha_src()}}' + Math.random()">
            </span>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn green uppercase">{{trans('auth.login')}}</button>
        <label class="rememberme check">
            <input type="checkbox" name="remember" value="1" />{{trans('auth.remember')}}</label>
        <a href="{{ url('/password/reset') }}" id="forget-password" class="forget-password">Forgot Password?</a>
    </div>
    <div class="login-options">
        <h4>Or login with</h4>
        <!-- <ul class="social-icons">
            <li>
                <a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
            </li>
            <li>
                <a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
            </li>
            <li>
                <a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
            </li>
            <li>
                <a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
            </li>
        </ul> -->
    </div>
    <div class="create-account">
        <p>
            <a href="javascript:;" id="register-btn" class="uppercase">Create an account</a>
        </p>
    </div>
</form>
@endsection
