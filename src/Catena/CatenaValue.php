<?php
/**
 * Created by PhpStorm.
 * User: jp
 * Date: 6/19/15
 * Time: 3:03 PM
 */

namespace Amis\Catena;
class CatenaValue {

    private $_type;
    private $_name;

    function __construct($type, $name) {
        $this->_type = $type;
        $this->_name = $name;
    }
}