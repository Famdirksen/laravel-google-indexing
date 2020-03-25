<?php

namespace Famdirksen\LaravelGoogleIndexing\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Famdirksen\LaravelGoogleIndexing\LaravelGoogleIndexing
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
        return 'laravel_google_indexing';
    }
}
