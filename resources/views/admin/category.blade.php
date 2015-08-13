@extends('layoutAdmin')

@section('title')
    Управление категориями
@endsection

@section('content')
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Управление категориями
          </h1>
          <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Консоль</a></li>
            <li class="active">Управление категориями</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">

                <div class="col-lg-5 col-md-5 col-sm-5 appendAllert" >
                        <div class="box box-info">
                    <div class="box-header">
                      <h3 class="box-title">Управление категориями</h3>
                      <!-- tools box -->
                      <div class="pull-right box-tools">
                        <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Свернуть"><i class="fa fa-minus"></i></button>
                        {{--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Закрыть"><i class="fa fa-times"></i></button>--}}
                      </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body pad">
                        <form id="addCategory" action="{{ route('ajax::addCategory') }}" method="post">
                            <div class="form-group">
                              <label>Название категории*</label>
                              <input type="text" id="title" name="title" class="form-control"  placeholder="Вводите ..." required="required">
                            </div>
                              <div class="form-group">
                                <label>Тип категории:*</label>
                                <label>
                                  <input type="radio" name="typeCheck" id="articleType" class="type-cat" checked />
                                </label>
                                Статья
                                <label>
                                  <input type="radio" name="typeCheck" id="NewType" class="type-cat" />
                                </label>
                                Новость
                              </div>
                        </form>
                        <p><button class="btn btn-block btn-info" id="publish">Опубликовать</button></p>
                          <p class="help-block"><small class="text-yellow">Поля, отмеченные * обязательны к заполнению</small></p>
                    </div>
                  </div>
                    </div>

                <div class="col-lg-7 col-md-7 col-sm-7">

                    <div class="box box-success">
                    <div class="box-header">
                      <h3 class="box-title">Доступные категории</h3>
                      <!-- tools box -->
                      <div class="pull-right box-tools">
                        <button class="btn btn-success btn-sm" data-widget="collapse" data-toggle="tooltip" title="Свернуть"><i class="fa fa-minus"></i></button>
                        {{--<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Закрыть"><i class="fa fa-times"></i></button>--}}
                      </div><!-- /. tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body pad">
                      @if(count($data) != 0)
                      <table class="table table-condensed">
                        <tr>
                          <th>#</th>
                          <th>Название</th>
                          <th>Тип</th>
                          <th>Действие</th>
                        </tr>
                        @foreach($data as $v)
                        <tr>
                          <td>{{ $v->id }}</td>
                          <td>{{ $v->title }}</td>
                          <td>
                          {{ $v->type }}
                          <p><small><span class="text-green">Опубикована:</span> {{ $v->publish }}</small></p>
                          </td>
                          <td>
                              <p><span class="text-yellow">Изменить</span></p>
                              <p><span class="text-red">Удалить</span></p>
                          </td>
                        </tr>
                        @endforeach

                      </table>
                      @else
                        <blockquote>Ошибка доступа к данным</blockquote>
                      @endif
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

    <!-- icheck -->
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/iCheck/icheck.min.js') }}"></script>

    <!-- JQuery Form -->
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/jQuery-form/jquery.form.js') }}"></script>

    <script type="text/javascript">
      $(function () {
;

        //Initialize Select2 Elements
        var select = $("#select2Category").select2();
        // определяем выбранную категорию
        var categoryIdGlobal;
        select.on("select2:select", function (e) {
            console.log(e);
            categoryIdGlobal = e.params.data.id;
         });
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            $('input.type-cat').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });


            // событие: отмена выделения строки
            $('input').on('ifUnchecked', function(event){

            });


        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////



        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            function startLoadingAnimation() // - функция запуска анимации
            {

              // найдем элемент с изображением загрузки и уберем невидимость:
              var publishAction = $('#publish');
              publishAction.html('<img id="loadImg" style="" src="{{ asset('assets/admin/custom/images/ajax-loader.gif') }}" />');

            }

            function stopLoadingAnimation() // - функция останавливающая анимацию
            {
              // найдем элемент с изображением загрузки и уберем невидимость:
              var publishAction = $('#publish');
              publishAction.html('Опубликовать');
            }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // действие по кнопке "опубликовать"
        $('#publish').click(function(){

            var instance = $('#addCategory').parsley();

            instance.validate();

            if(!instance.isValid()){ // ошибка пре-валидации


            return;

            }

            // успешная клиент-валидация

            startLoadingAnimation();

            var type;

            if($('#NewType').prop('checked')){

                type = 'news';

            }else{

                type = 'articles';

            }

            var options = {

                // target:        '#output2',   // target element(s) to be updated with server response
                // beforeSubmit:  showRequest,  // pre-submit callback
                success:       showResponse,  // post-submit callback
                data:{

                    type: type

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

            function showResponse(responseObj, statusText, xhr, $form){

                alert(responseObj);

                $('.appendAllert').prepend('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Оповещение!</h4>Категория успешно опубликована!</div>');

                location.reload(true); // перезагружаем текущую страницу для обновления результата

                stopLoadingAnimation();

            }

            $('#addCategory').ajaxSubmit(options);

        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////



        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////



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

    <!-- iCheck for checkboxes and radio inputs -->
    <link href="{{ asset('assets/admin/plugins/iCheck/all.css') }}" rel="stylesheet" type="text/css" />
@endsection