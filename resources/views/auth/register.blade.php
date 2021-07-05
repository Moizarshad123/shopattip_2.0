@extends('layouts.app')
@push('css')
    <style>
        #name_error_msg{
            color: rgb(173, 4, 4);
            font-size: 10px;
        }
        form .error {
        color: #ff0000;
        }
    </style>
@endpush
@section('content')
<section id="wrapper" class="login-register">
    <div class="login-box">
        <div class="white-box">
            <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('register') }}" name="registration">
                {{csrf_field()}}
                <h3 class="box-title m-b-20">Sign Up</h3>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                        <span id="name_error_msg"></span>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="password_confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary p-t-0">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                        <div class="social">
                            <a href="{{url('auth/facebook')}}" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                            <a href="{{url('auth/google')}}" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Already have an account? <a href="{{route('login')}}" class="text-primary m-l-5"><b>Sign In</b></a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function(){
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var confirmpassword = $('#password-confirm').val();

            var _name = 0;
            var _email = 0;
            var _password = 0;
            var _confirampassword = 0;


           // this function is to accept only email
    jQuery.validator.addMethod("accept", function(value, element, param) {
        return value.match(new RegExp("^" + param + "$"));
    },'please enter a valid email');

            $("form[name='registration']").validate({
                
                // Specify validation rules
                rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                name: {
                    required: true,
                    minlength: 5,
                    maxlength: 15
                },
                // lastname: "required",
                email: {
                    required: true,
                    // Specify that email should be validated
                    // by the built-in "email" rule
                    email: true,
                    maxlength: 40,
                    accept:"[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}" 
                },
                password: {
                    required: true,
                    minlength: 5
                },
                password_confirmation: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                }
                },
                // Specify validation error messages
                messages: {
                name:{
                    required:  "Please enter your firstname",
                    minlength: "Your name must be at least 5 characters long",
                    maxlength: " Your name must be less then 15 charachers"
                },
                // lastname: "Please enter your lastname",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                password_confirmation: {
                    required: "Please provide a confirm password",
                    minlength: "Your confirm password must be same to the password"
                },
                email: {
                    required: "Please enter a valid email address",
                    accept:"Please provide valid email"
                },
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                form.submit();
                }
            });

        });
    </script> 
@endpush


