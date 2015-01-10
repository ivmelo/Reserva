<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Reserva - Sign in</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <!--<link href="http://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">-->

    <style type="text/css">
      body {
        font-family: 'Open Sans', sans-serif;
        background-color: white;
      }

      footer {
        position: fixed;
        width: 100%;
        text-align: center;
        bottom: 0px;
      }

      .auth-form {

        max-width: 377px;
        margin: 0 auto;
        margin-top: 40px;
      }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="auth-form">

        @if (Session::get('message'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <strong>Hey!</strong> {{ Session::get('message') }}
        </div>
        @endif
        

        <h1>Reserva <small>alpha</small></h1>
        <p>Welcome to Reserva, here you can book IT equipment such as projectors, laptops and cellphones for meetings or personal use.</p>
        {{ Form::open(array('route' => 'sessions.store')) }}
          <div class="form-group input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
              {{ Form::email('email', NULL, array('class' => 'form-control', 'placeholder' => 'Your corporative email goes here')) }}
              {{ $errors->first('email') }}
          </div>
          <div class="form-group input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'If you don\'t have a password, leave blank')) }}
              {{ $errors->first('password') }}
          </div>
          <button type="submit" class="btn btn-danger btn-lg btn-block">Login</button>
        {{ Form::close() }}
        <!--<a href="reservations/create" >Access</a>
        <p class="text-center">or</p>
        <a href="reservations/create" class="btn btn-info btn-lg btn-block">Admin login</a>-->
      </div>
      


      <!--<form class="form-signin" role="form">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="email" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" class="form-control" placeholder="Password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>-->
    
    </div> <!-- /container -->

    <footer>
      <p>&copy; 2014 - <a href="#">Vieira Labs</a> - All rights reserved.</p>
    </footer>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

