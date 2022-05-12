<?php

namespace happytodev\FlatCms;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use happytodev\FlatCms\Commands\FlatCmsCommand;

class FlatCmsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('flat-cms')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_flat-cms_table')
            ->hasCommand(FlatCmsCommand::class);
    }
}
