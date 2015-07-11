<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SmartTimeKeeper| Password Reset</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ URL::asset('bootstrap-3.3.4/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
         <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome-4.3.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ URL::asset('css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />
    

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
        <p class="login-box-msg">Password Reset</p>
        {!! Form::open(array('url' => 'password/check-email')) !!}
        {!! Session::get('flash_message') !!}
          <div class="form-group has-feedback">
            {!! Form::email('email', Input::old('email'), array('class'=>'form-control', 'placeholder'=>'E-Mail Address')) !!}
            <?php echo $errors->first('email'); ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
         
          <div class="row">
            <div class="col-xs-4">
              <!-- <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button> -->
              {!! Form::submit('Submit', array('class'=>'btn btn-primary btn-block btn-flat')) !!}  
            </div><!-- /.col -->
          </div>
        {!! Form::close() !!}
        <p><a href="{!!URL::to('auth/login')!!}">Back to login</a></p>
        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>   
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ URL::asset('bootstrap-3.3.4/js/bootstrap.min.js') }}" type="text/javascript"></script>
 
  </body>
</html>

