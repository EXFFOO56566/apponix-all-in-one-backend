@extends('master')
@section('change_password')
    

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>APPONIX-change password</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href={{ url('public/login/fonts/material-icon/css/material-design-iconic-font.min.css') }}>

    <!-- Main css -->
    <link rel="stylesheet" href={{ url('public/login/css/changepass.css') }}>
</head>

<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
{{-- success --}}
@if(Session::has('sussess')) 
<script>
     swal("Success", "", "success");
</script>
@endif
{{--  fail--}}
@if(Session::has('fail')) 
<script>
     swal("Fail", "", "error");
</script>
@endif
{{-- access --}}
@if(Session::has('access_msg')) 
<script>
     swal("Opps!", "You are not Authorised", "error");
</script>
@endif
            {{-- <h4 style="color: red">{{session()->get('fail')}}</h4>
            <h4 style="color: green">{{session()->get('success')}}</h4>
            <h4 style="color: red">{{session()->get('access_msg')}}</h4> --}}
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src={{ url('public/login/images/change_pass.svg') }} alt="sing up image"></figure>
                        {{-- <a href="#" class="signup-image-link">Create an account</a> --}}
                    </div>

                    <div class="signin-form">
                        
                        <h2 style="font-size: 30px" class="form-title">Change Password</h2>
                        <form action={{ url('changePassword') }} method="post" class="register-form" id="login-form">
                            @csrf
                           
                            <div class="form-group">
                                <label for="old_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="old_pass" id="old_pass" placeholder=" Enter Old Password" required autofocus/>
                            </div>
                            <h4 style="color: red">{{session()->get('old_pass')}}</h4>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Create New password" required/>
                            </div>
                            <div class="form-group">
                                <label for="cpassword"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="cpassword" id="cpassword" placeholder="Conform password" required/>
                            </div>
                            <h4 style="color: red">{{session()->get('c_pass')}}</h4>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Submit" />
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>




    </div>

    <!-- JS -->
    <script src={{ url('public/loginvendor/jquery/jquery.min.js') }}></script>
    <script src={{ url('public/login/js/main.js') }}></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
@endsection