<div class="col-lg-12"><!-- Виджет 1 -->
    <p class="sidebarHeadText">Финансовые новости</p>
    @if(count($data) != 0)
        <ul class="list-unstyled">
            @foreach($data as $v)
                <li><a class="lead" href="{{ route('new::index') }}/cat/{{ $v->id }}">{{ $v->title }}</a></li>
            @endforeach
         </ul>
    @else
        <blockquote>Данные недоступны</blockquote>
    @endif

</div>