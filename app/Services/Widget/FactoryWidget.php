<?php
/**
 * Created by PhpStorm.
 * User: razumov
 * Date: 29.07.2015
 * Time: 15:59
 */

namespace App\Services\Widget;


use Illuminate\Support\Facades\Response;

/**
 * Класс является оберткой для фабричного метода switchType($types = [])
 * Если создан новый тип виджета, просто добавьте в оператор switch новое
 * условие
 *
 * Class FactoryWidget
 * @package App\Services\Widget
 */
class FactoryWidget {

    protected $widgetTypes;

    /**
     * конструктор принимает ссылку на объект WidgetTypes
     */
    public function __construct(){
        $this->widgetTypes = new WidgetTypes();
    }

    /**
     * метод выбирает виджеты для отображения
     *
     * @param array $types
     */
    public function switchType($types = []){

        foreach ($types as $k => $v) {

            switch ($k) {

                case 'html':
                    $this->widgetTypes->renderHTML($types->html->data);
                break;
                case 'category_articles':
                    $this->widgetTypes->renderCategoryArticles($types->category_articles->data);
                break;
                case 'category_news':
                    $this->widgetTypes->renderCategoryNews($types->category_news->data);
                break;

            }

        }

    }

}