<?php

namespace Famdirksen\LaravelGoogleIndexing;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Famdirksen\LaravelGoogleIndexing\LaravelGoogleIndexingClass
 */
class LaravelGoogleIndexingFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-google-indexing';
    }
}
