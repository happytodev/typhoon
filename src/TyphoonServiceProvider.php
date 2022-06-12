<?php

namespace HappyToDev\Typhoon;

use Spatie\LaravelPackageTools\Package;
use HappyToDev\Typhoon\Commands\TyphoonCommand;
use HappyToDev\Typhoon\Console\InstallTyphoonPackage;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class TyphoonServiceProvider extends PackageServiceProvider
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
                __DIR__ . '/Models/Category.php' => 'app/Models/Category.php',
                __DIR__ . '/Models/Tag.php' => 'app/Models/Tag.php',
                __DIR__ . '/Models/PostTag.php' => 'app/Models/PostTag.php',
            ], 'typhoon-models');

            $this->publishes([
                __DIR__ . '/App/Filament/Resources' => 'app/Filament/Resources',
            ], 'typhoon-filament-resources');

            // publish compilated css from Tailwindcss
            $this->publishes([
                __DIR__ . '/../public/css' => public_path('css'),
                __DIR__ . '/../resources/css' => resource_path('css'),
                __DIR__ . '/../tailwind.config.js' => base_path('tailwind.config.js'),
            ], 'typhoon-css');

            // Install typhoon command
            $this->commands([
                InstallTyphoonPackage::class,
            ]);
        }

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Load views and defining key to call them (typhoon)
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'typhoon');

    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('typhoon')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_typhoon_table')
            ->hasCommand(TyphoonCommand::class);
    }
}
