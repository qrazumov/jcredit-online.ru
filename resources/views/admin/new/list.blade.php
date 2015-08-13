@extends('layoutAdmin')

@section('title')
    Список всех новостей
@endsection

@section('content')
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Список всех новостей
            <small>Данные по сайту</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">

                <div class="col-xs-12">
                  <div class="box box-info">
                    <div class="box-header">
                      {{--<h3 class="box-title">Hover Data Table</h3>--}}

                    </div><!-- /.box-header -->
                    <div class="box-body">
                  @if(count($data) != 0)  
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>#</th>
                        <th>Название</th>
                        <th>Категория</th>
                        <th>Публикация</th>
                        <th>Дата создания</th>
                        <th>Дата публикации</th>
                        <th>Действие</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach($data as $v)
                          <tr>
                            <td>{{ $v->id }}</td>
                            <td class="icheck-class"><input type="checkbox" class="tableflat" value="{{ $v->id }}"></td>
                            <td>{{ $v->title }}</td>
                            <td>{{ $v->categoryTitle }}</td>
                            <td>
                              <div class="form-group">
                                <label>
                                  @if($v->publish == '1')
                                    да
                                  @else
                                    нет
                                  @endif
                                </label>
                              </div>
                            </td>
                            <td>{{ $v->created_at }}</td>
                            <td>{{ $v->published_at }}</td>
                            <td></td>
                          </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>#</th>
                        <th>Название</th>
                        <th>Категория</th>
                        <th>Публикация</th>
                        <th>Дата создания</th>
                        <th>Дата публикации</th>
                        <th>Действие</th>
                      </tr>
                    </tfoot>
                  </table>
                  @else
                    <blockquote>Данных нет</blockquote>
                  @endif

                <!-- Пагинация -->
                {!! $data->render() !!}

                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div>

            </div>

        </section><!-- /.content -->
      </div>
@endsection

@section('css')

    <!-- dataTables -->
    <link href="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />

    <!-- iCheck for checkboxes and radio inputs -->
    <link href="{{ asset('assets/admin/plugins/iCheck/all.css') }}" rel="stylesheet" type="text/css" />


@endsection

@section('js')

    <!-- slimscroll -->
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>

    <!-- fastclick -->
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/fastclick/fastclick.min.js') }}"></script>

    <!-- dataTables -->
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

    <!-- icheck -->
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/iCheck/icheck.min.js') }}"></script>

    <script>

///////////////////////////////////////////////////////

            // удаляем новость
            function delArticle(e){

                var id = $(e).attr('id');
                console.log(id);

                if( confirm('Подтвердите удаление:') ){

                    $('body').attr('style', 'opacity: 0.3;');

                                  $.ajax({
                                  type: 'GET',
                                  url: '{{ route('ajax::delNew') }}',
                                  data: {
                                      id: id
                                  },

                                                  success: function(result){ // результат запроса

                                                              console.log(result);

                                                              if(result.error == true){

                                                                alert('Непредвиденная ошибка!');

                                                              }else{

                                                                    location.reload(true); // перезагружаем текущую страницу для обновления результата

                                                               }
                                                   }

                                  });

                }

            }
///////////////////////////////////////////////////////

        $(document).ready(function(){

            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              'iDisplayLength': 50
            });

            $('input.tableflat').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });

            // событие: выделение строки
            $('input').on('ifChecked', function(event){
            var id = $(event.target).val();
            var tdTypeOperation = $(event.target).parent().parent().next().next().next().next().next().next();
            tdTypeOperation.html('<a href="{{ url() }}/admin/new/edit/'+ id +'" style="color: rgb(69, 107, 12);"><i class="fa fa-edit"></i> Ред. </a><br /><a onclick="delArticle(this)" id="'+ id +'" style="cursor: pointer; color: red;" id="delClient"><i class="fa fa-scissors"></i> Удалить</a>');
            });


            // событие: отмена выделения строки
            $('input').on('ifUnchecked', function(event){
                console.log(event);
                console.log(event.target);
                console.log(event.timeStamp);
                var tdTypeOperation = $(event.target).parent().parent().next().next().next().next().next().next();
                console.log(tdTypeOperation);
                tdTypeOperation.html('');
            });




        });

    </script>

@endsection
