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
     * @param String $parent identifier for the flow
     * @param string $event the callback event name
     * @param CatenaLink $link Instance that will be called
     * @param string $action Action name that will be called in the CatenaLink
     * @param array $params Array of params to pass to $action
     *
     * @return int unique identifier
     */
    public function addStep($parent, $event, CatenaLink $link, $action, $params) {
        array_push($this->_steps, [
            'parent' => $parent,
            'event' => $event,
            'link' => $link,
            'action' => $action,
            'params' => $params
        ]);
        return sizeof($this->_steps)-1;
    }

    /**
     * Run the steps necessary to finish the flow
     * @return mixed|null
     */
    public function run() {
        $step = null;
        $returnData = null;
        $lastStepIdentifier = null;
        $stepsLength = sizeof($this->_steps);
        for($i = 0; $i < $stepsLength; $i++){
            $step = $this->_steps[$i];

            // if it's the first run it or if it meets the parent and event
            if($i == 0 || ($step['parent'] == $lastStepIdentifier && $step['event'] == $returnData->getAction())) {
                $params = $step['params'];
                $sizeParams = sizeof($params);
                for ($j = 0; $j < $sizeParams; $j++) {
                    $param = $params[$j];
                    if (is_a($param, 'Amis\Catena\CatenaValue')) {
                        $params[$j] = $param->parse();
                    }
                }
                $lastStepIdentifier = $i;
                $returnData = call_user_func_array([$step['link'], $step['action']], $params);

                if(!is_a($returnData, 'Amis\Catena\CatenaResponse')) break;
            }
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

    /**
     * Create a Catena Response so Run method can call the next step correctly
     * @param $action
     * @return CatenaResponse
     */
    public function makeResponse($action) {
        return new CatenaResponse($action);
    }
}