<?php
namespace Amis\Catena;

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
     * Create a new instance
     * @param \Illuminate\Foundation\Application $app
     */
    public function __construct($app) {
        $this->app = $app;
    }
}