<?php
namespace Amis\Catena;
use Amis\Catena\Contracts\CatenaLink;

/**
 * This class is the main entry point of catena. Usually this the interaction
 * with this class will be done through the Catena Facade
 *
 * @license MIT
 * @package Amis\Catena
 */

class Catena {
    /** @var \Illuminate\Foundation\Application */
    public $app;
    /** @var array  */
    private $_steps;

    /**
     * Create a new instance
     * @param \Illuminate\Foundation\Application $app
     */
    public function __construct($app) {
        $this->app = $app;
        $this->_steps = [];
    }

    /**
     * Add one basic step to the current Catena Chain
     *
     * @param string $event the callback event name
     * @param CatenaLink $link Instance that will be called
     * @param string $action Action name that will be called in the CatenaLink
     * @param array $params Array of params to pass to $action
     * @param bool $end Check if this is the bottom of the steps and should return
     */
    public function addStep($event, CatenaLink $link, $action, $params, $end=false) {
        array_push($this->_steps, [
            'event' => $event,
            'link' => $link,
            'action' => $action,
            'params' => $params
        ]);
    }

    /**
     * Run the steps necessary to finish the flow
     * @return mixed|null
     */
    public function run() {
        $step = null;
        $returnData = null;
        $stepsLength = sizeof($this->_steps);
        for($i = 0; $i < $stepsLength; $i++){
            $step = $this->_steps[$i];
            $params = $step['params'];
            $sizeParams = sizeof($params);
            for($i = 0; $i < $sizeParams; $i++) {
                $param = $params[$i];
                if(is_a($param, 'Amis\Catena\CatenaValue')) {
                    $params[$i] = $param->parse();
                }
            }
            $returnData = call_user_func_array([$step['link'], $step['action']], $params);
        }
        return $returnData;
    }


    /**
     * Register a CatenaValue so in Run method it can call it and get the current value
     * @param $type Value type
     * @param $name Value name
     * @return CatenaValue
     */
    public function getValue($type, $name) {
        return new CatenaValue($type, $name);
    }
}