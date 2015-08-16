@extends('layoutAdmin')

@section('title')
    Редактирование новости
@endsection

@section('content')
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Редактирование новости
            <small>Форма Редактирования</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Консоль</a></li>
            <li class="active">Редактирование новости</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <form data-parsley-validate="" id="AddArticle" enctype="multipart/form-data" method="post" action="{{ action('AjaxController@editNew') }}" >
                    <div class="col-lg-9 col-md-9 col-sm-8" id="appendAllert">
                        <div class="box box-info">
                    <div class="box-header">
                      <h3 class="box-title">Текстовый редактор <small>Начните вводить текст новости...</small></h3>
                      <!-- tools box -->
                      <div class="pull-right box-tools">
                        <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Свернуть"><i class="fa fa-minus"></i></button>
                        {{--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Закрыть"><i class="fa fa-times"></i></button>--}}
                      </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body pad">
                            <div class="form-group">
                              <label>Название новости*</label>
                              <input value="{{ $data->title }}" type="text" id="title" name="title" class="form-control"  placeholder="Вводите ..." required="required">
                              <ul class="parsley-errors-list"></ul>
                            </div>
                            <div class="form-group">
                              <label>URL новости*</label>
                              <input value="{{ $data->url }}" type="text" id="url" name="url" class="form-control"  placeholder="Вводите ..." required="required">
                              <small class="text-yellow">ВНИМАНИЕ! При изменении url, новость будет недоступна по прежнему адресу(404 ошибка), в результате она выпадет из индекса ПС</small>
                              <ul class="parsley-errors-list"></ul>
                            </div>
                        <textarea id="editorArticle" name="editorArticle" rows="20" cols="80" required="required" data-parsley-minlength="20">{!! $data->text !!}</textarea>
                        <ul class="parsley-errors-list"></ul>
                        <br/>
                        <div class="form-group">
                          <label for="exampleInputFile">Изображение для новости*</label>
                          <input type="file" id="InputImage" name="InputImage" multiple>
                          <p class="help-block"><small class="text-yellow" data-toogle="tooltip" title="Размеры могут быть произвольными, т.к. программа автоматически изменит размер к указанным выше значениям.">Параметры: ширина: 270px высота: 190px размер: до 100КБ</small></p>
                          <ul class="parsley-errors-list"></ul>
                          <div id="output2"></div>
                          <img id="testimg" src="" class="img-thumbnail img-responsive">
                        </div>
                          <p class="help-block"><small class="text-yellow">Поля, отмеченные * обязательны к заполнению</small></p>
                    </div>
                  </div>
                    </div>
                </form>
                <div class="col-lg-3 col-md-3 col-sm-4">
                  <div class="box box-success">
                    <div class="box-header">
                      <h3 class="box-title">Действия</h3>
                      <!-- tools box -->
                      <div class="pull-right box-tools">
                        <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Свернуть"><i class="fa fa-minus"></i></button>
                        {{--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Закрыть"><i class="fa fa-times"></i></button>--}}
                      </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body pad">
                        <p><button class="btn btn-block btn-warning publish" actionType="draft">Изменить в черновик</button></p>
                        {{--<p><i class="fa fa-floppy-o"></i> <span class="text-green">Статус:</span> черновик</p>--}}
                        <p><button class="btn btn-block btn-info publish" actionType="publish">Изменить</button></p>
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
                            @if(isset($v->selected))
                                <option value="{{ $v->id }}" selected>{{ $v->title }}</option>
                            @endif
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
                      <h3 class="box-title">Похожие новости</h3>
                      <!-- tools box -->
                      <div class="pull-right box-tools">
                        <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Свернуть"><i class="fa fa-minus"></i></button>
                        {{--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Закрыть"><i class="fa fa-times"></i></button>--}}
                      </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body pad">
                      <div class="form-group">
                        <label>Выберите ровно 3 новости*</label>
                        <select required="required" data-parsley-check="[3, 3]" class="form-control" size="10" id="SeeAlso" name="SeeAlso[]" multiple="multiple" data-placeholder="Выберите 3 новости" style="overflow: auto;">
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

        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
       var editorArticle = CKEDITOR.replace('editorArticle');



      $(function () {

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
              publishAction.html('Изменить');
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

                 instance.validate();

                 if(!instance.isValid()){
                    return;
                 }
                 console.log(instance.isValid());

                    $('#AddArticle').parsley().validate();
                    validateFront(actionType, e);
                });
                var validateFront = function (actionType, e) {

                    if (true === $('#AddArticle').parsley().isValid()) {

                     // находим из get строки номер редактируемой записи
                     var re = /[\d]+/;
                     var myArray = re.exec(window.location.pathname);
                     var id = myArray[0];

                    // успешная пре-валидация на клиенте
                    startLoadingAnimation(e);

                    // если не выбрана категория
                    if(categoryIdGlobal == undefined){
                        var categoryId = 1;
                    }else{
                        categoryId = categoryIdGlobal;
                    }

                    var SeeAlso = $('#SeeAlso').val();
                    SeeAlso = JSON.stringify(SeeAlso);

                    var data = CKEDITOR.instances.editorArticle.getData();

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
                             $('#appendAllert').prepend('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Оповещение!</h4>Ошибка изменения новости! Причина: '+ responseText.reason[0].toString() +'</div>');
                            var publishAction = $("#publishAction");
                            publishAction.html('Опубликовать');
                            stopLoadingAnimation(e);
                             return;
                         }

                         stopLoadingAnimation(e);
                         $('#appendAllert').prepend('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Оповещение!</h4>Новость успешно изменена! <a href="{{ route('new::index') }}/'+ responseText.url +'" target="_blank">Просмотреть</a></div>');
                        // alert(responseText.id);
                         console.log(responseText);
                        }else{
                         // если были какие-то ошибки на стороне сервера
                         if(responseText.error == true){
                             console.log(responseText);
                             $('#appendAllert').prepend('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Оповещение!</h4>Ошибка изменения новости! Причина: '+ responseText.reason[0].toString() +'</div>');
                            var publishAction = $("#publishAction");
                            publishAction.html('Опубликовать');
                            stopLoadingAnimation(e);
                             return;
                         }

                         stopLoadingAnimation(e);
                         $('#appendAllert').prepend('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Оповещение!</h4>Новость изменена в черновик! <a href="{{ route('new::index') }}/'+ responseText.url +'" target="_blank">Просмотреть</a></div>');
                        // alert(responseText.id);
                         console.log(responseText);
                        }


                    }
                    

                    // если действие - опубликовать, то publish=1, иначе 0
                    if(actionType == 'publish'){
                    var options = {
                       // target:        '#output2',   // target element(s) to be updated with server response
                       // beforeSubmit:  showRequest,  // pre-submit callback
                        success:       showResponse,  // post-submit callback
                        data: {
                            categoryId: categoryId,
                            SeeAlso: SeeAlso,
                            id: id,
                            editorArticle: data,
                            data: data,
                            publish: 1
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
                    }else{
                    var options = {
                       // target:        '#output2',   // target element(s) to be updated with server response
                       // beforeSubmit:  showRequest,  // pre-submit callback
                        success:       showResponse,  // post-submit callback
                        data: {
                            categoryId: categoryId,
                            SeeAlso: SeeAlso,
                            editorArticle: data,
                            id: id,
                            data: data,
                            publish: 0
                        },
                        // other available options:
                        //url:       url         // override for form's 'action' attribute
                        //type:      type        // 'get' or 'post', override for form's 'method' attribute
                        dataType:  'json'        // 'xml', 'script', or 'json' (expected server response type)
                        //clearForm: true        // clear all form fields after successful submit
                        //resetForm: true        // reset the form after successful submit
                        // $.ajax options can be used here too, for example:
                        //timeout:   3000
                    };                    }


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