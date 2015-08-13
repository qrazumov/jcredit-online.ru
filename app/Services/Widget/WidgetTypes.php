<?php
/**
 * Created by PhpStorm.
 * User: razumov
 * Date: 29.07.2015
 * Time: 16:18
 */

namespace App\Services\Widget;


use App\Services\QuerySupport;

/**
 * Класс отвечает за создание логики
 * для вижетов и их отображения
 * Для создания нового типа виджета необходимо
 * просто создать в этом классе публичный метод
 * renderNameWidgetType($data = [])
 *
 * Class WidgetTypes
 * @package App\Services\Widget
 */
class WidgetTypes {

    public function renderHTML($data = []){

        // в переменной $data хранятся все значение параметров виджета
        $text = $data->text;

        echo view('widgets.html', [

            'text' => $text,

        ]);

    }

    public function renderCategoryNews($types){


        echo 'renderCategoryNews<br>';


    }

    public function renderCategoryArticles($types){

        $data = QuerySupport::getCategoryQueryArticles();

        echo view('widgets.categoryArticles', [

            'data' => $data,

        ]);

    }

} 