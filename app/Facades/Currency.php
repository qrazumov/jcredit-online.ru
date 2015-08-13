<?php
/**
 * Created by PhpStorm.
 * User: razumov
 * Date: 20.07.2015
 * Time: 2:37
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class Currency extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Currency';
    }

} 