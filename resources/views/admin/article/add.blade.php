@extends('layoutAdmin')

@section('title')
    Добавление статьи
@endsection

@section('content')
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Добавление статьи
            <small>Форма добавления</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Консоль</a></li>
            <li class="active">Добавление статьи</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <form data-parsley-validate="" id="AddArticle" enctype="multipart/form-data" method="post" action="{{ action('AjaxController@addArticle') }}" >
                    <div class="col-lg-9 col-md-9 col-sm-8" id="appendAllert">
                        <div class="box box-info">
                    <div class="box-header">
                      <h3 class="box-title">Текстовый редактор <small>Начните вводить текст статьи...</small></h3>
                      <!-- tools box -->
                      <div class="pull-right box-tools">
                        <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Свернуть"><i class="fa fa-minus"></i></button>
                        {{--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Закрыть"><i class="fa fa-times"></i></button>--}}
                      </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body pad">
                            <div class="form-group">
                              <label>Название статьи*</label>
                              <input type="text" id="title" name="title" class="form-control"  placeholder="Вводите ..." required="required">
                              <ul class="parsley-errors-list"></ul>
                            </div>
                        <textarea id="editorArticle" name="editorArticle" rows="20" cols="80" required="required" data-parsley-minlength="20"></textarea>
                        <ul class="parsley-errors-list"></ul>
                        <br/>
                        <div class="form-group">
                          <label for="exampleInputFile">Изображение для статьи*</label>
                          <input type="file" id="InputImage" name="InputImage" required="required" multiple>
                          <p class="help-block"><small class="text-yellow" data-toogle="tooltip" title="Размеры могут быть произвольными, т.к. программа автоматически изменит размер к указанным выше значениям.">Параметры: ширина: 270px высота: 190px размер: до 100КБ</small></p>
                          <ul class="parsley-errors-list"></ul>
                          <div id="output2"></div>
                          <img id="testimg" src="" class="img-thumbnail img-responsive">
                        </div>
                        <br/>
                            <div class="form-group">
                              <label>Описание(description)*</label>
                              <textarea id="description" name="description" class="form-control" rows="3" placeholder="Вводите ..." required="required"></textarea>
                              <ul class="parsley-errors-list"></ul>
                            </div>
                        <br/>
                            <div class="form-group">
                              <label>Ключевые слова(keywords)*</label>
                              <textarea id="keywords" name="keywords" class="form-control" rows="3" placeholder="Вводите ..." required="required"></textarea>
                              <ul class="parsley-errors-list"></ul>
                            </div>
                          <p class="help-block"><small class="text-yellow">Поля, отмеченные * обязательны к заполнению</small></p>
                    </div>
                  </div>
                    </div>
                </form>
                <div class="col-lg-3 col-md-3 col-sm-4">
                  <div class="box box-success">
                    <div class="box-header">
                      <h3 class="box-title">Опубликовать</h3>
                      <!-- tools box -->
                      <div class="pull-right box-tools">
                        <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Свернуть"><i class="fa fa-minus"></i></button>
                        {{--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Закрыть"><i class="fa fa-times"></i></button>--}}
                      </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body pad">
                        <p><button class="btn btn-block btn-warning publish" actionType="draft">В черновик</button></p>
                        {{--<p><i class="fa fa-floppy-o"></i> <span class="text-green">Статус:</span> черновик</p>--}}
                        <p><i class="fa fa-calendar"></i> Опубликовать: <a href="#" id="publishToggle">сразу</a></p>
                        <p><input id="publishTime" type="text" name="publishTime" style="display: none;"/></p>
                        <p><strong>Тип рекламы:*</strong></p>
                        <div class="radio">
                          <label>
                                  <input type="radio" name="adsType" id="adsOffers" value="">
                                  Офферы
                                </label>
                        </div>
                        <div class="radio">
                          <label>
                                  <input type="radio" name="adsType" id="adsGoogle" value="" checked>
                                  Google Ads
                                </label>
                        </div>
                        <p><button class="btn btn-block btn-info publish" actionType="publish">Опубликовать</button></p>
                    </div>
                  </div>
                  <div class="box box-success">
                    <div class="box-header">
                      <h3 class="box-title">Категории</h3>
                      <!-- tools box -->
                      <div class="pull-right box-tools">
                        <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Свернуть"><i class="fa fa-minus"></i></button>
                        {{--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Закрыть"><i class="fa fa-times"></i></button>--}}
                      </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body pad">
                      <div class="form-group">
                        <label>Категории*</label>
                        @if(count($category) != 0)
                        <select class="form-control" id="select2Category" name="select2Category" required="required">
                          @foreach($category as $v)
                            <option value="{{ $v->id }}">{{ $v->title }}</option>
                          @endforeach
                        </select>
                        @else
                            <blockquote>Данные недоступны</blockquote>
                        @endif
                        <ul class="parsley-errors-list"></ul>
                      </div><!-- /.form-group -->
                    </div>
                  </div>
                  <div class="box box-success">
                    <div class="box-header">
                      <h3 class="box-title">Похожие статьи</h3>
                      <!-- tools box -->
                      <div class="pull-right box-tools">
                        <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Свернуть"><i class="fa fa-minus"></i></button>
                        {{--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Закрыть"><i class="fa fa-times"></i></button>--}}
                      </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body pad">
                      <div class="form-group">
                        <label>Выберите ровно 3 статьи*</label>
                        <select required="required" data-parsley-check="[3, 3]" class="form-control" size="10" id="SeeAlso" name="SeeAlso[]" multiple="multiple" data-placeholder="Выберите 3 статьи" style="overflow: auto;">
                            @if(count($allArticle) != 0)
                              @foreach($allArticle as $k => $v)
                                <option disabled class="text-aqua">{{ $k }}</option>
                                @foreach($v as $value)
                                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                                @endforeach
                              @endforeach
                            @else
                                <blockquote>Данные недоступны</blockquote>
                            @endif
                        </select>
                      </div><!-- /.form-group -->
                    </div>
                  </div>

                </div>
            </div>

          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div>
@endsection

@section('js')
    <!-- CK Editor -->
    <script src="{{ asset('assets/admin/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <!-- Select2 -->
    <script src="{{ asset('assets/admin/plugins/select2/select2.full.min.js') }}" type="text/javascript"></script>
    <!-- Parsleyjs -->
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/parsley/parsley.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/parsley/parsleyRu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/parsley/parsleyRuExtra.js') }}"></script>
    <!-- JQuery UI -->
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/jQueryUI\jquery-ui.min.js') }}"></script>
    <!-- JQuery UI DataPicker Language RUS -->
    <script type="text/javascript" src="{{ asset('assets/css/data-picker-ru-jquery-ui.js') }}"></script>
    <!-- JQuery Form -->
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/jQuery-form/jquery.form.js') }}"></script>

    <script type="text/javascript">

       var editorArticle = CKEDITOR.replace('editorArticle');


      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.



        //Initialize Select2 Elements
        var select = $("#select2Category").select2();
        // определяем выбранную категорию
        var categoryIdGlobal;
        select.on("select2:select", function (e) {
            console.log(e);
            categoryIdGlobal = e.params.data.id;
         });
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // предзагрузка картинки статьи
        var input = document.getElementById('InputImage');
        input.onchange = function(e) {
           console.log(e);

                    var fReader = new FileReader();
                    fReader.readAsDataURL(input.files[0]);
                    fReader.onloadend = function(event){
                    var img = document.getElementById("testimg");
                    img.src = event.target.result;
                    };

        };

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            function startLoadingAnimation(e) // - функция запуска анимации
            {

              // найдем элемент с изображением загрузки и уберем невидимость:
              var publishAction = $(e.target);
              publishAction.html('<img id="loadImg" style="" src="{{ asset('assets/admin/custom/images/ajax-loader.gif') }}" />');

            }

            function stopLoadingAnimation(e) // - функция останавливающая анимацию
            {
              // найдем элемент с изображением загрузки и уберем невидимость:
              var publishAction = $(e.target);
              publishAction.html('Статья опубликована!');
              publishAction.addClass('disabled');
            }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                // событие нажатия на кнопку "Опубликовать"
                $('.publish').on('click', function (e) {
                console.log($(e.target).attr('actionType'));

                // опубликовать или в черновик - тип действия
                var actionType = $(e.target).attr('actionType');

                //alert(categoryIdGlobal);
                    e.preventDefault();

                 var instance = $('#SeeAlso').parsley();
                 console.log(instance.validate()); // maxlength is 42, so field is valid
                 //alert(instance.validate()); // maxlength is 42, so field is valid

                    $('#AddArticle').parsley().validate();
                    validateFront(actionType, e);
                });
                var validateFront = function (actionType, e) {

                    if (true === $('#AddArticle').parsley().isValid()) {

                    // успешная пре-валидация на клиенте
                    startLoadingAnimation(e);

                    var data = CKEDITOR.instances.editorArticle.getData();

                    // дата пост-публикации
                    var publishTime = $('#publishTime').val();

                    // если не выбрана категория
                    if(categoryIdGlobal == undefined){
                        var categoryId = 1;
                    }else{
                        categoryId = categoryIdGlobal;
                    }

                    // если время пост-публикации не задано
                    if($('#publishTime').val() == ''){
                        publishTime = false;
                    }
                    var SeeAlso = $('#SeeAlso').val();
                    SeeAlso = JSON.stringify(SeeAlso);

                    var publishType;

                    // если действие - опубликовать, то publish=1, иначе 0
                    if(actionType == 'publish'){

                        publishType = 1;

                    }else{

                        publishType = 0;
                    }


                    var adsType;

                    if($('#adsOffers').prop('checked')){

                        adsType = 'offers';

                    }else{

                        adsType = 'ads';

                    }


                    function showResponse(responseText, statusText, xhr, $form)  {
                        // for normal html responses, the first argument to the success callback
                        // is the XMLHttpRequest object's responseText property

                        // if the ajaxSubmit method was passed an Options Object with the dataType
                        // property set to 'xml' then the first argument to the success callback
                        // is the XMLHttpRequest object's responseXML property

                        // if the ajaxSubmit method was passed an Options Object with the dataType
                        // property set to 'json' then the first argument to the success callback
                        // is the json data object returned by the server

                        if(actionType == 'publish'){
                         // если были какие-то ошибки на стороне сервера
                         if(responseText.error == true){
                             console.log(responseText);
                             $('#appendAllert').prepend('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Оповещение!</h4>Ошибка добавления статьи! Причина: '+ responseText.reason[0].toString() +'</div>');
                            var publishAction = $("#publishAction");
                            publishAction.html('Опубликовать');
                             return;
                         }

                         stopLoadingAnimation(e);
                         $('#appendAllert').prepend('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Оповещение!</h4>Статья успешно опубликована! <a href="{{ route('article::index') }}/'+ responseText.url +'" target="_blank">Просмотреть</a>, <a href="{{ url() }}/admin/article/edit/'+ responseText.id +'" target="_blank">редактировать</a>, <a href="{{ route('admin::addArticle') }}" target="_blank">добавить новую</a></div>');
                        // alert(responseText.id);
                         console.log(responseText);
                        }else{
                         // если были какие-то ошибки на стороне сервера
                         if(responseText.error == true){
                             console.log(responseText);
                             $('#appendAllert').prepend('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Оповещение!</h4>Ошибка добавления статьи! Причина: '+ responseText.reason[0].toString() +'</div>');
                            var publishAction = $("#publishAction");
                            publishAction.html('Опубликовать');
                             return;
                         }

                         stopLoadingAnimation(e);
                         $('#appendAllert').prepend('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Оповещение!</h4>Статья добавлена в черновик! <a href="{{ url() }}/admin/article/edit/'+ responseText.id +'" target="_blank">Редактировать</a>, <a href="{{ route('admin::addArticle') }}" target="_blank">добавить новую</a></div>');
                        // alert(responseText.id);
                         console.log(responseText);
                        }


                    }


                    var options = {
                       // target:        '#output2',   // target element(s) to be updated with server response
                       // beforeSubmit:  showRequest,  // pre-submit callback
                        success:       showResponse,  // post-submit callback
                        data: {
                            categoryId: categoryId,
                            publishTime: publishTime,
                            editorArticle: data,
                            SeeAlso: SeeAlso,
                            adsType: adsType,
                            publish: publishType
                        },
                        // other available options:
                        //url:       url         // override for form's 'action' attribute
                        //type:      type        // 'get' or 'post', override for form's 'method' attribute
                        dataType:  'json'        // 'xml', 'script', or 'json' (expected server response type)
                        //clearForm: true        // clear all form fields after successful submit
                        //resetForm: true        // reset the form after successful submit
                        // $.ajax options can be used here too, for example:
                        //timeout:   3000
                    };

                    // сам запрос
                    $('#AddArticle').ajaxSubmit(options);


                    // ошибка валидации
                    } else {
                        //alert('no');
                    }
                };

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // выбор даты публикации
        $(function(){
            var datepicker = $( "#publishTime" ).datepicker($.datepicker.regional["ru"]);
            datepicker.datepicker( "option", "dateFormat", "yy-mm-dd" );
        });
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // обработка нажатия на "Опубликовать: сразу"
        var switchText = true;
        $('#publishToggle').click(function(e){
            e.preventDefault();
            if(switchText){
                var publishToggle = $('#publishToggle').text('дата');
            }else{
                publishToggle = $('#publishToggle').text('сразу');
                $('#publishTime').val(''); // очищаем, если не нужна пост-публикация
            }
            var publishTime = $('#publishTime').toggle();
            switchText = !switchText;
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      });
    </script>
@endsection

@section('css')
    <!-- Select2 -->
    <link href="{{ asset('assets/admin/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- JQuery UI -->
    <link href="{{ asset('assets/css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
    {{--<link href="{{ asset('assets/css/jquery-ui.theme.min.css') }}" rel="stylesheet" type="text/css" />--}}
@endsection