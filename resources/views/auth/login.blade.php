<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SmartTimeKeeper| Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ URL::asset('bootstrap-3.3.4/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
         <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome-4.3.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ URL::asset('css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ URL::asset('i-check/all.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Smart</b>TimeKeeper</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        {!! Form::open(array('url' => 'auth/login')) !!}
        {!! Session::get('flash_message') !!}
          <div class="form-group has-feedback">
            {!! Form::email('email', Input::old('email'), array('class'=>'form-control', 'placeholder'=>'E-Mail Address')) !!}
            <?php echo $errors->first('email'); ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password'), Input::old('password')) !!}
                    <?php echo $errors->first('password'); ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        {!! Form::close() !!}

       <!-- <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div><!-- /.social-auth-links -->

        <p><a href="{!!URL::to('password/email')!!}">I forgot my password</a></p>
        <!-- //<a href="#">I forgot my password</a><br> -->
        <!--<a href="register.html" class="text-center">Register a new membership</a>-->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>   
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ URL::asset('bootstrap-3.3.4/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{ URL::asset('i-check/icheck.min.js') }}" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>

