<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-token" content="{{csrf_token()}}">

    <title> Managers | Log in</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('admins/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admins/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('admins/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admins/dist/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('admins/plugins/iCheck/square/blue.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background-image:url('{{asset('admins/dist/img/topIllustration.svg')}}') ;
    background-repeat:no-repeat;
    ">
<div class="login-box">
    <div class="login-logo">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{route('admin.auth.loginAdmin')}}" method="post">
            @csrf

            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">

                <input type="email" class="form-control" placeholder="Email" name="email"
                       value="{{old('email') ? old('email') : ''}}">

                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))

                    <span class="help-block">

                            <strong>{{ $errors->first('email') }}</strong>

                    </span>

                @endif

            </div>

            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">

                <input type="password" class="form-control" placeholder="Password" name="password">

                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password'))

                    <span class="help-block">

                            <strong>{{ $errors->first('password') }}</strong>

                    </span>

                @endif

            </div>

            <div class="row">

                <div class="col-xs-8">

                    <div class="checkbox icheck">

                        <label>

                            <input type="checkbox" name="remember" {{old('remember') ? 'checked' : ''}}> Remember Me

                        </label>

                    </div>

                </div>

                <div class="col-xs-4">

                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

                </div>

            </div>

        </form>

    </div>

</div>


<!-- jQuery 3 -->

<script src="{{asset('admins/bower_components/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap 3.3.7 -->

<script src="{{asset('admins/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- iCheck -->

<script src="{{asset('admins/plugins/iCheck/icheck.min.js')}}"></script>

<script>

    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });

</script>

</body>

</html>
