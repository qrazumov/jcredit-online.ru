@extends('layoutRSidebar')


@section('title')
    {{ $meta['title'] }}
@endsection

@section('keywords')

@endsection

@section('description')

@endsection

@section('breadcrumb')
    <div class="col-lg-12"><!-- Хлебные крошки -->
        <ol class="breadcrumb">
            <li><a href="#">Главная</a></li>
            <li><a href="{{ route('new::index') }}">Архив новостей</a></li>
            <li><a href="{{ route('new::index') }}/cat/{{ $categoryData->id }}">{{ $categoryData->title }}</a></li>
            <li class="active">{{ $data->title }}</li>
        </ol>
    </div><!-- Хлебные крошки -->
@endsection

@section('content')

    <div class="col-lg-8 col-md-8"><!-- Центральный контент -->
        {!! SWidget::adTopContent() !!}
        <h1>{{ $data->title }}</h1>
        <p><small><span class="glyphicon glyphicon-calendar"></span> {{ date('d m Y', strtotime($data->created_at)) }} </small><small style="margin: 0 0 0 10px;"><span class="glyphicon glyphicon-eye-open"></span> {{ $data->views }}</small></p>
        <img src="{{ url() }}/../resources/images/news/new/{{ $data->pic_preview }}" alt="{{ $data->title }}" class="img-thumbnail img-responsive imgPost">
            {!! $data->text !!}
            {!! SWidget::adBottomContent() !!}
        <div class="bg-info seeAlsoDiv">
            <p class="lead seeAlso">Читайте также:</p>
            <ul>
                <li><a href="{{ route('new::index') }}/{{ $data->seeAlso[0]->url }}">{{ $data->seeAlso[0]->title }}</a></li>
                <li><a href="{{ route('new::index') }}/{{ $data->seeAlso[1]->url }}">{{ $data->seeAlso[1]->title }}</a></li>
                <li><a href="{{ route('new::index') }}/{{ $data->seeAlso[2]->url }}">{{ $data->seeAlso[2]->title }}</a></li>
            </ul>
        </div>

    </div><!-- Центральный контент -->
@endsection

@section('js')

@endsection

@section('rightSidebar')
{!! SWidget::adRightSidebar() !!}
    {{--@parent--}}
@endsection