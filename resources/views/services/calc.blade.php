@extends('layoutRSidebar')


@section('title')
    Рассчитать кредит онлайн
@endsection

@section('keywords')

@endsection

@section('description')

@endsection

@section('breadcrumb')
         <div class="col-lg-12"><!-- Хлебные крошки -->
            <ol class="breadcrumb">
                <li><a href="/">Главная</a></li>
                <li class="active">Кредитный калькулятор</li>
            </ol>
        </div><!-- Хлебные крошки -->
@endsection

@section('content')

         <div class="col-lg-8 col-md-12"><!-- Центральный контент -->
            <h1>Рассчитать кредит онлайн и переплату по кредиту</h1>
            <div class="post table-responsive">
            <div class="calcCreditBox"><!-- Форма ввода данных -->
                <form class="form-horizontal" role="form" onsubmit="return false">
                    <div class="form-group">
                        <label for="sum" class="col-sm-2 control-label">Сумма кредита</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sum" placeholder="Сумма кредита">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate" class="col-sm-2 control-label">Процентная ставка</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="rate" placeholder="Процентная ставка">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="term" class="col-sm-2 control-label">Срок кредита</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="term" placeholder="Срок кредита">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comission" class="col-sm-2 control-label">Ежемесячные платежи</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="comission" placeholder="Ежемесячные платежи">
                        </div>
                    </div>

                    <p><strong>Вид платежа</strong></p>
                    <div class="radio">
                        <label>
                            <input type="radio" name="category" id="check_an" value="1" checked>
                            <p><strong>Аннуитетный</strong></p>
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="category" id="check_dif" value="2">
                            <p><strong>Дифференцированный</strong></p>
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-sm col-sm-10">
                            <button type="submit" class="btn btn-info" name="sub" id="sub">Рассчитать</button>
                        </div>
                    </div>


                </form>
            </div><!-- Форма ввода данных -->
            <table id="result_calc">
                <tbody><tr>
                    <td class="first">Переплата</td>
                    <td class="second"><span id="overpaymentHTML"></span> руб.</td>
                </tr>
                <tr>
                    <td class="first">Полная стоимость кредита</td>
                    <td class="second"><span id="fullCostOfTheLoanHTML"></span> руб.</td>
                </tr>
                <tr id="monthlyPaymentHTMLTr">
                    <td class="first">Ежемесячный платеж</td>
                    <td class="second"><span id="monthlyPaymentHTML"></span> руб.</td>
                </tr>
                <tr>
                    <td class="first">Итоговый процент переплаты</td>
                    <td class="second"><span id="totalInterestRateHTML"></span> %</td>
                </tr>
                </tbody></table>
            </div>
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