<?php

namespace HappyToDev\FlatCms;

use Spatie\LaravelPackageTools\Package;
use HappyToDev\FlatCms\Commands\FlatCmsCommand;
use HappyToDev\FlatCms\Console\InstallFlatPackage;
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
                    __DIR__ . '/Models/Post.php' => 'app/Models/Post.php',
                ], 'flatcms-models');
            // }

                $this->publishes([
                    __DIR__ . '/App/Filament/Resources' => 'app/Filament/Resources',
                ], 'flatcms-filament-resources');

            // Install flat-cms command
            $this->commands([
                InstallFlatPackage::class,
            ]);
        }

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Load views and defining key to call them (flat-cms)
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'flat-cms');

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
