<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>APPONIX-key auth</title>

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

                        
                        <h2 class="form-title">Authentication</h2>
                        <form action={{ url('keyAuth') }} method="post" class="keyform" id="key-form">
                            @csrf
                            <div class="form-group " >
                                <label for="app_key"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="app_key" id="app_key" placeholder="Enter Your Purchase key" />

                            </div>
                            <input type="hidden" name="username" value="{{ $username }}">
                            <div class="form-group " >
                                <label for="package"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="package" id="package" placeholder="Enter Package" />
                            </div>
                            <h4 style="color: red">{{ session()->get('message') }}</h4>
                           
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Submit" />
                            </div>
                        </form>
                        <br>
                        Note: If you have any query please contact us <br> Email : <a href="mailto:help@codderlab.com">help@codderlab.com</a><br> Whatsapp :<a href="https://api.whatsapp.com/send?phone=919909515320&text=Hi,%20Codderlab"> +91 99095 15320</a>
                        

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
