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
                <li><a href="{{ route('offers::index') }}/type/nal">Кредиты наличными</a></li>
                <li class="active">{{ $data->title }}</li>
            </ol>
        </div><!-- Хлебные крошки -->
@endsection

@section('content')

    <div class="col-lg-8 col-md-8 main-content"><!-- Центральный контент -->
        {!! SWidget::adTopContent() !!}
        @if(count($data) != 0)
        <h1>{{ $data->title }}</h1>
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
    <h3>Основные характеристики кредита:</h3>
    <div class="table-responsive"><!-- Кратко о предложении -->
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Процентная ставка</th>
                <th>Сумма</th>
                <th>Срок</th>
                <th>Документы для выдачи</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <p>до</p>
                    <p>{{ $data->rate_down}} %</p>
                    <p>годовых</p>
                </td>
                <td>
                    <p><small><span class="label label-info labelLarge">сумма от</span></small></p> <strong>{{ $data->sum_up}}</strong>
                    <p><small><span class="label label-info labelLarge">сумма до</span></small></p> <strong>{{ $data->sum_down}}</strong>
                </td>
                <td>
                    <p>до</p>
                    <p>{{ $data->term_down}}</p>
                    <p>мес.</p>
                </td>
                <td>
                    {!! $data->doc !!}
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
                    <span>Регистрация :</span>
                </td>
                <td>
                    {!! $data->registr !!}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Категория :</span>
                </td>
                <td>
                    {!! $data->category !!}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Нарушения заемщика по погашению:</span>
                </td>
                <td>
                    {!! $data->narushenie !!}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Срок рассмотрения заявки:</span>
                </td>
                <td>
                    {!! $data->srok_rassm_zayavki !!}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Доход заемщика:</span>
                </td>
                <td>
                    {!! $data->dohod !!}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Возраст заемщика мин.(мужчины):</span>
                </td>
                <td>
                    {!! $data->voz_muj_min !!}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Возраст заемщика макс.(мужчины):</span>
                </td>
                <td>
                    {!! $data->voz_muj_max !!}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Возраст заемщика мин.(Женщины):</span>
                </td>
                <td>
                    {!! $data->voz_jen_min !!}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Возраст заемщика макс.(Женщины):</span>
                </td>
                <td>
                    {!! $data->voz_jen_max !!}
                </td>
            </tr>
            <tr style="background-color: #9CF49D;">
                <td>
                    Плюсы кредита
                </td>
                <td>
                    {!! $data->plus !!}
                </td>
            </tr>
            <tr style="background-color: #F2A7A7;">
                <td>
                    Минусы кредита
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