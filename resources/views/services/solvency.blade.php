@extends('layoutRSidebar')


@section('title')
    Тест на платежеспособность онлайн
@endsection

@section('keywords')

@endsection

@section('description')

@endsection

@section('breadcrumb')
         <div class="col-lg-12"><!-- Хлебные крошки -->
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li class="active">Тест на платежеспособность онлайн</li>
            </ol>
        </div><!-- Хлебные крошки -->
@endsection

@section('content')

         <div class="col-lg-8 col-md-8"><!-- Центральный контент -->
            <h1>Проверить свою кредитоспособность онлайн</h1>
            <blockquote>Сервис временно недоступен. Приносим извенения за неудобства</blockquote>
            <div class="col-lg-12 col-md-12 offerText justifyText bgSiteBox"><!-- Описание категории -->
                <h2>{{ $descriptionCategory->title }}</h2>
                {!! $descriptionCategory->text !!}
            </div><!-- Описание категории -->
        </div><!-- Центральный контент -->
@endsection

@section('js')
        <!-- Кредитный калькулятор -->
        <script src="{{ url() }}/assets/js/credCalc.js"></script>
@endsection

@section('rightSidebar')
{!! SWidget::adRightSidebar() !!}
    {{--@parent--}}
@endsection