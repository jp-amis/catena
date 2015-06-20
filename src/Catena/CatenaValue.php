<?php
namespace Amis\Catena;

use Illuminate\Support\Facades\Request as Request;

/**
 * Class responsable from parsing the parameters for CatenaLink in the time
 * they are needed
 *
 * @license MIT
 * @package Amis\Catena
 */
class CatenaValue {

    /** @var String */
    private $_type;
    /** @var String */
    private $_name;

    /**
     *
     * Constructor passing type and name
     *
     * @param $type
     * @param $name
     */
    public function __construct($type, $name) {
        $this->_type = $type;
        $this->_name = $name;
    }

    /**
     * Call the necessary parse to get the value
     * @return null|*
     */
    public function parse() {
        $value = null;
        switch($this->_type) {
            case 'input':
                $value = $this->parseInput();
                break;

        }
        return $value;
    }

    /**
     *  Parse the value from Request Input
     */
    private function parseInput() {
        return ($this->_name == "#all#" ? Request::all() : Request::input($this->_name, null));
    }
}