<?php
namespace Amis\Catena;

/**
 * Base Catena Link class
 *
 * @license MIT
 * @package Amis\Catena
 */

use Amis\Catena\Contracts\CatenaLink;

class BaseCatenaLink implements CatenaLink{

    /**
     * Name of the Catena Link
     * @var String
     */
    protected $name = "BaseCatenaLink";

    /**
     * Getter for the name of the catena link
     *
     * @return String name of the catena link
     */
    public function getName() {
        return $this->name;
    }

}