@extends('layout')


@section('title')
    {{ $meta['title'] }}
@endsection

@section('keywords')
    {{ $meta['keywords'] }}
@endsection

@section('description')
{{ $meta['description'] }}
@endsection

@section('breadcrumb')
    <div class="col-lg-12"><!-- Хлебные крошки -->
        <ol class="breadcrumb">
            <li><a href="#">Главная</a></li>
            <li><a href="{{ route('article::index') }}">Каталог статей</a></li>
            <li><a href="{{ route('article::index') }}/cat/{{ $categoryData->id }}">{{ $categoryData->title }}</a></li>
            <li class="active">{{ $data->title }}</li>
        </ol>
    </div><!-- Хлебные крошки -->
@endsection

@section('content')

    <div class="col-lg-8 col-md-8 main-content"><!-- Центральный контент -->

            @if($data->widget_type == 'ads')
                {!! SWidget::adTopContent() !!}
            @endif
            @if($data->widget_type == 'offers')
                {!! SWidget::offerTopContent() !!}
            @endif

        <h1>{{ $data->title }}</h1>
        <p><small><span class="glyphicon glyphicon-eye-open"></span> {{ $data->views }} просмотровс</small></p>
        <img src="{{ url() }}/../resources/images/articles/article/{{ $data->pic_preview }}" alt="{{ $data->title }}" class="img-thumbnail img-responsive imgPost">
            {!! $data->text !!}
            {!! SWidget::adBottomContent() !!}

sdfgsdg

        <div class="bg-info seeAlsoDiv">
            <p class="lead seeAlso">Читайте также:</p>
            <ul>
                <li><a href="{{ route('article::index') }}/{{ $data->seeAlso[0]->url }}">{{ $data->seeAlso[0]->title }}</a></li>
                <li><a href="{{ route('article::index') }}/{{ $data->seeAlso[1]->url }}">{{ $data->seeAlso[1]->title }}</a></li>
                <li><a href="{{ route('article::index') }}/{{ $data->seeAlso[2]->url }}">{{ $data->seeAlso[2]->title }}</a></li>
            </ul>
        </div>

    </div><!-- Центральный контент -->
@endsection

@section('js')
    <script type="text/javascript" src="{{ url() }}/assets/js/promo/promo.js"></script>
@endsection

@section('rightSidebar')

    {!! SWidget::adRightSidebar() !!}

@endsection