<?php

namespace Jpmerlotti\PaginatedPanel;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Jpmerlotti\PaginatedPanel\Commands\PaginatedPanelCommand;

class PaginatedPanelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('paginated-panel')
            ->hasViews();
//            ->hasCommand(PaginatedPanelCommand::class)
//            ->hasMigration('create_filament-theme-paginated-panel_table')
    }
}
