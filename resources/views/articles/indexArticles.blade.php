@extends('layoutRSidebar')


@section('title')
    Информация по категориям в помощь заемщику
@endsection

@section('keywords')

@endsection

@section('description')

@endsection

@section('breadcrumb')
         <div class="col-lg-12"><!-- Хлебные крошки -->
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li class="active">Статьи</li>
            </ol>
        </div><!-- Хлебные крошки -->
@endsection

@section('content')

         <div class="col-lg-8 col-md-8 offerText"><!-- Центральный контент -->
            <h1>Информация по категориям в помощь заемщику</h1>
            <div class="table-responsive"><!-- Таблица с категориями кредитных предложений -->
                <table class="table allOffersCatTable">
               <tr>
                   <td>
                       <div class="itemOffersBox">
                       <a href="{{ url() }}/info/cat/4">
                           <img src="{{ url() }}/../resources/images/articles/nal_logo.png" alt="Потребительские кредиты">
                       </a>
                       <p><a href="{{ url() }}/info/category/1">Потребительские кредиты</a></p>
                       </div>
                   </td>
                   <td>
                       <div class="itemOffersBox">
                       <a href="{{ url() }}/info/cat/2">
                           <img src="{{ url() }}/../resources/images/articles/card_logo.png" alt="Кредитные карты">
                       </a>
                       <p><a href="http://jcredit-online.ru/credit_offers/cart">Кредитные карты</a></p>
                       </div>
                   </td>
                   <td>
                       <div class="itemOffersBox">
                       <a href="{{ url() }}/info/cat/3">
                           <img src="{{ url() }}/../resources/images/articles/mort_logo.png" alt="Ипотека">
                       </a>
                       <p><a href="http://jcredit-online.ru/credit_offers/mort">Ипотека</a></p>
                       </div>
                   </td>
               </tr>
               <tr>
                   <td>
                       <div class="itemOffersBox">
                       <a href="{{ url() }}/info/cat/7">
                           <img src="{{ url() }}/../resources/images/articles/hold_logo.png" alt="Вклады">
                       </a>
                       <p><a href="/credit_offers/hold">Вклады</a></p>
                       </div>
                   </td>
                   <td>
                       <div class="itemOffersBox">
                       <a href="{{ url() }}/info/cat/5">
                           <img src="{{ url() }}/../resources/images/articles/micro_logo.png" alt="Микрозаймы">
                       </a>
                       <p><a href="/credit_offers/micro">Микрозаймы</a></p>
                       </div>
                   </td>
                   <td>
                       <div class="itemOffersBox center-block">
                       <a href="{{ url() }}/info/cat/1">
                           <img src="{{ url() }}/../resources/images/articles/auto_logo.png" alt="Автокредиты">
                       </a>
                       <p><a href="/credit_offers/auto">Автокредиты</a></p>
                       </div>
                   </td>
               </tr>
               <tr>
                   <td>
                       <div class="itemOffersBox center-block">
                           <a href="{{ url() }}/info/cat/6">
                               <img src="{{ url() }}/../resources/images/articles/biz_logo.png" alt="Бизнес кредиты">
                           </a>
                           <p><a href="/credit_offers/auto">Бизнес кредиты</a></p>
                       </div>
                   </td>
               </tr>
           </table>
           </div><!-- Таблица с категориями кредитных предложений -->
           <div class="col-lg-12 col-md-12 offerText justifyText bgSiteBox"><!-- Описание категории -->
               <h2>{{ $descriptionCategory->title }}</h2>
               {!! $descriptionCategory->text !!}
           </div><!-- Описание категории -->
        </div><!-- Центральный контент -->
@endsection

@section('js')

@endsection

@section('rightSidebar')
{!! SWidget::categoryRightSidebar("articles") !!}
{!! SWidget::adRightSidebar() !!}
    {{--@parent--}}
@endsection