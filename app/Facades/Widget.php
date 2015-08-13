<?php
/**
 * Created by PhpStorm.
 * User: razumov
 * Date: 29.07.2015
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class Widget extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Widget';
    }

} 