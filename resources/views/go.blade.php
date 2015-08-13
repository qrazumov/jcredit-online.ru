<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Перенаправление на сайт банка. Пожалуйста, подождите 5 секунд</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ url() }}/assets/images/favicon.png" />
   <!-- Подключение  css -->
    <link href="{{ url() }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url() }}/assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url() }}/assets/css/jasny-bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="{{ url() }}/assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <!-- custom css -->
    {{--<link href="{{ url() }}/assets/css/style.css" rel="stylesheet" type="text/css" />--}}
    {{--<link href="{{ url() }}/assets/css/adaptiveDevice.css" rel="stylesheet" type="text/css" /><!-- Стили под разные устройства -->--}}

</head>
<body>
    <div class="container"><!-- Контент -->
        <div class="row" style="margin: 100px auto; max-width: 600px;">

                 <blockquote style="border-left: 5px solid #BEE1F3;">
                    <img src="{{ url() }}/../resources/images/promo/ajax-loader.gif">
                    <span id="redSec">Подождите 5 секунд. Будет осуществлен автоматический переход на сайт банка</span>
                 </blockquote>

        </div>
    </div><!-- Контент -->

    <!-- Подключение  js -->
    <script type="text/javascript" src="{{ url() }}/assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="{{ url() }}/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url() }}/assets/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url() }}/assets/js/jquery-ui.min.js"></script>
    <script>
    	$(document).ready(function(){

    				var x = 5;

    				function second(){

    				$('#redSec').text('Подождите ' + x + ' секунд. Будет осуществлен автоматический переход на сайт банка');
    				x--;
    				if(x == -1){
    					window.location.href = '{{ $link }}';
    					return;
    				}
    				setTimeout(second, 1000);
    			}
    			// инициализируем
    			second();

    	})
    </script>
</body>
</html>