<?php

namespace happytodev\FlatCms;

use Spatie\LaravelPackageTools\Package;
use happytodev\FlatCms\Commands\FlatCmsCommand;
use happytodev\FlatCms\Console\InstallFlatPackage;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FlatCmsServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // Create the user model and if necessary overwrite it
            // @todo Find a better way to do this
            // if (! class_exists('User')) {
                $this->publishes([
                    __DIR__ . '/Models/User.php' => 'app/Models/User.php',
                ], 'models');
            // }

            // Install flat-cms command
            $this->commands([
                InstallFlatPackage::class,
            ]);
        }
    }

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
