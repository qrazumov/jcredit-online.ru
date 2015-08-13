<?php
/**
 * Created by PhpStorm.
 * User: razumov
 * Date: 28.07.2015
 * Time: 16:06
 */

namespace App\Services;

/**
 * Класс, хранящий запросы к бд,
 * которые трудно разместить где-то еще
 *
 * Class CategoryQuery
 * @package App\Services
 */
class QuerySupport {

    /**
     * Массив со всеми доступными категориями
     * выбираем только статьи, не новости
     *
     * @return array|static[]
     */
    public static function getCategoryQueryArticles(){
        return \DB::table('categories')->select(['title', 'id'])->where('publish', '1')->where('type', 'articles')->get();
    }

    /**
     * Массив со всеми доступными категориями
     * выбираем только новости, не статьи
     *
     * @return array|static[]
     */
    public static function getCategoryQueryNews(){
        return \DB::table('categories')->select(['title', 'id'])->where('publish', '1')->where('type', 'news')->get();
    }
} 