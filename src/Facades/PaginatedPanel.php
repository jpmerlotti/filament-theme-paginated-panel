<?php

namespace Jpmerlotti\PaginatedPanel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Jpmerlotti\PaginatedPanel\PaginatedPanel
 */
class PaginatedPanel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Jpmerlotti\PaginatedPanel\PaginatedPanel::class;
    }
}
