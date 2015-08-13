<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Вход в панель администрирования сайта</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset('/assets/admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset('/assets/admin/custom/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{ asset('/assets/admin/custom/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('/assets/admin/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset('assets/admin/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset('/assets/admin/dist/css/skins/skin-blue.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom styles -->
    <link href="{{ asset('/assets/admin/custom/css/style.css') }}" rel="stylesheet" type="text/css" />

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
        <a href="../../index2.html"><b>Вход</b> в консоль</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Введите данные и войдите в панель</p>
        <form action="{{ route('loginPost') }}" method="post">
          {!! csrf_field() !!}
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Пароль" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="remember" id="remember"> Запомнить меня
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Вход</button>
            </div><!-- /.col -->
          </div>
        </form>

        {{--<div class="social-auth-links text-center">--}}
          {{--<p>- ИЛИ -</p>--}}
          {{--<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>--}}
          {{--<a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>--}}
        {{--</div><!-- /.social-auth-links -->--}}

        <a href="#">Я забыл пароль</a><br>
        <a href="#" class="text-center">Регистрация нового администратора</a>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- Подключение  js -->
    <script type="text/javascript" src="{{ url() }}/assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="{{ url() }}/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url() }}/assets/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url() }}/assets/js/jquery-ui.min.js"></script>
    <!-- iCheck -->
    <script src="{{ asset('assets/admin/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
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
