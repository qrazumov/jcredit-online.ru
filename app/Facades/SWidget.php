<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 07.08.2015
 * Time: 13:39
 */

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SWidget extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'SWidget';
    }

}