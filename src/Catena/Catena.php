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
    /**
     * Laravel application
     *
     * @var \Illuminate\Foundation\Application
     */
    public $app;

    /**
     * @var Array
     */
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
     */
    public function addStep($event, CatenaLink $link, $action, $params) {
        array_push($this->_steps, [
            'event' => $event,
            'link' => $link,
            'action' => $action,
            'params' => $params
        ]);
    }

    public function run() {
        $step = null;
        $returnData = null;
        $stepsLength = sizeof($this->_steps);
        for($i = 0; $i < $stepsLength; $i++){
            $step = $this->_steps[$i];

            $returnData = call_user_func($step['link'][$step['action']], $step['params']);
        }

        return $returnData;
    }

}