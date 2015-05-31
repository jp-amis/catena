<?php
namespace Amis\Catena;


/**
 * This file is responsable for
 * generating the Catena Service Provider
 *
 * @license MIT
 * @package Amis\Catena
 */
use Illuminate\Support\ServiceProvider;

class CatenaServiceProvider extends ServiceProvider{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {}

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->registerCatena();
    }

    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerCatena() {
        $this->app->bind('catena', function ($app) {
            return new Catena($app);
        });
    }

}