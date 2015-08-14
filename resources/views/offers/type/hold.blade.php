@extends('layoutRSidebar)


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
                <li class="active">Вклады</li>
            </ol>
        </div><!-- Хлебные крошки -->
@endsection

@section('content')

        <div class="col-lg-8 col-md-8 offerText"><!-- Центральный контент -->
            <h1>Кредитные предложения банков в категории: Вклады</h1>
            @if(count($data))
                @foreach($data as $v)
            <div class="panel panel-info"><!-- Таблица с краткой информацией о предложении -->
                <div class="panel-heading"><a href="{{ route('offers::index') }}/{{ $v->urlOffer }}" class="whiteLink">{{ $v->title }}</a></div>
                <div class="table-responsive">
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
                                <a href="{{ url() }}/banks/{{ $v->url }}"><img class="img-responsive img-thumbnail" src="{{ url() }}/../resources/images/banks/{{ $v->pic_bank }}"></a>
                            </td>
                            <td>
                                <p><small><span class="label label-info labelLarge">сумма от</span></small></p> <strong>{{ $v->sum_up }}</strong>
                            </td>
                            <td>
                                <p>до</p>
                                <p>{{ $v->rate }} %</p>
                                <p>годовых</p>
                            </td>
                            <td>
                                <p>от</p>
                                <p>{{ $v->term_up }}</p>
                                <p>дней</p>
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