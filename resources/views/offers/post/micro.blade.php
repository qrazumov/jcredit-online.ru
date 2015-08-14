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
            <li><a href="{{ route('offers::index') }}/type/micro">Микрокредиты</a></li>
            <li class="active">{{ $data->title }}</li>
        </ol>
    </div><!-- Хлебные крошки -->
@endsection

@section('content')
    <div class="col-lg-8 col-md-8"><!-- Центральный контент -->
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
    <h3>Основные характеристики микрозайма:</h3>
        <div class="table-responsive"><!-- Кратко о предложении -->
            <table class="table">
                <thead>
                <tr>
                    <th>Банк</th>
                    <th>Процентная ставка</th>
                    <th>Сумма займа</th>
                    <th>Способ получения</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <a href="{{ url() }}/banks/{{ $data->urlBank}}"><img class="img-responsive img-thumbnail" src="{{ url() }}/../resources/images/banks/{{ $data->pic_bank }}"></a>
                    </td>
                    <td>
                        <p>до</p>
                        <p>{{ $data->rate}} %</p>
                        <p>в день</p>
                    </td>
                    <td>
                        <p><small><span class="label label-info labelLarge">первый до</span></small></p> <strong>{{ $data->sum_up}}</strong>
                        <p><small><span class="label label-info labelLarge">последующий до</span></small></p> <strong>{{ $data->sum_repeat}}</strong>
                    </td>
                    <td>
                        <ul class="sposobList">
                                    @foreach($data->removalTypes as $type)
                                        @if($type == 'nal')
                                            <li class="nalMicro">Наличными</li>
                                        @elseif($type == 'bank')
                                            <li class="bank">Банк. счет</li>
                                        @elseif($type == 'contact')
                                            <li class="contact">КОНТАКТ</li>
                                        @elseif($type == 'cart')
                                            <li class="cart">На карту</li>
                                        @elseif($type == 'yandex')
                                            <li class="yandex">Яндекс.Деньги</li>
                                        @elseif($type == 'qiwi')
                                            <li class="qiwi">Киви Кошелек</li>
                                        @endif
                                    @endforeach
                        </ul>
                    </td>
                </tr>
                </tbody>
            </table>
        </div><!-- Кратко о предложении -->
    {!! SWidget::adBottomContent() !!}
    <h3>Дополнительная информация:</h3>
        <div class="table-responsive"><!-- Развернуто о предложении -->
        <table class="table table-hover table-striped">
            <tbody><tr>
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
            <tr>
                <td>
                    <span>Обеспечение:</span>
                </td>
                <td>
                    {{ $data->zalog }}
                </td>
            </tr>
            <tr>
                <td>
                    <span>Документы, подтверждающие платежеспособность:</span>
                </td>
                <td>
                    {!! $data->doc !!}
                </td>
            </tr>
            <tr style="background-color: #9CF49D;">
                <td>
                    Плюсы микрозайма
                </td>
                <td>
                    {!! $data->plus !!}
                </td>
            </tr>
            <tr style="background-color: #F2A7A7;">
                <td>
                    Минусы микрозайма
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