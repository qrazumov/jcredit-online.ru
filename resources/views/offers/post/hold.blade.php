@extends('...layout')


@section('title')
    {{ $data->title }}
@endsection

@section('keywords')

@endsection

@section('description')

@endsection

@section('breadcrumb')
    <div class="col-lg-12"><!-- Хлебные крошки -->
        <ol class="breadcrumb">
            <li><a href="/">Главная</a></li>
            <li><a href="{{ route('offers::index') }}">Кредитные предложения банков</a></li>
            <li><a href="{{ route('offers::index') }}/type/hold">Вклады</a></li>
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
    <h3>Основные характеристики вклада:</h3>
        <div class="table-responsive"><!-- Кратко о предложении -->
            <table class="table">
                <thead>
                <tr>
                    <th>Банк</th>
                    <th>Сумма вклада от</th>
                    <th>Процентная ставка</th>
                    <th>Срок</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <a href="{{ url() }}/banks/{{ $data->urlBank }}"><img class="img-responsive img-thumbnail" src="{{ url() }}/../resources/images/banks/{{ $data->pic_bank }}"></a>
                    </td>
                    <td>
                        <p><small><span class="label label-info labelLarge">сумма от</span></small></p> <strong>{{ $data->sum_up }}</strong>
                    </td>
                    <td>
                        <p>до</p>
                        <p>{{ $data->rate }} %</p>
                        <p>годовых</p>
                    </td>
                    <td>
                        <p>до</p>
                        <p>{{ $data->term_up }}</p>
                        <p>дней</p>
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
                    <span>Застрахован:</span>
                </td>
                <td>
                    {{ $data->zastrah }}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Капитализация:</span>
                </td>
                <td>
                    {{ $data->kapital }}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Растущие проценты:</span>
                </td>
                <td>
                    {{ $data->rost_proc }}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Периодичность выплаты процентов:</span>
                </td>
                <td>
                    {{ $data->period }}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Автопролонгация:</span>
                </td>
                <td>
                    {{ $data->auto_prolongation }}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Частичное снятие:</span>
                </td>
                <td>
                    {{ $data->chast_snat }}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Досрочное снятие:</span>
                </td>
                <td>
                    {{ $data->dosroch_snat }}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Ограничение на снятие:</span>
                </td>
                <td>
                    {{ $data->ogran_na_snat }}
                </td>
            </tr>
            <tr style="background-color: #9CF49D;">
                <td>
                    Плюсы вклада
                </td>
                <td>
                    {!! $data->plus !!}
                </td>
            </tr>
            <tr style="background-color: #F2A7A7;">
                <td>
                    Минусы вклада
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