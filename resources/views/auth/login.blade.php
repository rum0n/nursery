@extends('layouts.master')


@section('title','Login')

@section('content')

    <div class="register_area col-lg-12" >
        <div class="register_area_form col-lg-6 col-lg-offset-3" >

            <center> <h3 style="color: black; font-size: 30px; margin-top: 15px; margin-bottom: 15px">Log In Here</h3></center>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                    <div class="form-group">
                        <input type="text" class="form_input form-control input-lg" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Your Email"/>
                    </div>
                </div>


                <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                    <div class="form-group">
                        <input type="password" class="form_input form-control input-lg" placeholder="Enter Your Password" name="password" required autocomplete="current-password"/>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-10 col-md-offset-1" >
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-10 col-md-offset-1">

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>



                <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                    <div class="form-group">
                        <input type="submit" class="top_button form-control btn-success input-lg" value="Log In"/>
                    </div>
                </div>

            </form>
        </div>
    </div>


@endsection
