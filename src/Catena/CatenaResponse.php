<?php
namespace Amis\Catena;

/**
 * Class CatenaResponse
 * This file is responsable for generating the Catena Response so
 * it can check what will be the next step
 *
 * @license MIT
 * @package Amis\Catena
 */
class CatenaResponse {

    /** @var String */
    private $_action;

    /**
     * Constructor passing action
     * @param $action
     */
    public function __construct($action) {
        $this->_action = $action;
    }

    /**
     * Getter for action
     * @return String
     */
    public function getAction() {
        return $this->_action;
    }
}