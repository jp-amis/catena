<?php
namespace Amis\Catena;

/**
 * This file is responsable for
 * generating the Catena Facade
 *
 * @license MIT
 * @package Amis\Catena
 */


use Illuminate\Support\Facades\Facade;

class CatenaFacade extends Facade{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'catena';
    }

}