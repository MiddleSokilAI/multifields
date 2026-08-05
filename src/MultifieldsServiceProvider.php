<?php namespace Multifields;

use EvolutionCMS\ServiceProvider;
use Event;

class MultifieldsServiceProvider extends ServiceProvider
{

    protected $namespace = '';

    /**
     * Register publishable MultiFields configuration examples for console use.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(dirname(__DIR__) . '/lang', 'multiFields');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                dirname(__DIR__) . '/config/' => config_path('multifields', true),
            ], 'multiFields');
        }
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->loadPluginsFrom(
            dirname(__DIR__) . '/plugins/'
        );

    }
}
