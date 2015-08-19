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

    <div class="col-lg-8 col-md-8  main-content"><!-- Центральный контент -->
        {!! SWidget::adTopContent() !!}
        <h1>{{ $data->title }}</h1>

        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-3 col-xs-12">
                <p><small><span class="glyphicon glyphicon-eye-open"></span> {{ $data->views }} просмотров</small></p>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-4 col-xs-12">
                <div class="share-alert">
                    <span class="glyphicon glyphicon-hand-right"></span><small> поделиться</small>
                </div>
                <div data-background-alpha="0.0" data-buttons-color="#FFFFFF" data-counter-background-color="#ffffff" data-share-counter-size="12" data-top-button="false" data-share-counter-type="disable" data-share-style="1" data-mode="share" data-like-text-enable="false" data-hover-effect="scale" data-mobile-view="true" data-icon-color="#ffffff" data-orientation="horizontal" data-text-color="#000000" data-share-shape="round-rectangle" data-sn-ids="vk.tw.fb.ok.gp." data-share-size="20" data-background-color="#ffffff" data-preview-mobile="false" data-mobile-sn-ids="fb.vk.tw.wh.ok.gp." data-pid="1407057" data-counter-background-alpha="1.0" data-following-enable="false" data-exclude-show-more="true" data-selection-enable="false" class="uptolike-buttons" ></div>
            </div>
        </div>

        <p><small><span class="glyphicon glyphicon-calendar"></span> {{ date('d m Y', strtotime($data->created_at)) }} </small></p>
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