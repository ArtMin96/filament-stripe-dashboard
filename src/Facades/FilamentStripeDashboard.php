<?php

namespace ArtMin96\FilamentStripeDashboard\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ArtMin96\FilamentStripeDashboard\FilamentStripeDashboard
 */
class FilamentStripeDashboard extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \ArtMin96\FilamentStripeDashboard\FilamentStripeDashboard::class;
    }
}
