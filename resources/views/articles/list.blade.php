@extends('...layout')


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
                <li><a href="{{ route('article::index') }}">Каталог статей</a></li>
                <li class="active">{{ $categoryTitle }}</li>
            </ol>
        </div><!-- Хлебные крошки -->
@endsection

@section('content')

         <div class="col-lg-8 col-md-12"><!-- Центральный контент -->
            <blockquote>
                <h1 class="h1_23">{{ $title }}</h1>
            </blockquote>
                <table class="table table-striped table-hover">
                    @if(count($data) != 0)
                        @foreach($data as $v)
                        <tr>
                            <td>
                                <p class="lead"><a href="{{ route('article::index') }}/{{ $v->url }}">{{ $v->title }}</a><p>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <blockquote> Данные недоступны</blockquote>
                    @endif

                </table>
                <!-- Пагинация -->
                {!! $data->render() !!}
        </div><!-- Центральный контент -->
@endsection

@section('js')

@endsection

@section('rightSidebar')
{!! SWidget::categoryRightSidebar("articles") !!}
{!! SWidget::adRightSidebar() !!}
    {{--@parent--}}
@endsection