<?php

namespace ArtMin96\FilamentStripeDashboard;

use ArtMin96\FilamentStripeDashboard\Filament\Resources\StripeDashboardResource;
use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
use ArtMin96\FilamentStripeDashboard\Commands\FilamentStripeDashboardCommand;

class FilamentStripeDashboardServiceProvider extends PluginServiceProvider
{
    protected array $resources = [
        StripeDashboardResource::class
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-stripe-dashboard')
            ->hasConfigFile()
            ->hasViews()
            ->hasTranslations()
            ->hasMigration('create_filament-stripe-dashboard_table')
            ->hasCommand(FilamentStripeDashboardCommand::class);
    }
}
