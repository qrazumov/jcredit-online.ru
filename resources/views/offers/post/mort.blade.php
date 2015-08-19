@extends('layout')


@section('title')
    {{ $data->title }}
@endsection

@section('keywords')

@endsection

@section('description')

@endsection

@section('breadcrumb')
    <div class="col-lg-12
    "><!-- Хлебные крошки -->
        <ol class="breadcrumb">
            <li><a href="/">Главная</a></li>
            <li><a href="{{ route('offers::index') }}">Кредитные предложения банков</a></li>
            <li><a href="{{ route('offers::index') }}/type/mort">Ипотека</a></li>
            <li class="active">{{ $data->title }}</li>
        </ol>
    </div><!-- Хлебные крошки -->
@endsection

@section('content')

    <div class="col-lg-8 col-md-8 main-content"><!-- Центральный контент -->
        {!! SWidget::adTopContent() !!}
        @if(count($data) != 0)
        <h1>{{ $data->title }}</h1>

            <div class="col-lg-12 share-alert-offer">
                <div class="share-alert">
                    <span class="glyphicon glyphicon-hand-right"></span><small> поделиться</small>
                </div>
                <div data-background-alpha="0.0" data-buttons-color="#FFFFFF" data-counter-background-color="#ffffff" data-share-counter-size="12" data-top-button="false" data-share-counter-type="disable" data-share-style="1" data-mode="share" data-like-text-enable="false" data-hover-effect="scale" data-mobile-view="true" data-icon-color="#ffffff" data-orientation="horizontal" data-text-color="#000000" data-share-shape="round-rectangle" data-sn-ids="vk.tw.fb.ok.gp." data-share-size="20" data-background-color="#ffffff" data-preview-mobile="false" data-mobile-sn-ids="fb.vk.tw.wh.ok.gp." data-pid="1407057" data-counter-background-alpha="1.0" data-following-enable="false" data-exclude-show-more="true" data-selection-enable="false" class="uptolike-buttons" ></div>
            </div>

        <img src="{{ url() }}/../resources/images/banks/{{ $data->pic_bank }}" alt="{{ $data->title }}" class="img-thumbnail img-responsive imgPost">
        {!! $data->text !!}
        <div class="row serviceOfferSiteBox">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 serviceOfferSiteBoxCol">
                <img src="{{ url() }}/../resources/images/calc_icon.png">
                <p><a href="{{ route('calc') }}">Рассчитать кредит</a></p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 serviceOfferSiteBoxCol">
                <img src="{{ url() }}/../resources/images/calc_icon2.png">
                <p><a href="{{ route('solvency') }}">Дадут ли Вам кредит?</a></p>
            </div>
        </div>
    <h3>Основные характеристики ипотеки:</h3>
        <div class="table-responsive"><!-- Кратко о предложении -->
            <table class="table">
                <thead>
                <tr>
                    <th>Банк</th>
                    <th>Сумма ипотеки</th>
                    <th>Процентная ставка</th>
                    <th>Срок</th>
                    <th>Взнос %</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                         <a href="{{ url() }}/banks/{{ $data->urlBank}}"><img class="img-responsive img-thumbnail" src="{{ url() }}/../resources/images/banks/{{ $data->pic_bank }}"></a>
                    </td>
                    <td>
                        <p><small><span class="label label-info labelLarge">сумма до</span></small></p> <strong>{{ $data->sum_down }}</strong>
                    </td>
                    <td>
                        <p>до</p>
                        <p>{{ $data->rate }} %</p>
                        <p>годовых</p>
                    </td>
                    <td>
                        <p>до</p>
                        <p>{{ $data->term }}</p>
                        <p>мес.</p>
                    </td>
                    <td>
                        <p class="lead"><strong>{{ $data->per_d_payment }}</strong></p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div><!-- Кратко о предложении -->
    {!! SWidget::adBottomContent() !!}
    <h3>Дополнительная информация:</h3>
    <div class="table-responsive"><!-- Развернуто о предложении -->
        <table class="table table-hover table-striped">
            <tbody>
            <tr>
                <td>
                    <span>Стаж заемщика :</span>
                </td>
                <td>
                    {!! $data->staj !!}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Обеспечение ипотеки:</span>
                </td>
                <td>
                    {!! $data->zalog !!}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Цель ипотеки:</span>
                </td>
                <td>
                    {!! $data->tcel !!}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Документы, подтверждающие доход:</span>
                </td>
                <td>
                    {!! $data->doc !!}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Возраст заемщика мин.(мужчины):</span>
                </td>
                <td>
                    {{ $data->voz_muj_min }}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Возраст заемщика макс.(мужчины):</span>
                </td>
                <td>
                    {{ $data->voz_muj_max }}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Возраст заемщика мин.(Женщины):</span>
                </td>
                <td>
                    {{ $data->voz_jen_min }}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Возраст заемщика макс.(Женщины):</span>
                </td>
                <td>
                    {{ $data->voz_jen_max }}
                </td>
            </tr>
            <tr style="background-color: #9CF49D;">
                <td>
                    Плюсы ипотеки
                </td>
                <td>
                    {!! $data->plus !!}
                </td>
            </tr>
            <tr style="background-color: #F2A7A7;">
                <td>
                    Минусы ипотеки
                </td>
                <td>
                    {!! $data->minus !!}
                </td>
            </tr>
            </tbody>
        </table>
    </div><!-- Развернуто о предложении -->
        @else
        <blockquote>Данные недоступны</blockquote>
        @endif
</div><!-- Центральный контент -->
@endsection

@section('js')

@endsection