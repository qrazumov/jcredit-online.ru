@extends('layoutRSidebar')


@section('title')
    Словарь банковских терминов
@endsection

@section('keywords')
    В этом разделе нашего сайта Вы можете почитать кредитно-финансовые термины. Проект в рамках повышения финансовой грамотности населения
@endsection

@section('description')
    кредитные термины, финансовые термины, банковские термины
@endsection

@section('breadcrumb')
            <div class="col-lg-12"><!-- Хлебные крошки -->
                <ol class="breadcrumb">
                    <li><a href="/">Главная</a></li>
                    <li class="active">Словарь банковских терминов</li>
                </ol>
            </div><!-- Хлебные крошки -->
@endsection

@section('content')

            <div class="col-lg-8 col-md-12"><!-- Центральный контент -->
                <h1>Словарь банковских терминов</h1>
                @if(!isset($isLetter))

                        <p class="lead">Поиск термина по первой букве:</p>
                        <div class="table-responsive">
                            <table class="table tableDic">
                                <tbody>
                                <tr>
                                    <td><a href="{{ route('dictionary::index') }}/А">А</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/Б">Б</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/В">В</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/Г">Г</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/Д">Д</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/Е">Е</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/Ж">Ж</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/З">З</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/И">И</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/К">К</a></td>
                                </tr>
                                <tr>
                                    <td><a href="{{ route('dictionary::index') }}/Л">Л</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/М">М</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/Н">Н</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/О">О</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/П">П</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/Р">Р</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/С">С</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/Т">Т</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/У">&nbsp;У</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/Ф">Ф</a></td>
                                </tr>
                                <tr>
                                    <td><a href="{{ route('dictionary::index') }}/Х">Х</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/А">Ц</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/Ч">Ч</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/Ш">Ш</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/Щ">Щ</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/Э">Э</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/Ю">Ю</a></td>
                                    <td><a href="{{ route('dictionary::index') }}/Я">Я</a></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                @else
                    <blockquote>Все термины на букву: {{ $letter }}</blockquote>
                @endif


                    @if(count($terms))
                        @foreach($terms as $k => $v)
                        <div class="dic_1_letter"><!-- Блок с терминами по букве -->
                            <span class="dic_1_letter_main"> {{ $k }}</span>
                            @foreach($v as $item)
                            <div class="letWrapper">
                                <div class="termItem">
                                    <h3 class="title">{{ $item['title'] }}</h3>
                                    <p>{!! $item['text'] !!}</p>
                                </div>
                            </div>
                            @endforeach
                        </div><!-- Блок с терминами по букве -->
                        @endforeach
                    @else
                        <blockquote>К сожалению терминов в словаре пока нет.</blockquote>
                    @endif


                 <!-- Пагинация -->
                {!! $pagination->render() !!}

                <div class="col-lg-12 col-md-12 offerText justifyText bgSiteBox"><!-- Описание категории -->
                    @if(!Request::has('page') && !isset($isLetter))
                        <h2>{{ $descriptionCategory->title }}</h2>
                        {!! $descriptionCategory->text !!}
                    @endif
                </div><!-- Описание категории -->
            </div><!-- Центральный контент -->
@endsection

@section('js')

@endsection

@section('rightSidebar')
{!! SWidget::adRightSidebar() !!}
    {{--@parent--}}
@endsection