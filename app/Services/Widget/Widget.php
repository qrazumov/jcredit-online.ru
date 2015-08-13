<?php
/**
 * Created by PhpStorm.
 * User: razumov
 * Date: 29.07.2015
 * Time: 13:54
 */

namespace App\Services\Widget;

/**
 * Класс отвечает за реализацию системы виджетов на сайте
 *
 * Class Widget
 * @package App\Services
 */
class Widget {

    // объект с информацией обо всех виджетах сайта
    protected $allWidgets;
    // ссылка на модель Widget
    protected $eloquentWidget;
    // ссылка на фабрику для создания виджета
    protected $factoryWidget;

    public function __construct(){
        $this->eloquentWidget = new \App\Widget();
        $this->allWidgets = $this->getAllWidgets();
        $this->factoryWidget = new FactoryWidget();
    }

    /**
     * Получаем массив с данными по всем
     * виджетам в правильном формате
     *
     * @return array
     */
    public function getAllWidgets(){

        return $this->eloquentWidget->getAllWidgets();

    }

    /**
     * Проверяем, активны ли виджеты на этом месте
     *
     * @param $place
     * @return bool
     */
    public function isActive($place){

        if($this->allWidgets[$place]['active'] == '1'){
            return true;
        }else{
            return false;
        }

    }

    /**
     * Основной метод класса. Занимается отображение виджетов на странице
     *
     * @param $place
     * @return string
     */
    public function make($place){

        ob_start();

        $this->factoryWidget->switchType($this->allWidgets[$place]['types']);

        // тестировать, возможно echo
        return ob_get_clean();

    }


} 