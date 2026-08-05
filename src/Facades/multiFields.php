<?php namespace Multifields\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @mixin \Multifields\multiFields
 */
class multiFields extends Facade
{
    /**
     * Get the registered MultiFields helper accessor.
     *
     * @since 3.1.0
     */
    protected static function getFacadeAccessor(): string
    {
        return 'multiFields';
    }
}
