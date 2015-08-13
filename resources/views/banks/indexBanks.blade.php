@extends('layoutRSidebar')


@section('title')
    Рейтинг банков России, финансовые показатели, кредитные программы
@endsection

@section('keywords')

@endsection

@section('description')

@endsection

@section('breadcrumb')
            <div class="col-lg-12"><!-- Хлебные крошки -->
                <ol class="breadcrumb">
                    <li><a href="/">Главная</a></li>
                    <li class="active">Банки России</li>
                </ol>
            </div><!-- Хлебные крошки -->
@endsection

@section('content')

            <div class="col-lg-8 col-md-12"><!-- Центральный контент -->
                <h1>Рейтинг банков России</h1>
                <blockquote>
                    Здесь представлен рейтинг банков России. Рейтинг строится исходя из финансовых показателей банка и отзывов клиентов. Данный сервис предоставляет Вам справочные данные о банках, их предложениях и отзывах клиентов.
                </blockquote>
                <div class="formBoxBank"><!-- Форма поиска банка -->
                    <p><strong>Поиск банка</strong></p>
                    <input type="text" class="form-control" id="searchBank" placeholder="Начните вводить название банка...">
                </div><!-- Форма поиска банка -->
                <div class="table-responsive"><!-- Список банков -->
                    <table class="table tableBank">
                        <thead>
                            <tr>
                                <th>Банк</th>
                                <th>Кредитные предложения</th>
                                <th>Сайт / оценка(макс. 5)</th>
                            </tr>
                        </thead>
                            <tbody>
                                @if(count($banks))
                                @foreach($banks as $bank)
                                <tr>
                                    <td rowspan="2">
                                        <p><small><a href="{{ url() }}/banks/{{ $bank->url}}">{{ $bank->title }}</a></small></p>
                                        <a href="{{ url() }}/banks/{{ $bank->url}}"><img class="img-responsive img-thumbnail" src="{{ url() }}/../resources/images/banks/{{ $bank->pic_bank }}"></a>
                                    </td>
                                    <td rowspan="2">
                                        <ul class="sposobList">
                                            @if($bank->countOffersNal == 0)
                                            <li class="nal">Кредит наличными<span class="badge pull-right">{{ $bank->countOffersNal }}</span></li>
                                            @else
                                            <li class="nal"><a href="{{ url() }}/banks/{{ $bank->url }}/nal">Кредит наличными<span class="badge pull-right">{{ $bank->countOffersNal }}</span></a></li>
                                            @endif
                                            @if($bank->countOffersCard == 0)
                                            <li class="card">Кредитные карты<span class="badge pull-right">{{ $bank->countOffersCard }}</span></li>
                                            @else
                                            <li class="card"><a href="{{ url() }}/banks/{{ $bank->url }}/cart">Кредитные карты<span class="badge pull-right">{{ $bank->countOffersCard }}</span></a></li>
                                            @endif
                                            @if($bank->countOffersMicro == 0)
                                            <li class="micro">Микрозаймы<span class="badge pull-right">{{ $bank->countOffersMicro }}</span></li>
                                            @else
                                            <li class="micro"><a href="{{ url() }}/banks/{{ $bank->url }}/micro">Микрозаймы<span class="badge pull-right">{{ $bank->countOffersMicro }}</span></a></li>
                                            @endif
                                            @if($bank->countOffersMort == 0)
                                            <li class="mort">Ипотека<span class="badge pull-right">{{ $bank->countOffersMort }}</span></li>
                                            @else
                                            <li class="mort"><a href="{{ url() }}/banks/{{ $bank->url }}/mort">Ипотека<span class="badge pull-right">{{ $bank->countOffersMort }}</span></a></li>
                                            @endif
                                            @if($bank->countOffersAuto == 0)
                                            <li class="auto">Автокредит<span class="badge pull-right">{{ $bank->countOffersAuto }}</span></li>
                                            @else
                                            <li class="auto"><a href="{{ url() }}/banks/{{ $bank->url }}/auto">Автокредит<span class="badge pull-right">{{ $bank->countOffersAuto }}</span></a></li>
                                            @endif
                                            @if($bank->countOffersHold == 0)
                                            <li class="hold">Вклад<span class="badge pull-right">{{ $bank->countOffersHold }}</span></li>
                                            @else
                                            <li class="hold"><a href="{{ url() }}/banks/{{ $bank->url }}/hold">Вклад<span class="badge pull-right">{{ $bank->countOffersHold }}</span></a></li>
                                            @endif
                                        </ul>
                                    </td>
                                    <td>
                                        {{ $bank->site }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="lead">{{ $bank->rank }}</p>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                   <blockquote>Контент недоступен</blockquote>
                                @endif
                            </tbody>
                    </table>
                </div><!-- Список банков -->
               <!-- Пагинация -->
               {!! $banks->render() !!}
                <div class="col-lg-12 col-md-12 offerText justifyText bgSiteBox"><!-- Описание категории -->
                    @if(!Request::has('page'))
                        <h2>{{ $descriptionCategory->title }}</h2>
                        {!! $descriptionCategory->text !!}
                    @endif
                </div><!-- Описание категории -->
            </div><!-- Центральный контент -->
@endsection

@section('js')
    <script>
///////////////////////////////////////////////////////////////////////////////////////////////
        /**
         * Настройка автокомплита на вывод подсказок ввода
         * с последующим переходом на выбранную страницу
         * с описанием банка
         */
        $( "#searchBank" ).autocomplete({

            source: function(request, response){
                    // организуем кроссдоменный запрос
                    $.ajax({
                      url: "{{ route('ajax::getBanksAutoCompleteArray') }}",
                      type: "GET",
                      // параметры запроса, передаваемые на сервер (последний - подстрока для поиска):
                      data:{
                        item: request.term
                      },
                      // обработка успешного выполнения запроса
                      success: function(data){
                        // приведем полученные данные к необходимому формату и передадим в предоставленную функцию response
                        response($.map(data, function(item){
                          return{
                            value: item.title,
                            id: item.url
                          }
                        }));
                      }
                    });
                  },
            /**
             * Обработка события выбора банка
             * для перехода на страницу банка
             *
             * @param event
             * @param ui
             */
            select: function( event, ui ) {

                var id = ui.item.id;
                var refresh = window.location.assign('{{ route('banks::index') }}/' + id);

            }

        });
///////////////////////////////////////////////////////////////////////////////////////////////
    </script>
@endsection

@section('rightSidebar')
{!! SWidget::offerRSidebar() !!}
    {{--@parent--}}
@endsection