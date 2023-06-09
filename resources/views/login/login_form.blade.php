<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>APPONIX-sign up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href={{ url('public/login/fonts/material-icon/css/material-design-iconic-font.min.css') }}>

    <!-- Main css -->
    <link rel="stylesheet" href={{ url('public/login/css/style.css') }}>
    
</head>

<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src={{ url('public/login/images/signin-image.jpg') }} alt="sing up image">
                        </figure>
                        {{-- <a href="#" class="signup-image-link">Create an account</a> --}}
                    </div>

                    <div class="signin-form">

                        <h2 class="form-title">Sign up</h2>
                        <form action={{ url('loginAdmin') }} method="post" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="username" required/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="password" required/>
                            </div>
                            
                            <h4 style="color: red">{{ session()->get('message') }}</h4>
                            {{-- <div class="form-group">
                                    <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                    <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                        me</label>
                                </div> --}}
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
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
    

</body>

</html>
