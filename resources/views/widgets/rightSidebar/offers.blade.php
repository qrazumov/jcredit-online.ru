            <div class="col-lg-12" id="widget-r-s-offers">

                <div class="table-responsive">
                    <blockquote>
                        <p><small>Нажмите на кноку "Заявка", заполните простую заявку и получите деньги. Все очень быстро и просто</small></p>
                    </blockquote>
                    @if($offers['offers_nal'] != 0)
                    <table class="table widget-offers-table table-hover">
                        <thead>
                            <tr class="widget-offers-table-head">
                                <th>
                                    Банк
                                </th>
                                <th>
                                    Оформили
                                </th>
                                <th>
                                    Заявка
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td colspan="3">
                                    <span class="widget-offers-title">Кредиты наличными</span>
                                </td>
                            </tr>
                            @foreach($offers['offers_nal'] as $v)
                                @if($v->spec == '1')
                                    <tr style="border-left: 1px solid red; font-weight: bold;">
                                        <td class="widget-offers-spec-img">
                                            {{--<span class="label label-info spec-offer-index-label" style="font-size: 14px;">JCredit-Online.ru рекомендует!</span>--}}
                                            <a target="_blank" href="{{ url() }}/go/to/{{ $v->id }}/type/n">{{ $v->title }}</a>
                                        </td>
                                        <td>
                                            <strong>{{ $v->number_issued }}</strong> чел.
                                        </td>
                                        <td>
                                            <a target="_blank" href="{{ url() }}/go/to/{{ $v->id }}/type/n" class="btn btn-success btn-sm btnOffer" style="height: inherit;">Заявка</a>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>
                                            <a href="{{ url() }}/go/to/{{ $v->id }}/type/n">{{ $v->title }}</a>
                                        </td>
                                        <td>
                                            <strong>{{ $v->number_issued }}</strong> чел.
                                        </td>
                                        <td>
                                            <a href="{{ url() }}/go/to/{{ $v->id }}/type/n" class="btn btn-success btn-sm btnOffer" target="_blank" style="height: inherit;">Заявка</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            <tr>
                                <td colspan="3">
                                    <span class="widget-offers-title">Микрозаймы</span>
                                </td>
                            </tr>
                            @foreach($offers['offers_micro'] as $v)
                                @if($v->spec == '1')
                                    <tr style="border-left: 1px solid red; font-weight: bold;">
                                        <td class="widget-offers-spec-img">
                                            {{--<span class="label label-info spec-offer-index-label" style="font-size: 14px;">JCredit-Online.ru рекомендует!</span>--}}
                                            <a target="_blank" href="{{ url() }}/go/to/{{ $v->id }}/type/m">{{ $v->title }}</a>
                                        </td>
                                        <td>
                                            <strong>{{ $v->number_issued }}</strong> чел.
                                        </td>
                                        <td>
                                            <a target="_blank" href="{{ url() }}/go/to/{{ $v->id }}/type/m" class="btn btn-success btn-sm btnOffer" style="height: inherit;">Заявка</a>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>
                                            <a href="{{ url() }}/go/to/{{ $v->id }}/type/m">{{ $v->title }}</a>
                                        </td>
                                        <td>
                                            <strong>{{ $v->number_issued }}</strong> чел.
                                        </td>
                                        <td>
                                            <a href="{{ url() }}/go/to/{{ $v->id }}/type/m" class="btn btn-success btn-sm btnOffer" target="_blank" style="height: inherit;">Заявка</a>
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

            </div>