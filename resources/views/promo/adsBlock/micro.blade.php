        <!-- Modal -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Заявка на микрозайм онлайн</h4>
              </div>
              <div class="modal-body">
 				@if(count($data))             
				<div class="table-responsive">
                            <table class="table table-striped table-hover img-offers-block-info">
                            <thead>
                            <tr>
                            	<th>Банк</th>
                                <th>Сумма займа</th>
                                <th>Срок</th>
                                <th>Ставка</th>
                                <th>Способ получения</th>
                                <th>Уже оформили</th>
                                <th>Заявка</th>
                                
                            </tr>
                            </thead>
                            <tbody>
				                @foreach($data as $v)
				                	@if($v->spec == '1') 
			                            <tr class="spec-offer-index">
			                                <td>
                                    			<span class="label label-info spec-offer-index-label" style="font-size: 13px; ">JCredit-Online.ru рекомендует!</span>			    
                                    			<small>{{ $v->title }}</small>                            
			                                    <a href="{{ url() }}/go/to/{{ $v->id }}/type/m" target="_blank"><img class="img-responsive img-thumbnail" src="{{ url() }}/../resources/images/promo/{{ $v->img }}"></a>
			                                </td>                            
			                                <td>
			                                    <p><small><span class="label label-info labelLarge">первый до</span></small></p> <strong>{{ $v->sum_up}}</strong>
			                                    <p><small><span class="label label-info labelLarge">последующий до</span></small></p> <strong>{{ $v->sum_repeat}}</strong>
			                                </td>
			                                <td>
			                                    <p>до</p>
			                                    <p>{{ $v->term_down}}</p>
			                                    <p>дней</p>
			                                </td>
			                                <td>
			                                    <p>до</p>
			                                    <p>{{ $v->rate}} %</p>
			                                    <p>годовых</p>
			                                </td>
			                                <td>
			                                    <ul class="sposobList">
			                                        @foreach($v->removal_types as $type)
			                                            @if($type == 'nal')
			                                                <li class="nalMicro">Наличными</li>
			                                            @elseif($type == 'bank')
			                                                <li class="bank">Банк. счет</li>
			                                            @elseif($type == 'contact')
			                                                <li class="contact">КОНТАКТ</li>
			                                            @elseif($type == 'cart')
			                                                <li class="cart">На карту</li>
			                                            @elseif($type == 'yandex')
			                                                <li class="yandex">Яндекс.Деньги</li>
			                                            @elseif($type == 'qiwi')
			                                                <li class="qiwi">Киви Кошелек</li>
			                                            @endif
			                                        @endforeach
			                                    </ul>
			                                </td>
			                                <td>
			                                    <p><strong>{{ $v->number_issued }}</strong></p>
			                                    <p>человек</p>
			                                </td>			                                
			                                <td>
			                                    <a href="{{ url() }}/go/to/{{ $v->id }}/type/m" target="_blank" class="btn btn-default btn btn-success btn-block btn-lg btn-lg btnOffer">Оформить заявку</a>
			                                </td>
			                            </tr>
				                	@else
										<tr>
			                                <td>
			                                	<small>{{ $v->title }}</small>			                                
			                                    <a href="{{ url() }}/go/to/{{ $v->id }}/type/m" target="_blank"><img class="img-responsive img-thumbnail" src="{{ url() }}/../resources/images/promo/{{ $v->img }}"></a>
			                                </td>                            
			                                <td>
			                                    <p><small><span class="label label-info labelLarge">первый до</span></small></p> <strong>{{ $v->sum_up}}</strong>
			                                    <p><small><span class="label label-info labelLarge">последующий до</span></small></p> <strong>{{ $v->sum_repeat}}</strong>
			                                </td>
			                                <td>
			                                    <p>до</p>
			                                    <p>{{ $v->term_down}}</p>
			                                    <p>дней</p>
			                                </td>
			                                <td>
			                                    <p>до</p>
			                                    <p>{{ $v->rate}} %</p>
			                                    <p>годовых</p>
			                                </td>
			                                <td>
			                                    <ul class="sposobList">
			                                        @foreach($v->removal_types as $type)
			                                            @if($type == 'nal')
			                                                <li class="nalMicro">Наличными</li>
			                                            @elseif($type == 'bank')
			                                                <li class="bank">Банк. счет</li>
			                                            @elseif($type == 'contact')
			                                                <li class="contact">КОНТАКТ</li>
			                                            @elseif($type == 'cart')
			                                                <li class="cart">На карту</li>
			                                            @elseif($type == 'yandex')
			                                                <li class="yandex">Яндекс.Деньги</li>
			                                            @elseif($type == 'qiwi')
			                                                <li class="qiwi">Киви Кошелек</li>
			                                            @endif
			                                        @endforeach
			                                    </ul>
			                                </td>
			                                <td>
			                                    <p><strong>{{ $v->number_issued }}</strong></p>
			                                    <p>человек</p>
			                                </td>			                                
			                                <td>
			                                    <a href="{{ url() }}/go/to/{{ $v->id }}/type/m" target="_blank" class="btn btn-default btn btn-success btn-block btn-lg btn-lg btnOffer">Оформить заявку</a>
			                                </td>
			                            </tr>				                	
				                	@endif                          

                				@endforeach

                            </tbody>
                            </table>
              </div>
	            @else
	                <blockquote>Данные недоступны</blockquote>
	            @endif              
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <!-- <button type="button" class="btn btn-primary">Сохранить изменения</button> -->
              </div>