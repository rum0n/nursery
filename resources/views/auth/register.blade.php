@extends('layouts.master')

@section('title','Nursery')

@section('content')



    <div class="register_area col-lg-12" >
        <div class="register_area_form col-lg-6 col-lg-offset-3" >

            <center> <h3 style="color: black; font-size: 30px; margin-top: 15px; margin-bottom: 15px">Create an Account</h3></center>


            <form action="{{ route('register') }}" method="post">
                @csrf

                <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                    <div class="form-group">
                        <input type="text" name="name" value="{{ old('name') }}" class="form_input form-control input-lg" placeholder="Enter Your Name" autocomplete="name"/>
                    </div>
                    <div class="error"></div>
                </div>

                <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                    <div class="form-group">

                        <select class="form-control input-lg" type="text" id="user_type" name="user_type" required autofocus>
                            <option value="">Select User Type</option>
                            @foreach($roles_id as $role_id)
                                <option value="{{ $role_id->id }}">{{ $role_id->name }}</option>
                            @endforeach

                        </select>

                        {{--<div class="error"></div>--}}
                    </div>
                </div>

                <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email') }}" class="form_input form-control input-lg" placeholder="Enter Your Email" autocomplete="email"/>
                    </div>
                    <div class="error"></div>
                </div>


                <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                    <div class="form-group">
                        <input type="password" name="password"  value="" class="form_input form-control input-lg" placeholder="Enter Your Password" autocomplete="new-password"/>
                    </div>
                    <div class="error"></div>
                </div>


                <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                    <div class="form-group">
                        <input type="password" id="password-confirm" name="password_confirmation"  value="" class="form_input form-control input-lg" placeholder="Confirm Your Password" autocomplete="new-password"/>
                    </div>
                    <div class="error"></div>
                </div>

                <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                    <div class="form-group">
                        <input type="submit" class="top_button form-control btn-success input-lg" value="Submit"/>
                    </div>
                </div>

            </form>
        </div>
    </div>



@endsection
