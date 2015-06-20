<?php
/**
 * Created by PhpStorm.
 * User: jp
 * Date: 6/19/15
 * Time: 3:03 PM
 */

namespace Amis\Catena;

use Illuminate\Support\Facades\Request as Request;

class CatenaValue {

    private $_type;
    private $_name;

    public function __construct($type, $name) {
        $this->_type = $type;
        $this->_name = $name;
    }

    public function parse() {
        return Request::all();
    }
}