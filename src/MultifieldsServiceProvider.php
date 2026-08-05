<?php namespace Multifields;

use EvolutionCMS\ServiceProvider;

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

        $this->app->singleton('multiFields', fn () => new multiFields());
        class_alias(Facades\multiFields::class, 'multiFields');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                dirname(__DIR__) . '/config/' => config_path('multifields', true),
                dirname(__DIR__) . '/views/' => public_path('views/multifields'),
            ], 'multiFields');
        }
    }

    /**
     * Register the package virtual plugins.
     *
     * @return void
     */
    public function register()
    {
        $this->loadPluginsFrom(dirname(__DIR__) . '/plugins/');
    }
}
