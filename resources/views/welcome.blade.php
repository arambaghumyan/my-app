@extends('layouts.master')
@section('content')
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-6 col-xl-5">
            <h1 >Sign in</h1>
            <p class="sign-in-msg mt-5">Sign in and start managing your candidates!</p>
            <div class="row">
                <div class="col-sm-12 col-lg-8 offset-lg-2">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mt-4">
                          <input type="text" name="login" placeholder="Login" required autofocus>
                            @error('login')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-4">
                          <input type="password" name="password"  placeholder="Password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if(Session::has('fail'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ Session::get('fail') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group mt-4 footer-part">
                            <div class="row">
                                <div class="col-md-6 text-start">
                                    <label>
                                         <div class="form-checkbox">
                                          <input class="checkbox" type="checkbox" id="checkbox1">
                                          <label for="checkbox1" tabindex="1">Remember me</label>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-md-6 text-end forgot-password-part">
                                    Forgot password?
                                </div>
                            </div>
                            
                        </div>
                        <button class="sign-in-btn mt-4" type="sumbit">Login</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection