<!-- Виджет 1 -->
<div class="table-responsive">
    <blockquote>Выберите банк и нажмите "Оформить заявку"
        <p><small>Нажмите на кноку "Оформить заявку", заполните простую заявку и получите деньги. Все очень быстро и просто</small></p>
    </blockquote>
    @if($offers['offers_nal'] != 0)
    <table class="table widget-offers-table table-hover img-offers-block-info2">
        <thead>
            <tr class="widget-offers-table-head">
                <th>
                    Банк
                </th>
                <th>
                    Сумма
                </th>
                <th>
                    Ставка
                </th>
                <th>
                    Уже оформили
                </th>
                <th>
                    Заявка
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach($offers['offers_nal'] as $v)
                @if($v->spec == '1')
                    <tr style="border-left: 1px solid red;">
                        <td>
                            <span class="label label-info spec-offer-index-label" style="font-size: 14px;">JCredit-Online.ru рекомендует!</span>
                            <p>{{ $v->title }}</p>
                            <a target="_blank" href="{{ url() }}/go/to/{{ $v->id }}/type/n"><img class="img-responsive img-thumbnail widget-offers-img" src="{{ url() }}/../resources/images/promo/{{ $v->img }}"></a>
                        </td>
                        <td>
                            до {{ $v->sum_down }} руб.
                        </td>
                        <td>
                            {{ $v->rate_down }} %
                        </td>
                        <td>
                            <strong>{{ $v->number_issued }}</strong> человек
                        </td>
                        <td>
                            <a target="_blank" href="{{ url() }}/go/to/{{ $v->id }}/type/n" class="btn btn-success btn-sm btn-block btnOffer" style="height: inherit;">Оформить заявку</a>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td>
                            <p>{{ $v->title }}</p>
                            <a href="{{ url() }}/go/to/{{ $v->id }}/type/n"><img class="img-responsive img-thumbnail widget-offers-img" src="{{ url() }}/../resources/images/promo/{{ $v->img }}"></a>
                        </td>
                        <td>
                            до {{ $v->sum_down }} руб.
                        </td>
                        <td>
                            {{ $v->rate_down }} %
                        </td>
                        <td>
                            <strong>{{ $v->number_issued }}</strong> человек
                        </td>
                        <td>
                            <a href="{{ url() }}/go/to/{{ $v->id }}/type/n" class="btn btn-success btn-sm btn-block btnOffer" target="_blank" style="height: inherit;">Оформить заявку</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>

    </table>
    @else
        <blockquote>Данных нет</blockquote>
    @endif
</div>
