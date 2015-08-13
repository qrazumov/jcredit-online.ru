<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
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
    <link href="{{ url() }}/assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="{{ url() }}/assets/css/adaptiveDevice.css" rel="stylesheet" type="text/css" /><!-- Стили под разные устройства -->

</head>
<body>
<div class="navmenu navmenu-default navmenu-fixed-left offcanvas-sm navmenuCustom" style=""><!-- Меню -->
    <div id="logo">
        <a href="{{ url() }}"><img src="http://jcredit-online.ru/template/default/style/images/logo.png" class="img-responsive"></a>
    </div>
    <h4 class="h4_nav_panel">Заявки онлайн:</h4>
    <ul class="nav navmenu-nav">
        @if(preg_match('/oformit_zajavku_na_potrebitelskij_kredit_onlajn$/', Request::getRequestUri()))
            <li class="active"><a href="{{ route('promo::nal') }}"> Кредит налиными</a></li>
        @else
            <li><a href="{{ route('promo::nal') }}"> Кредит налиными</a></li>
        @endif
        @if(preg_match('/zajavka_na_mikrozajm_onlajn$/', Request::getRequestUri()))
            <li class="active"><a href="{{ route('promo::micro') }}"> Микрозаймы</a></li>
        @else
            <li><a href="{{ route('promo::micro') }}"> Микрозаймы</a></li>
        @endif
        @if(preg_match('/oformit_zajavku_na_kreditnuju_kartu_onlajn$/', Request::getRequestUri()))
            <li class="active"><a href="{{ route('promo::card') }}"> Кредитные карты</a></li>
        @else
            <li><a href="{{ route('promo::card') }}"> Кредитные карты</a></li>
        @endif
        @if(preg_match('/oformit_zajavku_na_ipoteku_onlajn$/', Request::getRequestUri()))
            <li class="active"><a href="{{ route('promo::mort') }}"> Ипотека</a></li>
        @else
            <li><a href="{{ route('promo::mort') }}"> Ипотека</a></li>
        @endif
        @if(preg_match('/oformit_zajavku_na_avtokredit_onlajn$/', Request::getRequestUri()))
            <li class="active"><a href="{{ route('promo::auto') }}"> Автокредиты</a></li>
        @else
            <li><a href="{{ route('promo::auto') }}"> Автокредиты</a></li>
        @endif
        @if(preg_match('/vklad_v_bank_pod_procenty_onlajn$/', Request::getRequestUri()))
             <li class="active"><a href="{{ route('promo::hold') }}"> Вклады</a></li>
        @else
            <li><a href="{{ route('promo::hold') }}"> Вклады</a></li>
        @endif
        @if(preg_match('/business_credit$/', Request::getRequestUri()))
            <li class="active"><a href="{{ route('promo::business') }}"> Кредиты на бизнес</a></li>
        @else
            <li><a href="{{ route('promo::business') }}"> Кредиты на бизнес</a></li>
        @endif

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Предложения банков <b class="caret"></b></a>
            <ul class="dropdown-menu navmenu-nav">
                @if(preg_match('/credit_offers$/', Request::getRequestUri()))
                    <li class="active"><a href="{{ route('offers::index') }}"><span ></span> Все категории</a></li>
                @else
                    <li><a href="{{ route('offers::index') }}"><span ></span> Все категории</a></li>
                @endif
                @if(preg_match('/nal$/', Request::getRequestUri()))
                    <li class="active"><a href="{{ route('offers::index') }}/type/nal"><span ></span> Кредит налиными</a></li>
                @else
                    <li><a href="{{ route('offers::index') }}/type/nal"><span ></span> Кредит налиными</a></li>
                @endif
                @if(preg_match('/cart$/', Request::getRequestUri()))
                    <li class="active"><a href="{{ route('offers::index') }}/type/cart"><span ></span> Кредитные карты</a></li>
                @else
                    <li><a href="{{ route('offers::index') }}/type/cart"><span ></span> Кредитные карты</a></li>
                @endif
                @if(preg_match('/micro$/', Request::getRequestUri()))
                    <li class="active"><a href="{{ route('offers::index') }}/type/micro"><span ></span> Микрозаймы</a></li>
                @else
                    <li><a href="{{ route('offers::index') }}/type/micro"><span ></span> Микрозаймы</a></li>
                @endif
                @if(preg_match('/mort$/', Request::getRequestUri()))
                    <li class="active"><a href="{{ route('offers::index') }}/type/mort"><span ></span> Ипотека</a></li>
                @else
                    <li><a href="{{ route('offers::index') }}/type/mort"><span ></span> Ипотека</a></li>
                @endif
                @if(preg_match('/auto$/', Request::getRequestUri()))
                    <li class="active"><a href="{{ route('offers::index') }}/type/auto"><span ></span> Автокредиты</a></li>
                @else
                    <li><a href="{{ route('offers::index') }}/type/auto"><span ></span> Автокредиты</a></li>
                @endif
                @if(preg_match('/hold$/', Request::getRequestUri()))
                    <li class="active"><a href="{{ route('offers::index') }}/type/hold"><span ></span> Вклады</a></li>
                @else
                    <li><a href="{{ route('offers::index') }}/type/hold"><span ></span> Вклады</a></li>
                @endif
            </ul>
        </li>
    </ul>
    <h4 class="h4_nav_panel">Сервисы:</h4>
    <ul class="nav navmenu-nav">
                @if(preg_match('/banks$/', Request::getRequestUri()))
                    <li class="active"><a href="{{ route('banks::index') }}"><span ></span> Банки России</a></li>
                @else
                    <li><a href="{{ route('banks::index') }}"><span ></span> Банки России</a></li>
                @endif
                @if(preg_match('/kalkulyator$/', Request::getRequestUri()))
                    <li class="active"><a href="{{ route('calc') }}"><span ></span> Кредитный калькулятор</a></li>
                @else
                    <li><a href="{{ route('calc') }}"><span ></span> Кредитный калькулятор</a></li>
                @endif
                @if(preg_match('/solvency$/', Request::getRequestUri()))
                    <li class="active"><a href="{{ route('solvency') }}"><span ></span> Дадут ли Вам кредит?</a></li>
                @else
                    <li><a href="{{ route('solvency') }}"><span ></span> Дадут ли Вам кредит?</a></li>
                @endif
                @if(preg_match('/dictionary$/', Request::getRequestUri()))
                    <li class="active"><a href="{{ route('dictionary::index') }}"><span ></span> Словарь терминов</a></li>
                @else
                    <li><a href="{{ route('dictionary::index') }}"><span ></span> Словарь терминов</a></li>
                @endif
                @if(preg_match('/question$/', Request::getRequestUri()))
                    <li class="active"><a href="{{ route('question') }}"><span ></span> Вопросы по кредитам</a></li>
                @else
                    <li><a href="{{ route('question') }}"><span ></span> Вопросы по кредитам</a></li>
                @endif
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span ></span> Новости <b class="caret"></b></a>
            <ul class="dropdown-menu navmenu-nav">
                <li><a href="{{ route('new::index') }}"><span ></span> Все категории</a></li>
                <!-- механизм извлечения категорий из базы данных -->
                @if(count(\App\Services\QuerySupport::getCategoryQueryNews()) != 0)
                    @foreach(\App\Services\QuerySupport::getCategoryQueryNews() as $v)
                        <li><a href="{{ route('new::index') }}/cat/{{ $v->id }}"><span ></span> {{ $v->title }}</a></li>
                    @endforeach
                @else
                    <li>Категории недоступны</li>
                @endif
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span ></span> Статьи <b class="caret"></b></a>
            <ul class="dropdown-menu navmenu-nav">
                <li><a href="{{ route('article::index') }}"><span ></span> Все категории</a></li>
                <!-- механизм извлечения категорий из базы данных -->
                @if(count(\App\Services\QuerySupport::getCategoryQueryArticles()) != 0)
                    @foreach(\App\Services\QuerySupport::getCategoryQueryArticles() as $v)
                        <li><a href="{{ route('article::index') }}/cat/{{ $v->id }}"><span ></span> {{ $v->title }}</a></li>
                    @endforeach
                @else
                    <li>Категории недоступны</li>
                @endif

            </ul>
        </li>
    </ul>
</div><!-- Меню -->
<div class="navbar navbar-default navbar-fixed-top hidden-md hidden-lg"><!-- Кнопка меню -->
    <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Главная</a>

</div><!-- Кнопка меню -->
<div class="container"><!-- Контент -->
    <div class="row">
        <div class="row gridHeaderDiv"><!-- Шапка -->
            <div class="col-lg-5 col-sm-6 col-md-5 col-sm-12 visible-xs visible-sm visible-md visible-lg"><!-- Таблица курсов валют -->
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <td class="currency">
                            ЦБ
                        </td>
                        <td class="currency">
                            USD
                        </td>
                        <td class="">
                                        <span class="">
                                            {{ Currency::getCurrency()['dollar'] }}
                                        </span>
                                        <span class="label label-primary">
                                            на {{ Currency::getCurrency()['dateD'] }}.{{ Currency::getCurrency()['dateM'] }}
                                        </span>
                        </td>
                        <td>
                                        @if(Currency::getCurrency()['diffDollar'] < 0)
                                            <span class="label label-danger">
                                        @else
                                            <span class="label label-success">+
                                        @endif

                                            {{ Currency::getCurrency()['diffDollar'] }}
                                        </span>
                        </td>
                        <td class="">
                                        <span class="">
                                            {{ Currency::getCurrency()['pDollar'] }}
                                        </span>
                                        <span class="label label-primary">
                                            на {{ Currency::getCurrency()['pDateD'] }}.{{ Currency::getCurrency()['pDateM'] }}
                                        </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="currency">
                            ЦБ
                        </td>
                        <td class="currency">
                            EUR
                        </td>
                        <td class="">
                                        <span class="">
                                        {{ Currency::getCurrency()['euro'] }}
                                        </span>
                        </td>
                        <td>
                                        @if(Currency::getCurrency()['diffEuro'] < 0)
                                            <span class="label label-danger">
                                        @else
                                            <span class="label label-success">+
                                        @endif

                                            {{ Currency::getCurrency()['diffEuro'] }}
                                        </span>
                        </td>
                        <td class="">
                                         <span class="">
                                            {{ Currency::getCurrency()['pEuro'] }}
                                         </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div><!-- Таблица курсов валют -->
            <div class="col-lg-2 col-sm-6 col-md-4 col-sm-12 visible-xs visible-sm visible-md visible-lg"><!-- Калькулятор и тест -->
                <table class="table table-header-test-calc">
                    <tr>
                        <td>
                 <a href="{{ route('calc') }}"><img src="{{ url() }}/../resources/images/calc_icon.png" alt="Кредитный калькюлятор" style="max-width: 50px"/></a>

                        </td>
                        <td>
                 <a href="{{ route('solvency') }}"><img src="{{ url() }}/../resources/images/calc_icon2.png" alt="Тест: дадут ли Вам кредит?" style="max-width: 50px"/></a>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ route('calc') }}"><small>Калькулятор</small></a>
                        </td>
                        <td>
                            <a href="{{ route('solvency') }}"><small>Тест на кредитоспособность?</small></a>
                        </td>
                    </tr>
                </table>
            </div><!-- Калькулятор и тест -->
            <div class="col-lg-5 col-sm-6 col-md-3 col-sm-12 visible-xs visible-md visible-lg"><!-- Город и поиск -->
                <div class="row">
                    <div class="col-lg-12">
                        <div id="city">
                            <span id="tooltipsel" title="">Ваш город: </span>
                            <span><a href="#">Москва</a></span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <!--<div id="searchSite">-->
                        <!--<div class="ya-site-form ya-site-form_bg_transparent ya-site-form_inited_yes" id="ya-site-form0"><div class="ya-site-form__form"><table class="ya-site-form__wrap" cellpadding="0" cellspacing="0"><tbody><tr><td class="ya-site-form__search-wrap"><table class="ya-site-form__search" cellpadding="0" cellspacing="0"><tbody><tr><td class="ya-site-form__search-input"><table class="ya-site-form__search-input-layout"><tbody><tr><td class="ya-site-form__search-input-layout-l"><div class="ya-site-form__input"><input name="text" type="search" value="" class="ya-site-form__input-text" placeholder="Введите поисковый запрос" autocomplete="off"><div class="ya-site-suggest"><div class="ya-site-suggest-popup" style="display: none;"><i class="ya-site-suggest__opera-gap"></i><div class="ya-site-suggest-list"><iframe class="ya-site-suggest__iframe" frameborder="0" src="javascript:'<body style=&quot;background:none;overflow:hidden&quot;>'"></iframe><ul class="ya-site-suggest-items"></ul></div></div></div></div></td><td class="ya-site-form__search-input-layout-r"><input class="ya-site-form__submit" type="button" value="Найти"></td></tr></tbody></table></td></tr><tr><td class="ya-site-form__gap"><div class="ya-site-form__gap-i"></div></td></tr></tbody></table></td></tr></tbody></table></div></div><style type="text/css">.ya-page_js_yes .ya-site-form_inited_no { display: none; }</style><script type="text/javascript">(function(w,d,c){var s=d.createElement('script'),h=d.getElementsByTagName('script')[0],e=d.documentElement;if((' '+e.className+' ').indexOf(' ya-page_js_yes ')===-1){e.className+=' ya-page_js_yes';}s.type='text/javascript';s.async=true;s.charset='utf-8';s.src=(d.location.protocol==='https:'?'https:':'http:')+'//site.yandex.net/v2.0/js/all.js';h.parentNode.insertBefore(s,h);(w[c]||(w[c]=[])).push(function(){Ya.Site.Form.init()})})(window,document,'yandex_site_callbacks');</script>-->
                        <!--</div>-->
                        <form class="form-inline" role="form" id="searchSiteForm">
                            <div class="form-group">
                                <!--<label for="exampleInputEmail1">Email</label>-->
                                <input class="form-control " id="searchSite" placeholder="Поиск по сайту">
                                <button type="submit" class="btn btn-default btn btn-info btn-block btn-sm " id="searchSiteButton">Найти</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- Город и поиск -->
        </div><!-- Шапка-->
    @yield('breadcrumb')
    {{--visible-md visible-lg МОЖЕТ БЫТЬ ЕСЛИ НУЖНО ПО ПРАВИЛАМ GOOGLE  --}}
    <div class="col-lg-4 col-md-4" id=""><!-- Правый сайтбар -->
        <div class="row">
            @yield('rightSidebar')
        </div>

    </div>


        @yield('content')


    </div>
</div><!-- Контент -->
<div id="footer"><!-- Футер -->
    <div class="container footerDiv">
        <p class="text-muted footerText">Реклама на сайте: <span class="label label-info" id="footerEmail">razumovsu@gmail.com</span><span class="tesst"><span class="glyphicon glyphicon-copyright-mark"></span> 2014-2015 jcredit-online.ru. Все права защищены</span></p>
    </div><!-- Футер -->
</div>

    <!-- Подключение  js -->
    <script type="text/javascript" src="{{ url() }}/assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="{{ url() }}/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url() }}/assets/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url() }}/assets/js/jquery-ui.min.js"></script>

    <script type="text/javascript" src="{{ url() }}/assets/js/promo/promo.js"></script>
    <script type="text/javascript" src="{{ url() }}/assets/js/plugin/jquery.hc-sticky.min.js"></script>
    <script type="text/javascript" src="{{ url() }}/assets/js/scrollSidebar.js"></script>

    @yield('js')
</body>
</html>