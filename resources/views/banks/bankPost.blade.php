@extends('layout')


@section('title')
    {{ $bank->title }}
@endsection

@section('keywords')

@endsection

@section('description')

@endsection

@section('breadcrumb')
    <div class="col-lg-12"><!-- Хлебные крошки -->
        <ol class="breadcrumb">
            <li><a href="#">Главная</a></li>
            <li><a href="{{ route('banks::index') }}">Банки России</a></li>
            <li class="active">{{ $bank->title }}</li>
        </ol>
    </div><!-- Хлебные крошки -->
@endsection

@section('content')

    <div class="col-lg-8 col-md-8 main-content"><!-- Центральный контент -->
        {!! SWidget::adTopContent() !!}
        <h1>{{ $bank->title }}</h1>

            <div class="col-lg-12 share-alert-offer">
                <div class="share-alert">
                    <span class="glyphicon glyphicon-hand-right"></span><small> поделиться</small>
                </div>
                <div data-background-alpha="0.0" data-buttons-color="#FFFFFF" data-counter-background-color="#ffffff" data-share-counter-size="12" data-top-button="false" data-share-counter-type="disable" data-share-style="1" data-mode="share" data-like-text-enable="false" data-hover-effect="scale" data-mobile-view="true" data-icon-color="#ffffff" data-orientation="horizontal" data-text-color="#000000" data-share-shape="round-rectangle" data-sn-ids="vk.tw.fb.ok.gp." data-share-size="20" data-background-color="#ffffff" data-preview-mobile="false" data-mobile-sn-ids="fb.vk.tw.wh.ok.gp." data-pid="1407057" data-counter-background-alpha="1.0" data-following-enable="false" data-exclude-show-more="true" data-selection-enable="false" class="uptolike-buttons" ></div>
            </div>

        <img src="{{ url() }}/../resources/images/banks/{{ $bank->pic_bank }}" alt="{{ $bank->title }}" class="img-thumbnail img-responsive imgPost">
        {!! $bank->text !!}
        {!! SWidget::adBottomContent() !!}
        <div class="row serviceOfferSiteBox">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 serviceOfferSiteBoxCol">
                <img src="http://jcredit-online.ru/template/default/style/images/calc_icon.png" class="img-responsive">
                <p><a href="{{ route('calc') }}">Рассчитать кредит</a></p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 serviceOfferSiteBoxCol">
                <img src="http://jcredit-online.ru/template/default/style/images/calc_icon2.png" class="img-responsive">
                <p><a href="{{ route('solvency') }}">Дадут ли Вам кредит?</a></p>
            </div>
        </div>
        <h3>Кредитные программы банка:</h3>
        <div class="table-responsive"><!-- Кратко о банке -->
            <table class="table table-hover table-striped offerBank">
                <tbody>
                    <tr>
                        <td>
                            @if($bank->countOffersNal == 0)
                            <span class="nal">Потребительские кредиты</span> <span class="badge pull-right">{{ $bank->countOffersNal }}</span>
                            @else
                            <a href="{{ url() }}/banks/{{ $bank->url }}/nal" class="nal">Потребительские кредиты <span class="badge pull-right">{{ $bank->countOffersNal }}</span></a>
                            @endif
                        </td>
                        <td>
                            @if($bank->countOffersCard == 0)
                            <span class="card">Кредитные карты</span> <span class="badge pull-right">{{ $bank->countOffersCard }}</span>
                            @else
                            <a href="{{ url() }}/banks/{{ $bank->url }}/cart" class="card">Кредитные карты <span class="badge pull-right">{{ $bank->countOffersCard }}</span></a>
                            @endif
                        </td>
                    </tr>
                    <tr>

                        <td>
                            @if($bank->countOffersMicro == 0)
                            <span class="micro">Микрозаймы</span> <span class="badge pull-right">{{ $bank->countOffersMicro }}</span>
                            @else
                            <a href="{{ url() }}/banks/{{ $bank->url }}/micro" class="micro">Микрозаймы <span class="badge pull-right">{{ $bank->countOffersMicro }}</span></a>
                            @endif
                        </td>

                        <td>
                            @if($bank->countOffersMort == 0)
                            <span class="mort">Ипотека</span> <span class="badge pull-right">{{ $bank->countOffersMort }}</span>
                            @else
                            <a href="{{ url() }}/banks/{{ $bank->url }}/mort" class="mort">Ипотека <span class="badge pull-right">{{ $bank->countOffersMort }}</span></a>
                            @endif
                        </td>
                    </tr>
                    <tr>

                        <td>
                            @if($bank->countOffersAuto == 0)
                            <span class="auto">Автокредит</span> <span class="badge pull-right">{{ $bank->countOffersAuto }}</span>
                            @else
                            <a href="{{ url() }}/banks/{{ $bank->url }}/auto" class="nal">Автокредит <span class="badge pull-right">{{ $bank->countOffersAuto }}</span></a>
                            @endif
                        </td>

                        <td>
                            @if($bank->countOffersHold == 0)
                            <span class="hold">Вклады</span> <span class="badge pull-right">{{ $bank->countOffersHold }}</span>
                            @else
                            <a href="{{ url() }}/banks/{{ $bank->url }}/hold" class="hold">Вклады <span class="badge pull-right">{{ $bank->countOffersHold }}</span></a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div><!-- Кратко о банке -->
        <h3>Дополнительная информация:</h3>
        <div class="table-responsive"><!-- Развернуто о банке -->
            <table class="table table-hover table-striped">
                <tbody>
                <tr>
                    <td>
                        <span>Официальный сайт:</span>
                    </td>
                    <td>
                        {{ $bank->site }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>Рейтинг(макс. 5):</span>
                    </td>
                    <td>
                        <p class="lead">{{ $bank->rank }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>Телефон:</span>
                    </td>
                    <td>
                        <p>{{ $bank->phone }}</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div><!-- Развернуто о банке -->
    </div><!-- Центральный контент -->
@endsection

@section('js')

@endsection

@section('rightSidebar')
{!! SWidget::offerRSidebar() !!}
    {{--@parent--}}
@endsection