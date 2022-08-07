<?php

namespace HappyToDev\Typhoon;

//use App\Providers\RepositoryServiceProvider;
use App\View\Components\TyphoonHero;
use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use HappyToDev\Typhoon\Commands\TyphoonCommand;
use HappyToDev\Typhoon\Console\InstallTyphoonPackage;
use HappyToDev\Typhoon\Console\UpdateTyphoonPackage;
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
                __DIR__ . '/Models/Category.php' => 'app/Models/Category.php',
                __DIR__ . '/Models/Configuration.php' => 'app/Models/Configuration.php',
                __DIR__ . '/Models/Page.php' => 'app/Models/Page.php',
                __DIR__ . '/Models/Post.php' => 'app/Models/Post.php',
                __DIR__ . '/Models/PostTag.php' => 'app/Models/PostTag.php',
                __DIR__ . '/Models/Tag.php' => 'app/Models/Tag.php',
                __DIR__ . '/Models/User.php' => 'app/Models/User.php',
            ], 'typhoon-models');

            $this->publishes([
                __DIR__ . '/../config/filament.php' => config_path('filament.php'),
            ], 'typhoon-filament-config');

            $this->publishes([
                __DIR__ . '/../config/typhoon.php' => config_path('typhoon.php'),
            ], 'typhoon-config');

            $this->publishes([
                __DIR__ . '/App/Filament/Resources' => 'app/Filament/Resources',
            ], 'typhoon-filament-resources');

            // publish compilated css from Tailwindcss
            $this->publishes([
                __DIR__ . '/../public/css/app.css' => public_path('css/app.css'),
                __DIR__ . '/../public/css/prism.css' => public_path('css/prism.css'),
                __DIR__ . '/../resources/css' => resource_path('css'),
                __DIR__ . '/../tailwind.config.js' => base_path('tailwind.config.js'),
            ], 'typhoon-css');

            // publish prism js
            $this->publishes([
                __DIR__ . '/../public/js/prism.js' => public_path('js/prism.js'),
            ], 'typhoon-js');

            // Install typhoon command
            $this->commands([
                InstallTyphoonPackage::class,
                UpdateTyphoonPackage::class,
            ]);

            // Load Blade components
            $this->publishes([
                __DIR__ . '/App/View/Components' => app_path('View/Components'),
                __DIR__ . '/../resources/views/components' => resource_path('views/components'),
            ], 'typhoon-components');

            // Loads interfaces
            $this->publishes([
                __DIR__ . '/App/Interfaces' => app_path('Interfaces'),
            ], 'typhoon-interfaces');

            // Loads repositories
            $this->publishes([
                __DIR__ . '/App/Repositories' => app_path('Repositories'),
            ], 'typhoon-repositories');

            // Loads RepositoryServiceProvider
            $this->publishes([
                __DIR__ . '/App/Providers/RepositoryServiceProvider.php' => app_path('Providers/RepositoryServiceProvider.php'),
            ], 'typhoon-repository-service-provider');

            // Loads langs
            $this->publishes([
                __DIR__ . '/Lang' => base_path('lang'),
            ], 'typhoon-langs');

            // Loads views
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views'),
            ], 'typhoon-views');

            // Replace initial Laravel routes/web.php
            // to avoid having base Laravel page mapped on '/'
            $this->publishes([
                __DIR__ . '/routes/web.php' => base_path('routes/web.php'),
            ], 'typhoon-routes');

            // Install demo content
            $this->publishes([
                __DIR__ . '/../demo_content/content' => base_path('content'),
                __DIR__ . '/../demo_content/sqlite' => base_path('storage/framework/cache'),
                __DIR__ . '/../demo_content/public_image' => base_path('storage/app/public'),
            ], 'typhoon-install-demo');

            Blade::component('typhoon-hero', TyphoonHero::class);
            Blade::component('typhoon-post', TyphoonPost::class);
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
