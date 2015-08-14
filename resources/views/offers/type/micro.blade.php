@extends('layoutRSidebar')


@section('title')
    {{ $title }}
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
                <li class="active">Микрозаймы</li>
            </ol>
        </div><!-- Хлебные крошки -->
@endsection

@section('content')

        <div class="col-lg-8 col-md-8 offerText"><!-- Центральный контент -->
            <h1>Кредитные предложения банков в категории: Микрозаймы</h1>
            @if(count($data))
                @foreach($data as $v)
            <div class="panel panel-info"><!-- Таблица с краткой информацией о предложении -->
                <div class="panel-heading"><a href="{{ route('offers::index') }}/{{ $v->urlOffer }}" class="whiteLink">{{ $v->title }}</a></div>
                <div class="table-responsive">
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
                                <a href="{{ url() }}/banks/{{ $v->url}}"><img class="img-responsive img-thumbnail" src="{{ url() }}/../resources/images/banks/{{ $v->pic_bank }}"></a>
                            </td>
                            <td>
                                <p>до</p>
                                <p>{{ $v->rate}} %</p>
                                <p>в день</p>
                            </td>
                            <td>
                                <p><small><span class="label label-info labelLarge">первый до</span></small></p> <strong>{{ $v->sum_up}}</strong>
                                <p><small><span class="label label-info labelLarge">последующий до</span></small></p> <strong>{{ $v->sum_repeat}}</strong>
                            </td>
                            <td>
                                <ul class="sposobList">
                                    @foreach($v->removalTypes as $type)
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
                </div>
            </div><!-- Таблица с краткой информацией о предложении -->
                @endforeach
            @else
                <blockquote>Данные недоступны</blockquote>
            @endif
                <!-- Пагинация -->
                {!! $data->render() !!}
        </div><!-- Центральный контент -->
@endsection

@section('js')

@endsection