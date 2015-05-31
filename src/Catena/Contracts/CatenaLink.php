<?php
namespace Amis\Catena\Contracts;

/**
 * Interface responsable for dictating the methods a Link must implement
 *
 * @license MIT
 * @package Amis\Catena
 */


interface CatenaLink {


    /**
     * Getter for the name of the catena link
     *
     * @return String name of the catena link
     */
    public function getName();

}