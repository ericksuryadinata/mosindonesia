<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>MOS INDONESIA PANEL</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="{{url('website/css/plugins-css.css')}}" />

    <!-- Typography -->
    <link rel="stylesheet" type="text/css" href="{{url('website/css/typography.css')}}" />

    <!-- Shortcodes -->
    <link rel="stylesheet" type="text/css" href="{{url('website/css/shortcodes/shortcodes.css')}}" />

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="{{url('website/css/style.css')}}" />

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="{{url('website/css/responsive.css')}}" />

</head>

<body>
    <div class="wrapper">
        <div id="pre-loader">
            <img src="{{url('website/images/loader/loader-21.gif')}}" alt="">
        </div>

        <section class="height-100vh d-flex align-items-center page-section-ptb login login-gradient">
            <div class="container">
                <div class="row no-gutters justify-content-center">
                    <div class="col-lg-4 col-md-6 white-bg">
                        <div class="login-fancy pb-40 clearfix">
                            <form action="{{route('admin.auth.process-login')}}" method="post">
                                @csrf
                                <center>
                                    <img src="{{asset('website/images/logo.png')}}"
                                        style="height: 120px; padding-bottom: 20px">
                                </center>
                                <div class="section-field mb-20">
                                    <label class="mb-10" for="name">Username* </label>
                                    <input id="name"
                                        class="web form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                                        type="text" placeholder="username" name="username" value="{{old('username')}}"
                                        autofocus>
                                    @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="section-field mb-20">
                                    <label class="mb-10" for="Password">Password* </label>
                                    <input id="Password"
                                        class="Password form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        type="password" placeholder="Password" name="password">
                                    @if($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <button class="button" type="submit">Log In &nbsp;<i class="fa fa-check"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- jquery -->
    <script src="{{url('website/js/jquery-3.3.1.min.js')}}"></script>

    <!-- plugins-jquery -->
    <script src="{{url('website/js/plugins-jquery.js')}}"></script>

    <!-- plugin_path -->
    <script>
        var plugin_path = '{{url("website/js/")}}/';

    </script>

    <!-- custom -->
    <script src="{{url('website/js/custom.js')}}"></script>


</body>

</html>
