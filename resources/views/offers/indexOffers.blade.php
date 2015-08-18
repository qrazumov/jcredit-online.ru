@extends('layoutRSidebar')


@section('title')
    Кредитные предложения банков России
@endsection

@section('keywords')

@endsection

@section('description')

@endsection

@section('breadcrumb')
        <div class="col-lg-12"><!-- Хлебные крошки -->
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li class="active">Кредитные предложения банков</li>
            </ol>
        </div><!-- Хлебные крошки -->
@endsection

@section('content')
        <div class="col-lg-8 col-md-8 offerText main-content"><!-- Центральный контент -->
            <h1>Кредитные предложения по категориям в помощь заемщику</h1>

            <div class="table-responsive"><!-- Таблица с категориями кредитных предложений -->
                <table class="table allOffersCatTable">
               <tr>
                   <td>
                       <div class="itemOffersBox">
                       <a href="{{ route('offers::index') }}/type/nal">
                           <img src="http://jcredit-online.ru/template/default/style/images/list_img/credits.png">
                       </a>
                       <p><a href="{{ route('offers::index') }}/type/nal">Потребительские кредиты</a></p>
                       </div>
                   </td>
                   <td>
                       <div class="itemOffersBox">
                       <a href="{{ route('offers::index') }}/type/cart">
                           <img src="http://jcredit-online.ru/template/default/style/images/list_img/credit-cards.png">
                       </a>
                       <p><a href="{{ route('offers::index') }}/type/cart">Кредитные карты</a></p>
                       </div>
                   </td>
                   <td>
                       <div class="itemOffersBox">
                       <a href="{{ route('offers::index') }}/type/mort">
                           <img src="http://jcredit-online.ru/template/default/style/images/list_img/hypothec.png">
                       </a>
                       <p><a href="{{ route('offers::index') }}/type/mort">Ипотека</a></p>
                       </div>
                   </td>
               </tr>
               <tr>
                   <td>
                       <div class="itemOffersBox">
                       <a href="{{ route('offers::index') }}/type/hold">
                           <img src="http://jcredit-online.ru/template/default/style/images/list_img/deposits.png">
                       </a>
                       <p><a href="{{ route('offers::index') }}/type/hold">Вклады</a></p>
                       </div>
                   </td>
                   <td>
                       <div class="itemOffersBox">
                       <a href="{{ route('offers::index') }}/type/micro">
                           <img src="http://jcredit-online.ru/template/default/style/images/list_img/credits.png">
                       </a>
                       <p><a href="{{ route('offers::index') }}/type/micro">Микрозаймы</a></p>
                       </div>
                   </td>
                   <td>
                       <div class="itemOffersBox center-block">
                       <a href="{{ route('offers::index') }}/type/auto">
                           <img src="http://jcredit-online.ru/template/default/style/images/list_img/autocredits.png">
                       </a>
                       <p><a href="{{ route('offers::index') }}/type/auto">Автокредиты</a></p>
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

@section('rightSidebar')

    @parent

@endsection

@section('js')

@endsection