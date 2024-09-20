<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>

            <h3>REGISTER NOW</h3>

            <form class="m-t" role="form" action="index.html">
                <div class="form-group">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name"
                        required="">
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                        required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>
                <a class="btn btn-sm btn-white btn-block" href="{{ url('/') }}">Login to my account</a>
            </form>

        </div>
    </div>

    <!-- Mainly scripts -->
    <!-- Mainly scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>


</body>

</html>
