<?php
namespace Amis\Catena;

/**
 * Base Catena Link class
 *
 * @license MIT
 * @package Amis\Catena
 */

use Amis\Catena\Contracts\CatenaLink;

/**
 * Class BaseCatenaLink
 * @package Amis\Catena
 */
class BaseCatenaLink implements CatenaLink{

    /** @var String $name Name of the Catena Link */
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