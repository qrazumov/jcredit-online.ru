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

@section('content')
        <div class="col-lg-12 col-md-12 offerMicro"><!-- Информационный блок обертка -->
    <h1>Оформить заявку на автокредит онлайн</h1>
    <div class="col-lg-12 col-md-12 infoOffer bg-info"><!-- Информационный блок -->
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <img src="{{ url() }}/../resources/images/promo/auto_logo.jpg" align="left" style=" max-height: 150px;" class="img-responsive visible-lg visible-md visible-sm">
            </div>
            <div class="col-lg-9 col-md-9">
                <p class="infoText">На этом сайте Вы можете оставить заявку на автокредит онлайн. Ознакомтесь с кредитами, представленными ниже, выберите наиболее подходящий Вам и нажмите на кнопку "Заполнить заявку". Обратите внимание на то, что при оформлении заявки на автокредит через интернет, процентная ставка как правило <strong>ниже</strong>, чем при обращении в офис банка. Также рекомендуем Вам заполнить заявки в <strong>разные</strong> банки, чтобы увеличить шанс выдачи кредита.</p>
            </div>
        </div>
    </div><!-- Информационный блок -->
</div><!-- Информационный блок обертка -->
        <div class="col-lg-12 col-md-12 main-content"><!-- блок контента -->
            @if(count($data))
            @foreach($data as $v)
                @if($v->spec == 1)
                    <div class="offerBox rowSpec"><!-- 1 предложение -->
                @else
                   <div class="offerBox"><!-- 1 предложение -->
                @endif
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4">
                        <a href="{{ url() }}/go/to/{{ $v->id }}/type/a" target="_blank"><img src="{{ url() }}/../resources/images/promo/{{ $v->img }}" class="img-responsive img-thumbnail imgOffer visible-sm visible-md visible-lg"></a>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8">
                        @if($v->spec == 1)
                            <img src="{{ url() }}/../resources/images/promo/spec.png" class="imgSpecPromo">
                        @endif
                        @if($v->spec == 1)
                            <p class="lead titleSpec">{{ $v->title }}      <span class="label label-info" style="font-size: 17px; ">Предложение месяца!</span></p>
                        @else
                            <p class="lead">{{ $v->title }}</p>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Сумма автокредита</th>
                    <th>Срок</th>
                    <th>Ставка</th>
                    <th>Взнос %</th>
                    <th>Уже оформили</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <p><small><span class="label label-info labelLarge">сумма от</span></small></p> <strong>{{ $v->sum_up }}</strong>
                        <p><small><span class="label label-info labelLarge">сумма до</span></small></p> <strong>{{ $v->sum_down }}</strong>
                    </td>
                    <td>
                        <p>до</p>
                        <p>{{ $v->term }}</p>
                        <p>мес.</p>
                    </td>
                    <td>
                        <p>до</p>
                        <p>{{ $v->rate }} %</p>
                        <p>годовых</p>
                    </td>
                    <td>
                        от <p class="lead"><strong>{{ $v->per_d_payment }}</strong></p>
                    </td>
                    <td>
                        <p><strong>{{ $v->number_issued }}</strong></p>
                        <p>человек</p>
                    </td>
                </tr>
                <tr>
                    <td>Об автокредите</td>
                    <td colspan="4">
                        <blockquote class="blockquoteOffer">
                            {!! $v->description_promo !!}
                        </blockquote>
                    </td>
                </tr>

                </tbody>
            </table>
                        </div>
                        <a href="{{ url() }}/go/to/{{ $v->id }}/type/a" target="_blank"><button type="button" class="btn btn-success btn-lg btn-block btnOffer" data-toggle="tooltip" title="">Заполнить заявку</button></a>
                    </div>
                </div>
            </div><!-- 1 предложение -->
            @endforeach
            @else
                <blockquote>Данные недоступны</blockquote>
            @endif

            <div class="col-lg-12 col-md-12"><!-- <Блок описания категории и сайтбар -->
                <div class="row offerText">
                    <div class="col-lg-9 col-md-9 bgSiteBox">
                        <h2>{{ $descriptionCategory->title }}</h2>
                        {!! $descriptionCategory->text !!}
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <h3>Статьи по автокредитам</h3>
                        @if(count($categorySidebarData) != 0)
                            @foreach($categorySidebarData as $v)
                                <p><a href="{{ route('article::index') }}/{{ $v->url }}">{{ $v->title }}</a>
                            @endforeach
                        @else
                            <blockquote>Данные недоступны</blockquote>
                        @endif
                    </div>
                </div>
            </div><!-- <Блок описания категории и сайтбар -->

            </div>
        </div><!-- Блок контента -->
@endsection

{{--На промо страницах правый сайтбар не нужен--}}
@section('rightSidebar')

@endsection

@section('js')
    <script type="text/javascript" src="{{ url() }}/assets/js/promo/promo.js"></script>
@endsection