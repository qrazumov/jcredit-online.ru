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
                <li class="active">Новости</li>
            </ol>
        </div><!-- Хлебные крошки -->
@endsection

@section('content')

         <div class="col-lg-8 col-md-8"><!-- Центральный контент -->
            @if(isset($categoryTitle))
                <h1>Финансовые новости России: {{ $categoryTitle }}</h1>
            @else
                <h1>Финансовые новости России</h1>
            @endif

            @if(count($data) != 0)
            @foreach($data as $v)
                <div class="indexNewBox"><!-- Блок отдельной новости -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="h3IndexNew"><a href="{{ route('new::index') }}/{{ $v->url }}">{{ $v->title }}</a></h3>
                        <p><small><span class="glyphicon glyphicon-calendar"></span> {{ date('d m Y', strtotime($v->created_at)) }} </small></p>
                        <a href="{{ route('new::index') }}/{{ $v->url }}"><img src="{{ url() }}/../resources/images/news/new/{{ $v->pic_preview }}" class="img-responsive img-thumbnail visible-lg visible-md visible-sm imgNewIndex"></a>
                        <p>{!! $v->text !!}</p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <a href="{{ route('new::index') }}/{{ $v->url }}" class="btn btn-primary">Читать далее</a>
                    </div>
                </div><!-- Блок отдельной новости -->
            @endforeach
            @else
                <blockquote>Данные недоступны</blockquote>
            @endif


            <!-- Пагинация -->
            {!! $data->render() !!}
            <div class="col-lg-12 col-md-12 offerText justifyText bgSiteBox"><!-- Описание категории -->
                @if(isset($descriptionCategory))
                    <h2>{{ $descriptionCategory->title }}</h2>
                    {!! $descriptionCategory->text !!}
                @endif
            </div><!-- Описание категории -->
        </div><!-- Центральный контент -->
@endsection

@section('js')

@endsection

@section('rightSidebar')
{!! SWidget::categoryRightSidebar("news") !!}
{!! SWidget::adRightSidebar() !!}
    {{--@parent--}}
@endsection