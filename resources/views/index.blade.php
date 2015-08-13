@extends('layout')


@section('title')
    Кредиты онлайн - самые низкие процентные ставки от 12%
@endsection

@section('keywords')
    потребительский кредит онлайн, кредиты онлайн, микрозаймы онлайн, ставки по кредитам, курсы валют
@endsection

@section('description')
    jCredit-Online.ru - подбор и оформление кредитов онлайн. Обзор потребительских кредитов онлайн, кредитных карт, вкладов
@endsection

@section('content')
    <div class="col-lg-12 col-md-12"><!-- Блок офферов -->
                <div class="panel panel-primary">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Для оформления заявки на кредит выберите банк и нажмите "Оформить заявку"</div>
                    <div class="panel-body">
                        <blockquote>
                        <p class="lead">Ниже представлены наиболее выгодные потребительские кредиты по самым низким процентным ставкам. Выберите подходящий Вам кредит и нажмите кнопку "Оформить заявку". <span class="text-success warningText">Обратите внимание! Процентные ставки по кредитам при оформлении заявок через интернет всегда ниже, чем при обращении в офис банка.</span></p>
                        </blockquote>
                    </div>

                    <div class="table-responsive">
                    @if(count($data) != 0)
                        <table class="table table-hover table-striped topOffersIndex">
                            <thead>
                            <tr>
                                <th>Банк</th>
                                <th>Ставка</th>
                                <th>Сумма</th>
                                <th>Срок</th>
                                <th>Оформили человек</th>
                                <th>Заявка</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $v)
                                @if($v->spec == '1')
                            <tr class="spec-offer-index">
                                <td>
                                    <span class="label label-info spec-offer-index-label" style="font-size: 17px; ">JCredit-Online.ru рекомендует!</span>
                                    <small><a href="{{ url() }}/go/to/{{ $v->id }}/type/n" target="_blank">{{ $v->title  }}</a></small>
                                    <a href="{{ url() }}/go/to/{{ $v->id }}/type/n" target="_blank"><img class="img-responsive img-thumbnail" src="{{ url() }}/../resources/images/banks/{{ $v->pic_bank }}"></a>
                                </td>
                                <td>{{ $v->rate  }} %</td>
                                <td>{{ $v->sum_up  }} - {{ $v->sum_down  }} руб.</td>
                                <td>{{ $v->term_up  }} - {{ $v->term_down  }} мес.</td>
                                <td><span class="successPay">{{ $v->number_issued  }}</span></td>
                                <td style="width: 300px;"><a href="{{ url() }}/go/to/{{ $v->id }}/type/n" target="_blank" class="btn btn-success btn-lg btn-block btnOffer" style="height: inherit;">Оформить заявку</a></td>
                            </tr>
                                @else
                            <tr>
                                <td>
                                    <small><a href="{{ url() }}/go/to/{{ $v->id }}/type/n" target="_blank">{{ $v->title  }}</a></small>
                                    <a href="{{ url() }}/go/to/{{ $v->id }}/type/n" target="_blank"><img class="img-responsive img-thumbnail" src="{{ url() }}/../resources/images/banks/{{ $v->pic_bank }}"></a>
                                </td>
                                <td>{{ $v->rate }} %</td>
                                <td>{{ $v->sum_up  }} - {{ $v->sum_down  }} руб.</td>
                                <td>{{ $v->term_up  }} - {{ $v->term_down  }} мес.</td>
                                <td><span class="successPay">{{ $v->number_issued  }}</span></td>
                                <td style="width: 300px;"><a href="{{ url() }}/go/to/{{ $v->id }}/type/n" target="_blank" class="btn btn-success btn-lg btn-block btnOffer" style="height: inherit;">Оформить заявку</a></td>
                            </tr>
                                @endif
                            @endforeach


                            </tbody>
                        </table>
                    @else
                        <blockquote>Данные недоступны</blockquote>
                    @endif
                    </div>



                </div>
            </div><!-- Блок офферов -->
    <div class="col-lg-12 col-md-12 intro"><!-- Блог о сайте -->

                    <img src="{{ asset('assets/images/girl_money.png') }}" class="offcanvas-xs img-responsive" id="indexLogo">
                    <h1 id="indexH1">jCredit-Online.ru - кредиты онлайн</h1>
                    <p><span id="IndexboldTitleSpan">На этом сайте можно:</span></p>
                    <ul>
                        <li><a class="label label-info" href="{{ route('promo::nal') }}">Оставить</a> заявку на кредит онлайн</li>
                        <li><a class="label label-info" href="{{ route('calc') }}">Рассчитать</a> платежи по кредиту (кредитный калькулятор)</li>
                        <li><a class="label label-info" href="{{ route('offers::index') }}">Узнать</a> о выгодных кредитных предложениях банков</li>
                        <li><a class="label label-info" href="{{ route('article::index')}}">Почитать</a> полезную информацию, чтобы выгодно взять кредит</li>
                    </ul>

            </div><!-- Блог о сайте -->
    <div class="col-lg-12 col-md-12"><!-- Строка для второго уровня -->
                <div class="row">
                    <div class="col-lg-6 col-md-6"><!-- Новости -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Новости</h3>
                            </div>
                            <div class="panel-body">
                                @if(count($news) != 0)
                                <table class="table"><!-- Таблица с новостями -->
                                    <tbody>
                                        @foreach($news as $new)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('new::index') }}/{{ $new->url }}"><img src="{{ url() }}/../resources/images/news/new/{{ $new->pic_preview }}" class="img-index-pic"></a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('new::index') }}/{{ $new->url }}">{{ $new->title }}</a>
                                                    <span class="dateIndex label label-primary">{{ date('d m Y', strtotime($new->created_at)) }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table><!-- Таблица с новостями -->
                                <a href="{{ route('new::index') }}"><span class="glyphicon glyphicon-link"></span> Все новости</a>
                                @else
                                    <blockquote>Данные недоступны</blockquote>
                                @endif

                            </div>
                        </div>
                    </div><!-- Новости -->
                    <div class="col-lg-6 col-md-6"><!-- Статьи -->
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Статьи</h3>
                            </div>
                            <div class="panel-body">
                                @if(count($articles) != 0)
                                <table class="table">
                                    <tbody>
                                        @foreach($articles as $article)
                                    <tr>
                                        <td>
                                            <a href="{{ route('article::index') }}/{{ $article->url }}"><img src="{{ url() }}/../resources/images/articles/article/{{ $article->pic_preview }}" class="img-index-pic"></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('article::index') }}/{{ $article->url }}">{{ $article->title }}</a>
                                            <span class="dateIndex"><span class="glyphicon glyphicon-eye-open"></span> {{ $article->views }}</span>
                                        </td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <a href="{{ route('article::index') }}"><span class="glyphicon glyphicon-link"></span> Все статьи</a>
                                @else
                                    <blockquote>Данные недоступны</blockquote>
                                @endif
                            </div>
                        </div>
                    </div><!-- Статьи -->
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6"><!-- Онлайн сервисы -->
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Онлайн сервисы</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table onlineServicesTable">
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/images/creditcalculator.png') }}">
                                        </td>
                                        <td>
                                            <a class="lead cursorPointer" href="{{ route('calc') }}">Кредитный калькулятор </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/images/borrower.png') }}">
                                        </td>
                                        <td>
                                            <a class="lead cursorPointer" href="{{ route('solvency') }}">Дадут ли Вам кредит?</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/images/dictionary.png') }}">
                                        </td>
                                        <td>
                                            <a class="lead cursorPointer" href="{{ route('dictionary::index') }}">Банковские термины</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/images/questions.png') }}">
                                        </td>
                                        <td>
                                            <a class="lead cursorPointer" href="{{ route('question') }}">Задать вопрос</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div><!-- Онлайн сервисы -->
                    <div class="col-lg-6 col-md-6"><!-- Онлайн заявки -->
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h3 class="panel-title">Онлайн заявки</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table onlineServicesTable">
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/images/icon_index/potrebcredit.png') }}">
                                        </td>
                                        <td>
                                            <a class="lead cursorPointer" href="{{ route('promo::nal') }}">Кредит наличными </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/images/icon_index/creditcard.png') }}">
                                        </td>
                                        <td>
                                            <a class="lead cursorPointer" href="{{ route('promo::card') }}/">Кредитные карты</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/images/icon_index/microcredit.png') }}">
                                        </td>
                                        <td>
                                            <a class="lead cursorPointer" href="{{ route('promo::micro') }}">Микрозаймы</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/images/icon_index/ipoteka.png') }}">
                                        </td>
                                        <td>
                                            <a class="lead cursorPointer" href="{{ route('promo::mort') }}">Ипотека</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/images/icon_index/hold.png') }}">
                                        </td>
                                        <td>
                                            <a class="lead cursorPointer" href="{{ route('promo::hold') }}">Вклады</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/images/icon_index/businesscredit.png') }}">
                                        </td>
                                        <td>
                                            <a class="lead cursorPointer" href="{{ route('promo::business') }}">Кредиты на бизнес</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/images/icon_index/avtocredit.png') }}">
                                        </td>
                                        <td>
                                            <a class="lead cursorPointer" href="{{ route('promo::auto') }}">Автокредиты</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div><!-- Онлайн заявки -->
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6"><!-- Предложения банков -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Предложения банков</h3>
                            </div>
                            <div class="panel-body">
                                @if(count($offers) != 0)
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Банк</th>
                                        <th>Тип</th>
                                        <th>Ставка</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td><a href="{{ route('offers::index') }}/{{ $offers['nal']->url }}"><img class="img-responsive img-thumbnail" src="{{ url() }}/../resources/images/banks/{{ $offers['nal']->pic_bank }}"></a></td>
                                            <td>Потребительские кредиты</td>
                                            <td>{{ $offers['nal']->rate }} %</td>
                                        </tr>

                                        <tr>
                                            <td><a href="{{ route('offers::index') }}/{{ $offers['card']->url }}"><img class="img-responsive img-thumbnail" src="{{ url() }}/../resources/images/banks/{{ $offers['card']->pic_bank }}"></a></td>
                                            <td>Кредитные карты</td>
                                            <td>{{ $offers['card']->rate }} %</td>
                                        </tr>

                                        <tr>
                                            <td><a href="{{ route('offers::index') }}/{{ $offers['micro']->url }}"><img class="img-responsive img-thumbnail" src="{{ url() }}/../resources/images/banks/{{ $offers['micro']->pic_bank }}"></a></td>
                                            <td>Микрозаймы</td>
                                            <td>{{ $offers['micro']->rate }} %</td>
                                        </tr>

                                        <tr>
                                            <td><a href="{{ route('offers::index') }}/{{ $offers['hold']->url }}"><img class="img-responsive img-thumbnail" src="{{ url() }}/../resources/images/banks/{{ $offers['hold']->pic_bank }}"></a></td>
                                            <td>Вклады</td>
                                            <td>{{ $offers['hold']->rate }} %</td>
                                        </tr>

                                        <tr>
                                            <td><a href="{{ route('offers::index') }}/{{ $offers['mort']->url }}"><img class="img-responsive img-thumbnail" src="{{ url() }}/../resources/images/banks/{{ $offers['mort']->pic_bank }}"></a></td>
                                            <td>Ипотека</td>
                                            <td>{{ $offers['mort']->rate }} %</td>
                                        </tr>

                                        <tr>
                                            <td><a href="{{ route('offers::index') }}/{{ $offers['auto']->url }}"><img class="img-responsive img-thumbnail" src="{{ url() }}/../resources/images/banks/{{ $offers['auto']->pic_bank }}"></a></td>
                                            <td>Автокредит</td>
                                            <td>{{ $offers['auto']->rate }} %</td>
                                        </tr>

                                    </tbody>
                                </table>
                                <a href="{{ route('offers::index') }}"><span class="glyphicon glyphicon-link"></span> Все кредитные предложения</a>
                                @else
                                    <blockquote>Данные недоступны</blockquote>
                                @endif
                            </div>
                        </div>
                    </div><!-- Предложения банков -->
                    <div class="col-lg-6 col-md-6"><!-- Банки -->
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h3 class="panel-title">Банки</h3>
                            </div>
                            <div class="panel-body">
                                @if(count($banks) != 0)
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Банк</th>
                                        <th>Краткое описание</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($banks as $bank)
                                            <tr>
                                        <td><a href="{{ route('banks::index') }}/{{ $bank->url }}"><img class="img-responsive img-thumbnail" src="{{ url() }}/../resources/images/banks/{{ $bank->pic_bank }}"></a></td>
                                        <td><a href="{{ route('banks::index') }}/{{ $bank->url }}">{!! $bank->text !!}</a></td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <a href="{{ route('banks::index') }}"><span class="glyphicon glyphicon-link"></span> Все банки</a>
                                @else
                                    <blockquote>Данные недоступны</blockquote>
                                @endif
                            </div>
                        </div>
                    </div><!-- Банки -->
                </div>
            </div><!-- Строка для второго уровня -->
    <div class="col-lg-12 col-md-12"><!-- блок текст страницы -->
        <h2>{{ $descriptionCategory->title }}</h2>
        {!! $descriptionCategory->text !!}
    </div><!-- блок текст страницы -->

@endsection

@section('rightSidebar')

@endsection

@section('js')

@endsection