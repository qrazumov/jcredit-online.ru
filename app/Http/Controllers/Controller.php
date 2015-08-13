<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    /**
     * Получаем цифру страницы, на которой находимся
     * при пагинациии
     *
     * @return string
     */
    private function getPage(){

        // защита от того, что юзерь может чет не то гетом отправить
        if(isset($_REQUEST['page'])){
            if(!preg_match('/^[\\d]{1,3}$/',$_REQUEST['page'])){
                abort(404);
            }
            return $this->page = $_REQUEST['page'];
        }else{
            return $this->page = '';
        }
    }

    /**
     * Вернет строку для конкатенации в тайтл
     * для определения на какой странице пагинации
     * мы находимся
     *
     * @param mixed $title
     */
    public function getTitlePagination()
    {
        if(!isset($_REQUEST['page']) || $_REQUEST['page'] == 1){

            return $this->titlePagination = '';

        }
        return $this->titlePagination = ' | Страница: ' . $this->getPage();
    }


}
